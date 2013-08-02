<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weboniselab
 * Date: 1/8/13
 * Time: 7:25 PM
 * To change this template use File | Settings | File Templates.
 */

class UserController extends LibController{
    public function index(){

    }

    public function registerForm(){
        $userRoleObj=new UserRoleModel();
        $userRoleArray=$userRoleObj->getAll();
        $this->render('Registration',array("userRoleArray"=>$userRoleArray));
    }

    public function loginForm(){
        $this->render('Login');
    }

    public function doRegister(){
        $data=array('first_name'=>$_POST['txtFname'],'last_name'=>$_POST['txtLname'],'email_id'=>$_POST['txtEmailId'],'password'=>$_POST['txtPassword'],'user_role_id'=>$_POST['comboUserRole'],'gender'=>$_POST['gender']);

        $userObj=new UserModel();
        $returnArray=$userObj->doRegister($data);

        if($returnArray['status']==='Error'){
            $this->render('RegistrationError',$returnArray['array']);
        }
        elseif($returnArray['status']==='Success'){
            $to      = $returnArray['array']['userData'][0]['email_id'];
            $subject = 'Blog System Account Activation Link';
            $message = 'http://assignments.webonise.com/user/activate?activation_code='.$returnArray['array']['userData'][0]['activation_code'];
            $headers = 'From: swapnilpatil2606@weboniselab.com' . "\r\n" .
                'Reply-To: swapnilpatil2606@weboniselab.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);

            $this->render('ActivationRemaining',$returnArray['array']);
        }
    }
    public function doLogin(){
        $data=array('email_id'=>$_POST['txtEmailId'],'password'=>$_POST['txtPassword']);

        $userObj=new UserModel();
        $returnArray=$userObj->doLogin($data);
        if($returnArray===true){
            echo Application::session()->read('userId');
            echo Application::session()->read('userName');
            echo Application::session()->read('userRole');
        }
        elseif($returnArray===false){
            echo 'remaining';
        }
        else{
            print_r($returnArray);
        }
    }

    public function activate(){
        $activation_code=$_GET['activation_code'];

        $userObj=new UserModel();
        $userObj->doActivate($activation_code);
    }
}