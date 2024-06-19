<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index()
    {
        $tashkiot_haqida = auth()->user()->tashkilot;
        return view('admin.home',['tashkiot_haqida'=>$tashkiot_haqida]);
    }
}
