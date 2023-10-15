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
        return redirect()->route('profile')->with('add','NEW TASK ADDED SUCCESSFULLY');
    }

    public function delete($id){
        $task= Profile::find($id);
        $task->delete();

        return redirect()->route('profile')->with('delete','TASK DELETED SUCCESSFULLY');
    }

    public function edit($id){
        $task=Profile::find($id);
        return view('edit',['task' => $task]);
    }

    public function save(Request $request,$id){
        $new= Profile::find($id);

        $new->update([
            'task' => $request->task,
            'status' => $request->status
        ]);

        return redirect()->route('profile')->with('update','TASK UPDATED SUCCESSFULLY');

    }

    public function index(){
        $id=Auth::user()->id;
        $task= Profile::where('user_id',$id)->get();
        
        return view('profile',['task'=>$task]);
    }
}
