<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public function __invoke(Request $request){
        $name = 'Lukman Sanjaya';
        return view('home', compact('name'));
    }
}
