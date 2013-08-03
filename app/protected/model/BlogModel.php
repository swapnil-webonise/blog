<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 1/8/13
 * Time: 8:02 PM
 * To change this template use File | Settings | File Templates.
 */
class BlogModel extends LibModel{
    public function getAll(){
        return($this->findAll());
    }
    public function encode(){
        $this->title=htmlentities($this->title);
        $this->description=htmlentities($this->description);
    }
    public function delete($condition){
        $data=$this->findByCondition($condition);
        if(!empty($data)){
            if($this->deleteData($condition)>0){
                return true;
            }
            return false;
        }
        return false;
    }
}