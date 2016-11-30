<?php namespace WebEd\Base\Test\Http\Controllers;

use WebEd\Base\Core\Http\Controllers\BaseAdminController;

class HomeController extends BaseAdminController
{
    protected $module = 'test';

    public function __construct()
    {
        parent::__construct();
    }
}
