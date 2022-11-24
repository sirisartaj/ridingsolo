<?php 
namespace App\Models;  
use CodeIgniter\Model;
use App\Controllers\Home;
  
class AdminModel extends Model{
    

    

    public function adduser($data){

         $home = new home();   
         //print_r($data);echo "in codeigniter usermodel";exit;    
        $url = baseURL1.'/users/adduser';
        return $home->CallAPI('POST',$url,$data);
       
    }
    public function Approverejectuser($data){

         $home = new home();   
         //print_r($data);echo "in codeigniter usermodel";exit;    
        $url = baseURL1.'/admin/Approverejectuser';
        return $home->CallAPI('POST',$url,$data);
       
    } 

    public function edituser($data){

        $home = new home();       
        $url = baseURL1.'/users/updateuser';
        return $home->CallAPI('POST',$url,$data);
       
    } 
    public function getuser($user_id){

        $home = new home();  
        $data = array();     
        $url = baseURL1.'/users/getuser/'.$user_id;
        return $home->CallAPI('GET',$url,$data);
       
    }

    public function signinuser($data){

         $home = new home();
       
        $url = baseURL1.'/users/checklogin';

       return $home->CallAPI('POST',$url,$data);
    }

    public function getusers(){
        $home = new home();  
        $data = array();     
        $url = baseURL1.'/users/getusers';
        return $home->CallAPI('GET',$url,$data);
    }
}