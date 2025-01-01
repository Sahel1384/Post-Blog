<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutDesignController extends Controller
{
    public function layoutSetting(){
        return view('layout.layoutDesign');
    }
}
