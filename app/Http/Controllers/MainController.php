<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Input;
use DB;
use App\Good;
use App\Category;
use App\Http\Libraries\Display_lib;
use App\Http\Controllers\MenuController;
class MainController extends Controller
{
    //
  /*  public function __construct()
    {
        $this->middleware('auth');
    }*/

  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //Get data from DB
    

        $data_nav=array();
        $data_content['title']="Nechemya";
        $path='main_page';
        $data['keywords']="Nechemya";
        $data['description']="Nechemya";
       return Display_lib::index($path,$data,$data_nav,$data_content);
    }


}
