<?php

namespace App\Controllers;
use App\Models\AdminModel;
class AdminController extends BaseController
{
    public function index()
    {
       helper('url');
       $adminModel = new AdminModel();
       $data['result'] =  $adminModel->getUsers()->users;
        
        return view('Admin/userapprovals',$data);
    }

    public function Approverejectuser()
    {
       helper('url');
       $adminModel = new AdminModel();
       $data = $this->request->getVar();
       $data['modified_date'] = date('Y-m-d H:i:s');
       $result =  $adminModel->Approverejectuser($data);
      // print_r($result['success']);exit;
        echo json_encode($result);exit;
        if($result)
        {
            //$this->request->getVar('email')
            //mail('sartajbsk@gmail.com',"Your Request is approved Please fill the registration form ",'Your Request is approved Please fill the registration form');
        }
        //return view('Admin/userapprovals',$data);
    }



}
