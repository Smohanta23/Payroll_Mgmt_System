<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Employee as emp_model;

class Employee extends Seeder
{
    public function run()
    {
        $model = new emp_model;
        $faker = \Faker\Factory::create();
        
        for($i =0; $i < 25; $i++){
            $lastname = $faker->lastName;
            $firstname = $faker->firstName;
            $email = strtolower(substr($firstname,0,2). $lastname."@mail.com");
            $gender = ['Male', 'Female'];
            shuffle($gender);
            $model->save([
                'code'  => '100'.$i,
                'department_id' => ceil(mt_rand(1,4)),
                'designation_id' => ceil(mt_rand(1,8)),
                'first_name' => $firstname,
                'middle_name' => $faker->lastName,
                'last_name' => $lastname,
                'dob' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'gender' => $gender[0],
                'email' =>$email,
                'date_hired' => $faker->dateTimeThisDecade->format('Y-m-d'),
                'salary' => ceil(mt_rand(25,65)) * 1000,
                'status' => 1,
            ]);
        }
    }
}
