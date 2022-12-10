<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $companies = [
           array('name' => 'Adidas','email' => 'adidas@adidas.com','logo' => 'sgt_1670706729Adidas_Logo.svg.png','website' => 'https://www.adidas.com','revenue' => '50000','status' => '1','created_at' => '2022-12-10 21:12:09','updated_at' => '2022-12-10 21:12:09','deleted_at' => NULL),
           array('name' => 'Puma','email' => 'puma@puma.com','logo' => 'sgt_1670706767puma-logo-black-symbol-with-name-clothes-design-icon-abstract-football-illustration-with-white-background-free-vector.jpg','website' => 'https://www.puma.com','revenue' => '40000','status' => '1','created_at' => '2022-12-10 21:12:47','updated_at' => '2022-12-10 21:12:47','deleted_at' => NULL),
           array('name' => 'Nike','email' => 'nike@nike.com','logo' => 'sgt_1670706796swoosh-logo-black.jpg','website' => 'https://www.nike.com','revenue' => '35000','status' => '1','created_at' => '2022-12-10 21:13:16','updated_at' => '2022-12-10 21:13:16','deleted_at' => NULL),
           array('name' => 'reebok','email' => 'reebok@reebok.com','logo' => 'sgt_1670706836551064.png','website' => 'https://www.reebok.com','revenue' => '30000','status' => '1','created_at' => '2022-12-10 21:13:56','updated_at' => '2022-12-10 21:13:56','deleted_at' => NULL),
           array('name' => 'Diadora','email' => 'diadora@diadora.com','logo' => 'sgt_1670706883diadora-2-logo-svg-vector.svg','website' => 'https://www.diadora.com','revenue' => '20000','status' => '1','created_at' => '2022-12-10 21:14:43','updated_at' => '2022-12-10 21:14:43','deleted_at' => NULL),
           array('name' => 'Speedo','email' => 'speedo@speedo.com','logo' => 'sgt_1670706918s-l1600.jpg','website' => 'https://www.speedo.com','revenue' => '15000','status' => '1','created_at' => '2022-12-10 21:15:18','updated_at' => '2022-12-10 21:15:18','deleted_at' => NULL)
       ];

       Company::insert($companies);
    }
}
