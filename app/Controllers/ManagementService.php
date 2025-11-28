<?php

namespace App\Controllers;

class ManagementService extends BaseController
{
    public function index()
    {
        helper('url');
        return view('dashboard/managementservice');
    }
}