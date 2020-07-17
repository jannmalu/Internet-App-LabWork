@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Car actions...

                    <div class="d-flex justify-content-center py-4">
                        <a class="btn btn-info" href="cars/">All Cars</a>
                    </div>
                    <div class="d-flex justify-content-center py-4">
                        <a class="btn btn-info" href="cars/newcar">New Car</a>
                    </div>
                    <div class="alert alert-info mx-auto col-lg-6">
                        Search a Car using Car ID.
                    </div>
                    <div class="d-flex justify-content-center form-group">
                        <input class="form-control col-lg-3" id="car_id" type ="number" placeholder="Enter ID e.g 1"/>
                        <button class="btn btn-outline-success" onclick="
                                var id = document.getElementById('car_id').value;
                                window.location.href = 'cars/'+id+'/';
                            ">Search Car</button>

                    </div>
                    
                    <div class="alert alert-info mx-auto col-lg-6">
                        Search a car Review using Car ID.
                    </div>
                    <div class="d-flex justify-content-center form-group">
                        <input class="form-control col-lg-3" id="car_id2" type ="number" placeholder="Enter ID e.g 1"/>
                        <button class="btn btn-outline-success" onclick="
                                var id = document.getElementById('car_id2').value;
                                window.location.href = 'cars/reviews/'+id+'/';
                            ">Search Reviews</button>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection