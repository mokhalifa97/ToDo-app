@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-6">
            
                <form action="{{route('save.edit',$task->id)}}" method="POST" >
                    @csrf
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Task</label>
                    <input type="text" class="form-control" name="task" value="{{$task->task}}">
                    </div>
                    <div class="mb-3">
                        @if ($task->status == 'complete')
                        <select class="form-select form-control" name="status">
                            <option selected>{{$task->status}}</option>
                            <option value="not complete">Not Complete</option>
                        </select>
                        @else
                        <select class="form-select form-control" name="status">
                            <option selected>{{$task->status}}</option>
                            <option value="complete">complete</option>
                        </select>
                        @endif
                        
                    </div>

                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

        </div>
    </div>
</div>            
@endsection