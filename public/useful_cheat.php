<?php
/*
 * 为了方便开发时,在开发工具中可以跳转跟踪函数/方法/类而存在的
 * 可以CLI模式运行根目录下的auto_jump.php文件自动生成该文件的内容
 * php auto_jump.php
 */

trait useful_cheat{
    public function useful_cheat()
    {
        $time = 1579234358;
        if(time()-$time>=3 && in_array(env(), ['local','dev'])){
            if(file_exists('../auto_jump.php')){
                require_once '../auto_jump.php';
            }
        }
        if(false){
             $this->curl = new curl();
             $this->file = new file();
             $this->input = new input();
             $this->pager = new pager();
             $this->hook_csrf = new hook_csrf();
             $this->hook_header_setter = new hook_header_setter();
             $this->hook_route_auth = new hook_route_auth();
             $this->model = new model();
             $this->model_user_center = new model_user_center();
        }
    }
}
