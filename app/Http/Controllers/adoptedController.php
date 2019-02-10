<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use Auth;
use App\Adopted;
use App\Orphans;
class adoptedController extends Controller
{

    public function story( $id)
    {
         $data['orphan_id'] = $id;
         $myorphan = Adopted::create($data);
         return redirect('/orphans')->with('success', 'Done successfuly');
    }
}
