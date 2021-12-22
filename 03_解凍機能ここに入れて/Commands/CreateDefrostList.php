<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Yoyaku;
use App\Models\Yoyaku_meisai;
use App\Models\Yotei;
use App\Models\Yotei_meisai;
use App\Models\Syringe_stock;


class CreateDefrostList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'defrostlist:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '当日の出庫予定リストを作成する';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $yoyakus = DB::table('yoyakus');
        $target_hospital_list = $yoyakus //解凍リストが存在するすべての病院IDを取得 
        ->selectRaw('hospital_ID')
        ->where('yoyaku_date', '=' ,'2021-12-25')
        ->distinct()
        ->get();
        foreach($target_hospital_list as $target){
            echo '病院ターゲット'."\n";
            $yoyakus = DB::table('yoyakus');
            $people_by_wakuchin = $yoyakus
            ->selectRaw('wakuchin_ID, COUNT(*) AS number_of_people')
            ->join('yoyaku_meisais','yoyaku_meisais.yoyaku_ID','=','yoyakus.yoyaku_ID')
            ->where('yoyakus.hospital_ID','=', $target->hospital_ID)
            ->groupBy('wakuchin_ID')
            ->get();
            $yotei = new Yotei;
            $yotei->hospital_ID = $target->hospital_ID;
            $yotei->yotei_date = date('Y/m/d');
            $yotei->save();
            $last_insert_id = $yotei->id;
            $group_id = 0;
            foreach($people_by_wakuchin as $rec){
                echo 'ワクチンターゲット'."\n";
                echo 'ワクチンID'.$rec->wakuchin_ID."\n";
                $syringe_stocks = DB::table('syringe_stocks');
                $syringes_nums = $syringe_stocks
                ->selectRaw('syringe_stocks.syringe_ID,syringe_total,people_amp,reserve_inventory')
                ->join('use_ables','syringe_stocks.syringe_ID','=','use_ables.syringe_ID')
                ->where('syringe_stocks.hospital_ID','=', $target->hospital_ID)
                ->where('wakuchin_ID','=',$rec->wakuchin_ID)
                ->orderBy('people_amp','desc')
                ->get();
                $number_of_people = $rec->number_of_people;
                $need_vial_num = 0;
                foreach($syringes_nums as $syringe){
                    echo 'シリンジターゲット';
                    if($number_of_people <= ($syringe->syringe_total - $syringe->reserve_inventory)){
                        $need_vial_num += ceil($number_of_people / $syringe->people_amp);
                        echo '充足時注射器'.$number_of_people."\n";
                        echo '充足時バイアル'.$need_vial_num."\n";
                        $remainder = $syringe->people_amp - $number_of_people;
                        $yotei_meisai = new Yotei_meisai;
                        $yotei_meisai->yotei_ID = $last_insert_id;
                        $yotei_meisai->wakuchin_ID = $rec->wakuchin_ID;
                        $yotei_meisai->yotei_amount = $need_vial_num;
                        $yotei_meisai->class_code = 1;
                        $yotei_meisai->group_id = $group_id;
                        $yotei_meisai->save();
                        $syringe_meisai = new Yotei_meisai;
                        $syringe_meisai->yotei_ID = $last_insert_id;
                        $syringe_meisai->wakuchin_ID = $syringe->syringe_ID;
                        $syringe_meisai->yotei_amount = $number_of_people;
                        $syringe_meisai->class_code = 2;
                        $syringe_meisai->group_id = $group_id;
                        $syringe_meisai->save();
                        $get_reserve_inv = DB::table('syringe_stocks');
                            $reserve_inv = $get_reserve_inv
                            ->selectRaw('reserve_inventory')
                            ->where('syringe_ID','=',$syringe->syringe_ID)
                            ->get();
                            foreach($reserve_inv as $d){
                                $set_reserve_inv = DB::table('syringe_stocks');
                                $set_reserve_inv
                                ->where('syringe_ID','=',$syringe->syringe_ID)
                                ->update([
                                    'reserve_inventory' => $d->reserve_inventory + $number_of_people
                                ]);
                            }
                        break;
                    } else {
                        $need_vial_num += floor(($syringe->syringe_total - $syringe->reserve_inventory) / $syringe->people_amp);
                        $use_syringe_num = $need_vial_num * $syringe->people_amp;
                        echo '不足時バイアル'.$need_vial_num."\n";
                        echo '不足時注射器'.$use_syringe_num."\n";
                        if($use_syringe_num!= 0){
                            $yotei_meisai = new Yotei_meisai;
                            $yotei_meisai->yotei_ID = $last_insert_id;
                            $yotei_meisai->wakuchin_ID = $syringe->syringe_ID;
                            $yotei_meisai->yotei_amount = $use_syringe_num;
                            $yotei_meisai->class_code = 2;
                            $yotei_meisai->group_id = $group_id;
                            $yotei_meisai->save();
                            $get_reserve_inv = DB::table('syringe_stocks');
                            $reserve_inv = $get_reserve_inv
                            ->selectRaw('reserve_inventory')
                            ->where('syringe_ID','=',$syringe->syringe_ID)
                            ->get();
                            foreach($reserve_inv as $d){
                                $set_reserve_inv = DB::table('syringe_stocks');
                                $set_reserve_inv
                                ->where('syringe_ID','=',$syringe->syringe_ID)
                                ->update([
                                    'reserve_inventory' => $d->reserve_inventory + $use_syringe_num
                                ]);
                            }
                            $number_of_people -= $use_syringe_num;

                        }
                    }
                }
                $group_id = $group_id + 1;
            }
        }

        
        
    }
}
