@extends('layouts.app')

@section('content')
                
    <section class="vh-100 gradient-custom">
        <div class="container  h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <h1>Create New Tasks</h1>
    
            <div class="card">
                <div class="card-body p-5">
    
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
                    
                        

                        @if (empty($task))
                        <div class="alert alert-danger text-center">No Added Tasks Yet</div>
                        @else

                        @foreach ($task as $item)
                        <ul class="list-group mb-0">
                            <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                style="background-color: #f4f6f7;">

                        @if ($item->status=="not complete")
                                <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
                                {{$item->task}}
                        @else
                        <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." checked/>
                        <s>{{$item->task}}</s>
                        @endif
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