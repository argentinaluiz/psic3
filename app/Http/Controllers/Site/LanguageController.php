<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App;
use Lang;

class LanguageController extends Controller
{
    public function chooser(){
       // echo Input::get('locale');
        Session::put('locale' , Input::get('locale'));
        return Redirect::back();
    }
    
}
