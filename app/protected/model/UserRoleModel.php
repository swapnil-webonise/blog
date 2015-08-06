<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weboniselab
 * Date: 1/8/13
 * Time: 8:16 PM
 * To change this template use File | Settings | File Templates.
 */

class UserRoleModel extends LibModel{

    public function getAll(){
        return($this->findAll());
    }
}