<?php

namespace App\Controllers;

class ManagementOrder extends BaseController
{
    public function index()
    {
        helper('url');
        return view('dashboard/managementorder');
    }
}