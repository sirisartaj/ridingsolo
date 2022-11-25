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
        print_r($result);exit;
        if($result->status==200 && $data['ustatus']==1){
            $aa = $this->ela_mail();
        }else{

        }
        

    } 

    public function ela_mail(){
        
        $url = 'https://api.elasticemail.com/v2/email/send';

        try{
                $post = array('from' => 'sartaj.s@siriinnovations.com',
                'fromName' => 'RidingSolo',
                'apikey' => '0A47D0670E603483C974F5B250D2BF23E541D697A392F14B3654BF8C7291FC20B791A7895B4FED91CA59BC4B017BE379',
                'subject' => 'Approved Signup',
                'to' => 'sartaj.s@siriinnovations.com;',
                'bodyHtml' => '<img src=""/><h1>Please fill the form</h1><div><a href="http://RidingSolo/public/signin?from_mail=1"></a></div>',
                'bodyText' => 'Please fill the form',
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