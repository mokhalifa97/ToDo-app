<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function add(Request $request){
        $task= $request->newDo;
        $user_id= Auth::user()->id;
        Profile::create([
            'task' => $task,
            'user_id' => $user_id
        ]);
        return redirect()->route('home')->with('cate','NEW TASK ADDED SUCCESSFULLY');
    }

    

    public function index(){
        $id=Auth::user()->id;
        $task= Profile::where('user_id',$id)->get();
        
        return view('profile',['task'=>$task]);
    }
}
