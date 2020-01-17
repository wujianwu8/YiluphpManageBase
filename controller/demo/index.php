<?php
/**
 * @name 示例页
 * @desc
 * @method GET
 * @uri /demo/index
 * @param integer id 页码 可选 示例
 * @return HTML
 */

//这里做访问权限控制
//if (!$app->model_user_center->check_user_permission($self_info['uid'], 'view_demo_system')) {
//    return_code(CODE_NO_AUTHORIZED, $app->lang('not_authorized'));
//}

$id = $app->input->get_int('id');

return_result('demo/index');