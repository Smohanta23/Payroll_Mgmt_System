<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Department as dept_model;

class Department extends Seeder
{
    public function run()
    {
        $model = new dept_model;
        $model->save([
                'code'      =>'ITD',
                'name'      =>'Information Technology Department'
        ]);
        $model->save([
                'code'      =>'HRD',
                'name'      =>'Human Resource Department'
        ]);
        $model->save([
                'code'      =>'MKGTD',
                'name'      =>'Marketing Department'
        ]);
        $model->save([
                'code'      =>'AFD',
                'name'      =>'Accounting and Finance Department'
        ]);
    }
}
