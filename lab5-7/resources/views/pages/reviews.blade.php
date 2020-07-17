@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                @foreach ($cars as $car)
                <div class="card-header text-center">{{ $car->make }} <sup>TM </sup>{{ $car->model }} Reviews</div>

                <div class="card-body">
                        Car Production Date: {{ $car->produced_on }} <br>
                    Reviews:
                    @foreach ($car->reviews as $review)
                        <ol>
                        <em style="padding-left:5em">{{ $review['comment'] }}</em><br>
                        <em style="padding-left:15em"> LAST UPDATED: {{ $review['updated_at'] }}</em>
                        <ol>
                    @endforeach
                    

                @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection