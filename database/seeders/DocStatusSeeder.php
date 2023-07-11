<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doc_status')->insert([
            'name' => 'Waiting Adviser Approval'
        ]);

        DB::table('doc_status')->insert([
            'name' => 'Adviser Rejected'
        ]);

        DB::table('doc_status')->insert([
            'name' => 'Waiting OSAS Approval'
        ]);

        DB::table('doc_status')->insert([
            'name' => 'OSAS Approved'
        ]);

        DB::table('doc_status')->insert([
            'name' => 'OSAS Rejected'
        ]);
    }
}
