<?php
namespace app\controller;

use app\BaseController;

class Index extends BaseController
{
    /**
     * i blog首页
     */
    public function index()
    {

    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }
}
