<?php

namespace App\Controllers;

class Data extends BaseController
{
    public function index()
    {
        helper('url');
        return view('dashboard/data');
    }
}