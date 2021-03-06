<?php
declare (strict_types = 1);

namespace app\validate;
use think\Validate;
use think\facade\Db;

class LabelValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'name' =>'max:10|checkName:add',
        'r_name' => 'checkName:remove'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'name.max'    =>'标签名应在1-10个字符'
    ];

    protected function checkName($value,$rule,$data){
        $rs = Db::table('iblog_label')->where('is_deleted', 0)->where('name','=',$value)->find();
      //  echo $value;exit();

        if($rule == 'add'){
            return $rs ? "标签'{$value}'已经存在" : true;
        }
        return $rs ? true : "标签'{$value}'不存在";

    }
}
