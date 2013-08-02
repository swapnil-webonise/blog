<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 24/7/13
 * Time: 4:41 PM
 * To change this template use File | Settings | File Templates.
 */
class UserModel extends LibModel{

    public function getAll(){
        return($this->findAll());
    }
    public function doRegister($data){
        $rules=array('first_name'=>array('require'),'last_name'=>array('require'),'email_id'=>array('require','email'),'password'=>array('require','min:6','max:12','alphanumeric','special:!:$:@:%:^:&:'),'gender'=>array('require'),'profile_photo'=>array('require'),'user_role_id'=>array('require'));
        $registerValidate=new LibValidation($data,$rules);

        $returnArray=array();
        if(!$registerValidate->validate()){
            $data_to_render=array('error_field'=>$registerValidate->error_field,'validation_errors'=>$registerValidate->validation_errors);
            $returnArray['status']='Error';
            $returnArray['array']=$data_to_render;
        }
        else{
            $random_no= substr(number_format(time() * rand(),0,'',''),0,8);
            $activation_code= substr(number_format(time() * rand(),0,'',''),0,8);

            $AccPassword=$data['password'];
            $AccPassword .= $random_no;
            $AccPassword=md5($AccPassword);
            $data['password']=$AccPassword;

            $data['random_no']=$random_no;
            $data['activation_code']=$activation_code;
            $data['isActivated']='No';

            $noOfRows=$this->insertData($data);
            if($noOfRows===1){
                $userData=$this->query("select * from user where id=(select LAST_INSERT_ID() limit 1)");
                $returnArray['status']='Success';
                $returnArray['array']=array('userData'=>$userData);
            }
        }

        return $returnArray;
    }

    public function doLogin($data){
        $rules=array('email_id'=>array('require','email'),'password'=>array('require','min:6','max:12','alphanumeric','special:!:$:@:%:^:&:'));
        $loginValidate=new LibValidation($data,$rules);

        if(!$loginValidate->validate()){
            $data_to_render=array('error_field'=>$loginValidate->error_field,'validation_errors'=>$loginValidate->validation_errors);

            return $data_to_render;
        }
        else{
            $conditionArray=array('email_id','=',$data['email_id']);
            $userData=$this->findByCondition($conditionArray);
            if($userData[0]['isActivated']==='Yes'){
                Application::session()->start();
                Application::session()->write('userId',$userData[0]['id']);
                Application::session()->write('userName',$userData[0]['first_name'].' '.$userData[0]['last_name']);
                Application::session()->write('userRole',$userData[0]['user_role_id']);
                return true;
            }
            else{
                return false;
            }
        }
    }

    public function doActivate($activation_code){
        $conditionArray=array('activation_code','=',$activation_code);
        $userData=$this->findByCondition($conditionArray);
        if(count($userData)===1){
            $activateStatus=$this->updateData(array('isActivated'=>'Yes'),array('id','=',$userData[0]['id']));
            if($activateStatus===1){
                return true;
            }
            else
                return false;
        }
    }
}