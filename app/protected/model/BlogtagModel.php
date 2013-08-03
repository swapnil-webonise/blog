<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 3/8/13
 * Time: 8:32 PM
 * To change this template use File | Settings | File Templates.
 */
class BlogtagModel extends LibModel{
    public function add($tag,$blogId){
        $tags=explode(',',$tag);
        foreach($tags as $t){
            $data=array('tag_name'=>$t,'blog_id'=>$blogId);
            $this->insertData($data);
        }
    }
}