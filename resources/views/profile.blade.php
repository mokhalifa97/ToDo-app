@extends('layouts.app')

@section('content')
                
    <section class="vh-100 gradient-custom">
        <div class="container ">
        <div class="row d-flex justify-content-center align-items-center text-center h-100">
            <div class="col col-xl-10">
                <h1 class="m-5">Create New Tasks</h1>
    
            <div class="card">
                @if (session('add'))
                    <div class="alert alert-primary" >{{session('add')}}</div>
                    @endif
                    @if (session('delete'))
                    <div class="alert alert-danger" >{{session('delete')}}</div>
                    @endif
                    @if (session('update'))
                    <div class="alert alert-success" >{{session('update')}}</div>
                    @endif
                <div class="card-body pt-5">
    
                <form enctype="multipart/form-data" class="d-flex justify-content-center align-items-center mb-4" method="POST" action="{{route('profile.add')}}">
                    @csrf

                    
                    <div class="input-group mb-3">
                        
                        <input type="text" id="form2" class="form-control" placeholder="New task..." aria-label="Recipient's username" aria-describedby="button-addon2" name="newDo">
                        
                        <button class="btn btn-success" type="submit" id="button-addon2" name="addDo">ADD</button>
                    </div>
                </form>

                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                    aria-labelledby="ex1-tab-1">

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            
                            <th scope="col">ID</th>
                            <th scope="col">User_id</th>
                            <th scope="col">Tasks</th>
                            <th scope="col">Status</th>
                            <th scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            @foreach ($task as $item)
                            <td>{{$item->id}}</td>
                            <td>{{$item->user_id}}</td>
                            <td>{{$item->task}}</td>
                            <td>
                                @if ($item->status=="not complete")
                                <div class="badge bg-warning">
                                    Not Complete
                                </td>
                                </div>
                                @else
                                <div class="badge bg-success">
                                    Complete
                                </td>
                                </div>
                                @endif
                                
                            <td class="d-flex justify-content-center">
                                <a href="{{route('delete',$item->id)}}" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="{{route('edit',$item->id)}}" class="btn btn-info ms-1 ">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    

                    </div>
                </div>
                <!-- Tabs content -->
    
                </div>
            </div>
    
            </div>
        </div>
        </div>
    </section>

@endsection