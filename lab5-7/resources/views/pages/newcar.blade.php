@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Add new Car</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (Session::has('form_status'))
                        <div class="alert alert-info" role="alert">
                            {{ session('form_status')  }}
                        </div> 
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                            
                    <form  method="post" name="newcar" action="/cars" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                                
                        <div class="form-group"><label class="small mb-1" for="inputMake">Car Make</label><input class="form-control py-4" id="inputMake" name="make" type="text" placeholder="Enter Make" /></div>
                        <div class="form-group"><label class="small mb-1" for="inputModel">Car Model</label><input class="form-control py-4" id="inputModel" name="model" type="text" placeholder="Enter Model" /></div>
                        <div class="form-group"><label class="small mb-1" for="inputProduction">Car Production Date</label><input class="form-control py-4" id="inputProduction" name="production" type="date" /></div>
                        
                        
                        <div class="form-group mt-4 mb-0"><button class="btn btn-success btn-block my-4" type="submit" name = "btn_save" value = "btn_save" >SAVE</button></div>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
