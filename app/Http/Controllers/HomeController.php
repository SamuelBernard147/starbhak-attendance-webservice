<?php

namespace App\Http\Controllers;
use App\Kegiatan;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == "guru") {
             $kegiatan = Kegiatan::all();
             return view('guru.home',['kegiatan'=>$kegiatan]);
        } else {
             $kegiatan = Kegiatan::all();
             return view('admin.home',['kegiatan'=>$kegiatan]);
        }
        
        
       
    }
    public function viewDetails($id)
    {
        $kegiatan = Kegiatan::where('id_kegiatan',$id)->first();
        return view('detailsEvent', ['data'=>$kegiatan]);    
    
    }

}
