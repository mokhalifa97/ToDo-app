<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function delete($id){
        $task= Profile::find($id);
        $task->delete();

        return redirect()->route('home')->with('delete','TASK DELETED SUCCESSFULLY');
    }

    public function index()
    {
        $name= Auth::user()->name;
        $data= Profile::where('user_id',Auth::id())->get();
        return view('home',['name'=> $name , 'data' => $data]);
    }
}
