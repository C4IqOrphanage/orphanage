<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orphans;
use Image;
class orphansController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show']]);
    }
    //
    public function index(){

        //$orphans = Post::orderBy('created_at' , 'desc')->paginate(3);
        return view('orphans');
    }
}
