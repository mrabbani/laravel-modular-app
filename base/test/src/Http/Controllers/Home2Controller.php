<?php namespace WebEd\Base\Test\Http\Controllers;

use ModulerApp\Http\Controllers\BaseAdminController;

class Home2Controller extends BaseAdminController
{
    protected $module = 'test';

    public function __construct()
    {
        parent::__construct();
    }
}
