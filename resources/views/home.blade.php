@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h5>{{$name}}</h5></div>

                <div class="card-body">
                    @if (session('cate'))
                    <div class="alert alert-primary" >{{session('cate')}}</div>
                    @endif
                    @if (session('delete'))
                    <div class="alert alert-danger" >{{session('delete')}}</div>
                    @endif
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
                            @foreach ($data as $item)
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
                                
                            <td class="d-flex">
                                <a href="{{route('delete',$item->id)}}" class="btn btn-danger ml-1">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="{{route('delete',$item->id)}}" class="btn btn-info ml-1">
                                    Edite
                                </a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
