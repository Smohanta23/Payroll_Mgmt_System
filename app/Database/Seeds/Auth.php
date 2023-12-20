<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Auth as Auth_Model;
class Auth extends Seeder
{
    public function run()
    {
        $auth_model = new Auth_Model;
        $auth_model->save([
            'name'=>'Administrator',
            'email' => 'admin@mail.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
        ]);
    }
}
