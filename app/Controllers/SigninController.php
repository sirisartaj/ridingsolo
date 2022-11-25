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
        helper(['form']);
       // echo view('signin_view');
        if($_GET['from_mail']){
            echo view('signup_Appoveuser_Form');exit;
        }else{
            echo view('signin_view');
        }
        
       // echo view('sign1');
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
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
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

        //return redirect()->to('/adduser');
    }
    public function logincheck(){
        return redirect()->to('/adduser');
    }
     public function logout()    
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/signin');
    }
}