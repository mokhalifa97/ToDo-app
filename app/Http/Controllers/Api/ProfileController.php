<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $tasks= ProfileResource::collection(Profile::all());
        $data=[
            'msg' => 'All profile table records',
            'status' => 200,
            'data' => $tasks
        ];
        return response()->json($data);
    }
}
