<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $employees = [
           array('id' => '1','first_name' => 'ahmed','last_name' => 'gamal','email' => 'ahmed@gmail.com','phone' => '01007949946','occupation' => 'Sales','status' => '1','created_at' => '2022-12-10 21:21:09','updated_at' => '2022-12-10 21:21:09','deleted_at' => NULL,'company_id' => '1'),
           array('id' => '2','first_name' => 'ahmed','last_name' => 'khaled','email' => 'ahmed.khaled@gmail.com','phone' => '01007949945','occupation' => 'Sales','status' => '1','created_at' => '2022-12-10 21:21:09','updated_at' => '2022-12-10 21:21:09','deleted_at' => NULL,'company_id' => '2'),
           array('id' => '3','first_name' => 'ahmed','last_name' => 'tarek','email' => 'ahmed.tarek@gmail.com','phone' => '01007949944','occupation' => 'Sales','status' => '1','created_at' => '2022-12-10 21:21:09','updated_at' => '2022-12-10 21:21:09','deleted_at' => NULL,'company_id' => '3'),
           array('id' => '4','first_name' => 'ahmed','last_name' => 'hafez','email' => 'ahmed.hafez@gmail.com','phone' => '01007949943','occupation' => 'Sales','status' => '1','created_at' => '2022-12-10 21:21:09','updated_at' => '2022-12-10 21:21:09','deleted_at' => NULL,'company_id' => '4'),
           array('id' => '5','first_name' => 'ahmed','last_name' => 'mustafa','email' => 'ahmed.mustafa@gmail.com','phone' => '01007949942','occupation' => 'Sales','status' => '1','created_at' => '2022-12-10 21:21:09','updated_at' => '2022-12-10 21:21:09','deleted_at' => NULL,'company_id' => '5'),
           array('id' => '6','first_name' => 'ahmed','last_name' => 'sayed','email' => 'ahmed.sayed@gmail.com','phone' => '01007949941','occupation' => 'Sales','status' => '1','created_at' => '2022-12-10 21:21:09','updated_at' => '2022-12-10 21:21:09','deleted_at' => NULL,'company_id' => '6')
       ];

       Employee::insert($employees);
    }
}
