<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orphans;
use Image;
use App\User;
use App\Myorphan;
use Gate;
use Auth;
class orphansController extends Controller
{
    public function __construct()
    {

         if (Gate::denies('kind', Auth::user())){
               $this->middleware('auth', ['except'=>['index']]);
          }
    }
    //
    public function index(){

        $orphans = Orphans::orderBy('created_at' , 'desc')->paginate(3);
        $user = User::all('id');
        $myorphans = Myorphan::all();
        $counts = Myorphan::all('id')->count();
        return view('orphans')->with(array('orphans' => $orphans, 'user' => $user, 'myorphans' => $myorphans, 'counts' => $counts));
    }

     public function edit($id)
     {
          $orphans = Orphans::find($id);
          return view('/edit')->with('orphans', $orphans);
     }

     public function update(Request $request, $id)
     {
          $this->Validate($request , [
               'name'         => 'required',
               'age'          => 'required',
               'id_number'    => 'required',
               'governorate'  => 'required',
               'hobbies'      => 'required',
               'case'         => 'required',
               'image'        => 'required|nullable|max:500000'
          ]);

          if($request->hasFile('image')){
             $fileNameExt = $request->file('image')->getClientOriginalName();
             $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
             $extention = $request->file('image')->getClientOriginalExtension();

             $fileNameStore =  time() . '.' . $extention;
             $path =  $request->file('image')->move(base_path() . '/public/image/', $fileNameStore);
          }else{
             $fileNameStore = 'header.jpg';
          }

          $orphan = Orphans::find($id);
          $orphan->name = $request->input('name');
          $orphan->age = $request->input('age');
          $orphan->id_number = $request->input('id_number');
          $orphan->governorate = $request->input('governorate');
          $orphan->hobbies = $request->input('hobbies');
          $orphan->case = $request->input('case');
          $orphan->image = $fileNameStore;
          $orphan->save();
          return redirect('/orphans')->with('success', 'Done successfuly');

     }


     public function create()
     {
          return view('/create');
     }

     public function store(Request $request)
     {
          $this->Validate($request , [
               'name'         => 'required',
               'age'          => 'required',
               'id_number'    => 'required',
               'governorate'  => 'required',
               'hobbies'      => 'required',
               'case'         => 'required',
               'image'        => 'required|nullable|max:500000'
          ]);

          if($request->hasFile('image')){
             $fileNameExt = $request->file('image')->getClientOriginalName();
             $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
             $extention = $request->file('image')->getClientOriginalExtension();

             $fileNameStore =  time() . '.' . $extention;
             $path =  $request->file('image')->move(base_path() . '/public/image/', $fileNameStore);
          }else{
             $fileNameStore = 'header.jpg';
          }

          $orphan = new Orphans;
          $orphan->name = $request->input('name');
          $orphan->age = $request->input('age');
          $orphan->id_number = $request->input('id_number');
          $orphan->governorate = $request->input('governorate');
          $orphan->hobbies = $request->input('hobbies');
          $orphan->case = $request->input('case');
          $orphan->image = $fileNameStore;
          $orphan->save();
          return redirect('/orphans')->with('success', 'Done successfuly');
     }

     public function show()
     {

     }

     public function destroy($id)
     {
          $orphan = Orphans::find($id);
          if($orphan->image){
             unlink(public_path() . '\image\\' . $orphan->image);
          }
          $orphan->delete();
          return redirect('/orphans')->with('success', 'Done successfuly');
     }
}