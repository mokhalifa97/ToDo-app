<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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


    public function show($id){
        $task= Profile::find($id);
        if($task){
            $data=[
                'msg' => 'one record',
                'status' => 200,
                'data' => new ProfileResource($task)
            ];
            return response()->json($data);
        }else{
            $data=[
                'msg' => 'there is no such record!!',
                'status' => 201,
                'data' => null
            ];
            return response()->json($data);
        }
    }

    public function delete(Request $request){
        $id= $request->id;
        $task = Profile::find($id);
        $task->delete();
        $data=[
            "msg"=> "deleted successfully !",
            "status"=> 205,
            "data" => null
        ];
        return response()->json($data);
    }

    public function update(Request $request){
        $validateData= Validator::make($request->all(),[
            'id' => 'required|unique:profiles|max:11',
            'task' => 'required',
            'status' => 'required',
        ]);

        if($validateData->fails()){
            $data=[
                "msg"=> "NOT VALID DATA!!",
                "status"=> 203,
                "data" => $validateData->errors()
            ];
            return response()->json($data);
        }

        $old_id= $request->old;
        $task= Profile::find($old_id);
        $task->update([
            'id' => $request->id,
            'task' => $request->task,
            'status' => $request->status,
        ]);
        $data=[
            "msg"=> "updated record successfully",
            "status"=> 207,
            "data" => new ProfileResource($task)
        ];
        return response()->json($data);
    }

    public function create(Request $request){
        $validateData= Validator::make($request->all(),[
            'id' => 'unique:profiles|max:11',
            'task' => 'required',
            'status' => 'required',
        ]);

        if($validateData->fails()){
            $data=[
                "msg"=> "NOT VALID DATA!!",
                "status"=> 203,
                "data" => $validateData->errors()
            ];
            return response()->json($data);
        }

        $newTask= Profile::create([
            'id' => $request->id,
            'task' => $request->task,
            'status' => $request->status,
            'user_id' => $request->user_id,
        ]);

        $data=[
            "msg"=> "CREATED NEW RECORD SUCCESSFULLY!!",
            "status"=> 201,
            "data" => new ProfileResource($newTask)
        ];
        return response()->json($data);
    }
}
