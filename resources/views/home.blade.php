@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><b>{{$name}}</b> Tasks</div>

                <div class="card-body">
                    @if (session('cate'))
                    <div class="alert alert-primary" >{{session('cate')}}</div>
                    @endif
                    @if (session('delete'))
                    <div class="alert alert-danger" >{{session('delete')}}</div>
                    @endif
                    @if (session('update'))
                    <div class="alert alert-danger" >{{session('update')}}</div>
                    @endif
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            
                            <th scope="col">Number</th>
                            <th scope="col">Tasks</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            @foreach ($data as $item)
                            <td>{{$item->id}}</td>
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
