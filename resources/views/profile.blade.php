@extends('layouts.app')

@section('content')
                
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
    
            <div class="card">
                <div class="card-body p-5">
    
                <form enctype="multipart/form-data" class="d-flex justify-content-center align-items-center mb-4" method="POST" action="{{route('profile.add')}}">
                    @csrf

                    
                    <div class="input-group mb-3">
                        
                        <input type="text" id="form2" class="form-control" placeholder="New task..." aria-label="Recipient's username" aria-describedby="button-addon2" name="newDo">
                        
                        <button class="btn btn-info" type="submit" id="button-addon2" name="addDo">Button</button>
                    </div>
                </form>
    
                <!-- Tabs navs -->
                <ul class="nav nav-tabs mb-4 pb-2" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab"
                        aria-controls="ex1-tabs-1" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab"
                        aria-controls="ex1-tabs-2" aria-selected="false">Active</a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="#ex1-tabs-3" role="tab"
                        aria-controls="ex1-tabs-3" aria-selected="false">Completed</a>
                    </li>
                </ul>
                <!-- Tabs navs -->
    
                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                    aria-labelledby="ex1-tab-1">
                    
                        

                        @if (empty($task))
                        <div class="alert alert-danger text-center">No Added Tasks Yet</div>
                        @else
                        @foreach ($task as $item)
                        <ul class="list-group mb-0">
                                <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                    style="background-color: #f4f6f7;">
                                <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." checked />
                            {{-- <s>Cras justo odio</s> --}}
                            {{$item->task}}
                            </li> 
                        @endforeach
                        @endif
                    </ul>

                    </div>
                    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                    <ul class="list-group mb-0">
                        <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                        style="background-color: #f4f6f7;">
                        <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
                        Morbi leo risus
                        </li>
                        <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                        style="background-color: #f4f6f7;">
                        <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
                        Porta ac consectetur ac
                        </li>
                        <li class="list-group-item d-flex align-items-center border-0 mb-0 rounded"
                        style="background-color: #f4f6f7;">
                        <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
                        Vestibulum at eros
                        </li>
                    </ul>
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