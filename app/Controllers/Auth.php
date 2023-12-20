<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Auth as Auth_Model;

#[\AllowDynamicProperties]
class Auth extends BaseController
{
    protected $request;
    protected $auth_model;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->auth_model = new Auth_Model;
    }

    public function index()
    {   
        $data=[];
        $data['page_title']="Login";
        $data['data']=$this->request;
        $session = session();
        if($this->request->getMethod() == 'post'){
            $user = $this->auth_model->where('email', $this->request->getPost('email'))->first();
            if($user){
                $verify_password  = password_verify($this->request->getPost('password'),$user['password']);
                if($verify_password){
                    foreach($user as $k => $v){
                        $session->set('login_'.$k, $v);
                    }
                    return redirect()->to('/Main');
                }else{
                    $session->setFlashdata('error','Incorrect Password');
                }
            }else{
                $session->setFlashdata('error','Incorrect Email or Password');
            }
        }
        $data['session'] = $session;
        return view('auth/login', $data);
    }
    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/Auth/index');
    }

    public function update_user(){
        $session = session();
        if($this->request->getMethod() == 'post'){
            extract($this->request->getPost());
            $verify_password = password_verify($current_password, $session->login_password);
            if($password !== $cpassword){
                $session->setFlashdata('error',"Password does not match.");
            }elseif(!$verify_password){
                $session->setFlashdata('error',"Current Password is Incorrect.");
            }else{
                $udata= [];
                $udata['name'] = $name;
                $udata['email'] = $email;
                if(!empty($password))
                $udata['password'] = password_hash($password, PASSWORD_DEFAULT);
                $update = $this->auth_model->where('id',$session->login_id)->set($udata)->update();
                if($update){
                    $session->setFlashdata('success',"Your Account has been updated successfully.");
                    $user = $this->auth_model->where("id ='{$session->login_id}'")->first();
                    foreach($user as $k => $v){
                        $session->set('login_'.$k, $v);
                    }
                    return redirect()->to('update_user');
                }else{
                    $session->setFlashdata('error',"Your Account has failed to update.");
                }
            }
        }

        $this->data['session']=$session;
        $this->data['page_title']="Users";
        $this->data['user'] = $this->auth_model->where("id ='{$session->login_id}'")->first();
        return view('pages/users/update_account', $this->data);
    }
}
