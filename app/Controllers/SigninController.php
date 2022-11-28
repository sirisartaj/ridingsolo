<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SigninController extends Controller
{
    public function index()
    {
        //print_r($this->request->getVar());
        //exit;
       // helper(['form']);
       // echo view('signin_view');
         $session = session();
         //print_r($session);
        //print_r($_SESSION);
        // exit;
        if($_SESSION['user']){
             return redirect()->to('/dashboard');
        }else{
            echo view('signin_view');    
        }
        
        
        
       // echo view('sign1');
    } 
    
    public function googleUserRegistration(){
        $userModel = new UserModel();
        $session = session();
        
        $data = $this->request->getVar();
      

        if($data['complete_rigistration']==1){
                       
            $datac = $userModel->getuser($data['userid']);
            $d['user'] = (array) $datac->user;
           $session->set($d);
           return redirect()->to('/dashboard');
        }else{
            $datac = $userModel->getuser($data['userid']);
            $data['user'] = (array) $datac->user;
                echo view('signup_Appoveuser_Form',$data);
            }
        
    }

    public function storelogin(){
        print_r($this->request->getVar());exit;

        echo view('signin_view');
    }


    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('user_email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data['user'] = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'role' => $data['role'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/profile');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/signin');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/signin');
        }
    }

    public function checkuser(){
        $userModel = new UserModel();

        $data['email'] = $this->request->getVar('email');
        $data['name'] = $this->request->getVar('name');
        $data['picture'] = $this->request->getVar('picture');
        $data['given_name'] = $this->request->getVar('given_name');
        $data['family_name'] = $this->request->getVar('family_name');
        $result = $userModel->checkuser($data);
        if($result->status==200){
            echo json_encode($result);exit;
        }else{
            $result = $userModel->savegoogleuser($data);
            echo json_encode($result);exit;
        }
        
        //return redirect()->to('/adduser');
    }
    public function logincheck(){
        return redirect()->to('/adduser');
    }
     public function logout()    
    {
        $session = session();
        unset($_SESSION['user']);
        $session->destroy();
        //print_r($_SESSION);exit;
        // /session_destroy();
        return redirect()->to('/signin');
    }
}