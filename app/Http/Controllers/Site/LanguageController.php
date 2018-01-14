<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App;
use Lang;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request){
        if ($request->ajax()){
            $request->session()->put('locale', $request->locale);
            $request->sessions()->flash('alert-success', ('app.Locale_Change_Success'));
        }
    }
    
}
