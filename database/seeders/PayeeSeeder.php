<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payees')->insert([
            'name' => 'ACCC',
            'schedule_amount' => 500,
            'earliest_day' => 15,
            'latest_day' => null,
            'auto_schedule' => true,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Amazon',
            'schedule_amount' => 140,
            'earliest_day' => 12,
            'latest_day' => null,
            'auto_schedule' => true,
            'schedule_months' => '{"1":false,"2":false,"3":false,"4":false,"5":false,"6":false,"7":false,"8":true,"9":false,"10":false,"11":false,"12":false}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Apple',
            'schedule_amount' => 10,
            'earliest_day' => 1,
            'latest_day' => null,
            'auto_schedule' => true,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Apple Card',
            'schedule_amount' => 500,
            'earliest_day' => 30,
            'latest_day' => null,
            'auto_schedule' => false,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'BJs',
            'schedule_amount' => 60,
            'earliest_day' => 29,
            'latest_day' => null,
            'auto_schedule' => false,
            'schedule_months' => '{"1":false,"2":false,"3":false,"4":true,"5":false,"6":false,"7":false,"8":false,"9":false,"10":false,"11":false,"12":false}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Boiler Loan',
            'schedule_amount' => 200,
            'earliest_day' => 1,
            'latest_day' => null,
            'auto_schedule' => false,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Disney',
            'schedule_amount' => 20,
            'earliest_day' => 16,
            'latest_day' => 21,
            'auto_schedule' => true,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Dollar Shave Club',
            'schedule_amount' => 10,
            'earliest_day' => 2,
            'latest_day' => null,
            'auto_schedule' => true,
            'schedule_months' => '{"1":false,"2":false,"3":true,"4":false,"5":false,"6":false,"7":true,"8":false,"9":false,"10":true,"11":false,"12":false}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Down Payment Assist',
            'schedule_amount' => 70,
            'earliest_day' => 1,
            'latest_day' => null,
            'auto_schedule' => false,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'FIYAH',
            'schedule_amount' => 20,
            'earliest_day' => 14,
            'latest_day' => null,
            'auto_schedule' => false,
            'schedule_months' => '{"1":false,"2":false,"3":false,"4":false,"5":false,"6":false,"7":false,"8":false,"9":false,"10":true,"11":false,"12":false}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Geico',
            'schedule_amount' => 110,
            'earliest_day' => 20,
            'latest_day' => null,
            'auto_schedule' => true,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'GoNetspeed',
            'schedule_amount' => 80,
            'earliest_day' => 27,
            'latest_day' => null,
            'auto_schedule' => true,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'HBO',
            'schedule_amount' => 20,
            'earliest_day' => 25,
            'latest_day' => null,
            'auto_schedule' => true,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Home Depot',
            'schedule_amount' => 100,
            'earliest_day' => 8,
            'latest_day' => null,
            'auto_schedule' => false,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Hulu',
            'schedule_amount' => 20,
            'earliest_day' => 11,
            'latest_day' => null,
            'auto_schedule' => true,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Inkarnate',
            'schedule_amount' => 30,
            'earliest_day' => 22,
            'latest_day' => null,
            'auto_schedule' => true,
            'schedule_months' => '{"1":false,"2":false,"3":false,"4":false,"5":true,"6":false,"7":false,"8":false,"9":false,"10":false,"11":false,"12":false}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Macy\'s',
            'schedule_amount' => 100,
            'earliest_day' => 9,
            'latest_day' => null,
            'auto_schedule' => false,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Mortgage',
            'schedule_amount' => 1560,
            'earliest_day' => 1,
            'latest_day' => null,
            'auto_schedule' => false,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'OVH',
            'schedule_amount' => 30,
            'earliest_day' => 1,
            'latest_day' => null,
            'auto_schedule' => true,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Paramount',
            'schedule_amount' => 20,
            'earliest_day' => 1,
            'latest_day' => null,
            'auto_schedule' => true,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'QueryTracker',
            'schedule_amount' => 30,
            'earliest_day' => 19,
            'latest_day' => null,
            'auto_schedule' => true,
            'schedule_months' => '{"1":false,"2":false,"3":false,"4":true,"5":false,"6":false,"7":false,"8":false,"9":false,"10":false,"11":false,"12":false}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Sewer',
            'schedule_amount' => 100,
            'earliest_day' => 18,
            'latest_day' => 24,
            'auto_schedule' => true,
            'schedule_months' => '{"1":false,"2":false,"3":true,"4":false,"5":false,"6":true,"7":false,"8":false,"9":true,"10":false,"11":false,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Southern CT Gas',
            'schedule_amount' => 200,
            'earliest_day' => 15,
            'latest_day' => 20,
            'auto_schedule' => false,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'UI',
            'schedule_amount' => 200,
            'earliest_day' => 6,
            'latest_day' => 9,
            'auto_schedule' => false,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Verizon',
            'schedule_amount' => 190,
            'earliest_day' => 7,
            'latest_day' => null,
            'auto_schedule' => false,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Water',
            'schedule_amount' => 40,
            'earliest_day' => 3,
            'latest_day' => 10,
            'auto_schedule' => false,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
    }
}
