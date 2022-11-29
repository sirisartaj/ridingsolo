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
        $result = $home->CallAPI('POST',$url,$data);
        //print_r($result);exit;
        if($result->status==200 && $data['ustatus']==0){
           $data['message'] = 'Admin approved your mail please go to the below link to rigistration ';
           $data['subject'] = 'Approved Signup';
            $this->ela_mail($data);
            
        }else{

        }
       // print_r($result);exit;
        return $result;

    } 

    public function ela_mail($data){
       // print_r($data);exit;
        $email =$data['email'];
        $name =$data['uname'];
        $message =$data['message'];
        $subject =$data['subject'];
        $link ='http://vyz.bz/ridingsolo_admin/';
        $link_text = 'Sign In';
        
        $url = 'https://api.elasticemail.com/v2/email/send';
        //print_r($data);exit;
        try{
            $post = array('from' => 'sartajbsk@gmail.com',
            'fromName' => 'RidingSolo',               
            'apikey' => 'B30766D2591DAD8B8EEC80471CEB9068B26389CDF47FADA6336A4C063E976D5CC675B94F918C301EE45A77FBCF3DBAE4',
            'subject' => $subject,
            
            'to' =>$data['email'],
            'bodyHtml' =>'<img src="http://vyz.bz/ridingsolo_admin/assets/images/brand/logo-2.png"/>Hi '.$name.',<br/><h1> '.$message.' </h1><div><a href="'.$link.'">'.$link_text.'</a></div>',
            'isTransactional' => false);
               
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $post,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER => false,
                    CURLOPT_SSL_VERIFYPEER => false
                ));
                
                $result=curl_exec ($ch);
                curl_close ($ch);
                
                echo $result;   
        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }

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