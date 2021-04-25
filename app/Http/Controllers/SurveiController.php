<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveiController extends Controller
{
    public function sawit(){
        return view('survei.sawit');
    }
    
    public function sawit_store(Request $request){
        
    }
    
    public function karet(){
        return view('survei.karet');
    }
    
    public function karet_store(Request $request){
        
    }

    
    public function tahunan(){
        return view('survei.tahunan');
    }
    
    public function tahunan_store(Request $request){
        
    }
}
