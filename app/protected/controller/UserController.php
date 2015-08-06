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
            $returnArray['array']['first_name']=$_POST['txtFname'];
            $returnArray['array']['last_name']=$_POST['txtLname'];
            $returnArray['array']['email_id']=$_POST['txtEmailId'];
            $returnArray['array']['password']=$_POST['txtPassword'];
            $returnArray['array']['user_role_id']=$_POST['comboUserRole'];
            $userRoleObj=new UserRoleModel();
            $userRoleArray=$userRoleObj->getAll();
            $returnArray['array']['userRoleArray']=$userRoleArray;
            $this->render('Registration',$returnArray['array']);
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
            $this->redirect('/');
        }
        elseif($returnArray===false){
            echo 'remaining';
        }
        else{
            $returnArray['email_id']=$_POST['txtEmailId'];
            $returnArray['password']=$_POST['txtPassword'];
            $this->render('/Login',$returnArray);
        }
    }

    public function doLogout(){
        Application::session()->destroy();
        $this->redirect('/');
    }

    public function activate(){
        $activation_code=$_GET['activation_code'];

        $userObj=new UserModel();
        $status=$userObj->doActivate($activation_code);
        if($status===true){
            $this->render('ActivationDone');
        }
        else{
            echo "Activation not done";
        }
    }

    public function forgotPassword(){
        $this->render('ForgotPassword');
    }

    public function doForgotPassword(){
        $data=array('email_id'=>$_POST['txtEmailId']);

        $userObj=new UserModel();
        $returnArray=$userObj->doForgotPassword($data);

        if($returnArray['status']==='Success'){
            $to      = $returnArray['array']['userData'][0]['email_id'];
            $subject = 'Forgot Password';
            $message = 'http://assignments.webonise.com/user/changePassword?activation_code='.$returnArray['array']['userData'][0]['activation_code'];
            $headers = 'From: swapnilpatil2606@weboniselab.com' . "\r\n" .
                'Reply-To: swapnilpatil2606@weboniselab.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);

            $this->render('/ForgotPasswordDone');
        }
        elseif($returnArray['status']==='Error'){
            $returnArray['array']['email_id']=$_POST['txtEmailId'];
            $this->render('/ForgotPassword',$returnArray['array']);
        }
        else{
            $this->render('/ForgotPasswordError',array('error_field'=>array('email_id'),'validation_errors'=>array('email_id'=>array('Email id does not exist'))));
        }
    }

    public function changePassword(){
        $activation_code=$_GET['activation_code'];

        $userObj=new UserModel();
        $status=$userObj->checkActivationCode($activation_code);
        if($status===true){
            $this->render('ChangePassword');
        }
        else{
            echo "Wrong link";
        }
    }

    public function doChangePassword(){
        $data=array('new_password'=>$_POST['txtNewPassword'],'confirm_password'=>$_POST['txtConfirmPassword'],'activationCode'=>$_POST['activationCode']);

        $userObj=new UserModel();
        $returnArray=$userObj->doChangePassword($data);

        if($returnArray['status']==='Success'){
            $this->render('/ChangePasswordDone');
        }
        elseif($returnArray['status']==='Error'){
            $returnArray['array']['new_password']=$_POST['txtNewPassword'];
            $returnArray['array']['confirm_password']=$_POST['txtConfirmPassword'];
            $this->render('/ChangePassword',$returnArray['array']);
        }
    }
}