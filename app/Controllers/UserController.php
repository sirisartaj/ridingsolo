<?php

namespace App\Controllers;
use App\Models\AdminModel;
class UserController extends BaseController
{
    public function index()
    {
       helper('url');
       $adminModel = new AdminModel();
       $data['result'] =  $adminModel->getUsers()->users;
        
        return view('Admin/userapprovals',$data);
    }

    public function dashboard()
    {
        $session = session();
        //print_r($_SESSION);exit;
       $data['dash'] = 'dashboard';
        return view('users/dashboard',$data);
    }
}
