<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // for ($i = 1; $i < 50; $i++) { 
        //     $student = [
        //         "name" => "Ngyen Duc Hieu",
        //         "email" => "hieunda$i@gmail.com",
        //         "address" => "16 nguyen xa",
        //         "date_of_birth" => "2023-08-01",
        //         "status" => 2,
        //         "created_at" => date('Y-m-d H:i:s'),
        //         "updated_at" => date('Y-m-d H:i:s'),  
        //        ];
        //        DB::table('students')->insert($student); 
        // }
        $this->call([
            // StudentSeeder::class,
            CategorySeeder::class
        ]);
    }
}
