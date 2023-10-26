<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payees')->insert([
            'name' => 'Adobe',
            'schedule_amount' => 30,
            'earliest_day' => 15,
            'latest_day' => 17,
            'auto_schedule' => 1,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Amazon',
            'schedule_amount' => 140,
            'earliest_day' => 12,
            'latest_day' => null,
            'auto_schedule' => 1,
            'schedule_months' => '{"1":false,"2":false,"3":false,"4":false,"5":false,"6":false,"7":false,"8":true,"9":false,"10":false,"11":false,"12":false}',
        ]);
        DB::table('payees')->insert([
            'name' => 'American Eagle',
            'schedule_amount' => 350,
            'earliest_day' => 13,
            'latest_day' => 15,
            'auto_schedule' => 0,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Apple',
            'schedule_amount' => 10,
            'earliest_day' => 1,
            'latest_day' => null,
            'auto_schedule' => 1,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Apple Card',
            'schedule_amount' => 500,
            'earliest_day' => 30,
            'latest_day' => null,
            'auto_schedule' => 0,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'BJs',
            'schedule_amount' => 60,
            'earliest_day' => 29,
            'latest_day' => null,
            'auto_schedule' => 0,
            'schedule_months' => '{"1":false,"2":false,"3":false,"4":true,"5":false,"6":false,"7":false,"8":false,"9":false,"10":false,"11":false,"12":false}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Disney',
            'schedule_amount' => 20,
            'earliest_day' => 24,
            'latest_day' => null,
            'auto_schedule' => 1,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Geico',
            'schedule_amount' => 130,
            'earliest_day' => 20,
            'latest_day' => null,
            'auto_schedule' => 1,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'GoNetspeed',
            'schedule_amount' => 80,
            'earliest_day' => 27,
            'latest_day' => null,
            'auto_schedule' => 1,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'HBO',
            'schedule_amount' => 30,
            'earliest_day' => 13,
            'latest_day' => null,
            'auto_schedule' => 1,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Home Depot',
            'schedule_amount' => 100,
            'earliest_day' => 8,
            'latest_day' => null,
            'auto_schedule' => 0,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Hulu',
            'schedule_amount' => 20,
            'earliest_day' => 11,
            'latest_day' => null,
            'auto_schedule' => 1,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Macy\'s',
            'schedule_amount' => 100,
            'earliest_day' => 9,
            'latest_day' => null,
            'auto_schedule' => 0,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Mortgage',
            'schedule_amount' => 1560,
            'earliest_day' => 1,
            'latest_day' => null,
            'auto_schedule' => 0,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'OVH',
            'schedule_amount' => 30,
            'earliest_day' => 1,
            'latest_day' => null,
            'auto_schedule' => 1,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Paramount',
            'schedule_amount' => 20,
            'earliest_day' => 1,
            'latest_day' => null,
            'auto_schedule' => 1,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Peacock',
            'schedule_amount' => 10,
            'earliest_day' => 24,
            'latest_day' => 26,
            'auto_schedule' => 1,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Sewer',
            'schedule_amount' => 100,
            'earliest_day' => 18,
            'latest_day' => 24,
            'auto_schedule' => 1,
            'schedule_months' => '{"1":false,"2":false,"3":true,"4":false,"5":false,"6":true,"7":false,"8":false,"9":true,"10":false,"11":false,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Southern CT Gas',
            'schedule_amount' => 200,
            'earliest_day' => 15,
            'latest_day' => 20,
            'auto_schedule' => 0,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'UI',
            'schedule_amount' => 200,
            'earliest_day' => 6,
            'latest_day' => 9,
            'auto_schedule' => 0,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Verizon',
            'schedule_amount' => 260,
            'earliest_day' => 7,
            'latest_day' => null,
            'auto_schedule' => 0,
            'schedule_months' => '{"1":true,"2":true,"3":false,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
        DB::table('payees')->insert([
            'name' => 'Water',
            'schedule_amount' => 50,
            'earliest_day' => 3,
            'latest_day' => 10,
            'auto_schedule' => 0,
            'schedule_months' => '{"1":true,"2":true,"3":true,"4":true,"5":true,"6":true,"7":true,"8":true,"9":true,"10":true,"11":true,"12":true}',
        ]);
    }
}
