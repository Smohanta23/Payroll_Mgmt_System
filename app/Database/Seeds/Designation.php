d<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Designation as desg_model;

class Designation extends Seeder
{
    public function run()
    {
        $model = new desg_model;
        $model->save([
                'code'      =>'Staff',
                'name'      =>'Staff'
        ]);
        $model->save([
                'code'      =>'Clerk',
                'name'      =>'Clerk'
        ]);
        $model->save([
                'code'      =>'Sr. Web Dev.',
                'name'      =>'Senior Web Developer'
        ]);
        $model->save([
                'code'      =>'Jr. Web Dev.',
                'name'      =>'Junior Web Developer'
        ]);
        $model->save([
                'code'      =>'FullStack Dev',
                'name'      =>'Full Stack Developer'
        ]);
        $model->save([
                'code'      =>'PM',
                'name'      =>'Project Manager'
        ]);
        $model->save([
                'code'      =>'Manage',
                'name'      =>'Manager'
        ]);
        $model->save([
                'code'      =>'DH',
                'name'      =>'Department Head'
        ]);
    }
}
