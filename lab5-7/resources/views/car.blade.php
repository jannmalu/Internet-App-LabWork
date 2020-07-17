<!DOCTYPE html>
<html>
    <head>
        <title>

        </title>
    </head>

    <body>
        @foreach ($cars as $car)
            <li> {{ $car->make }}</li>
            <li> {{ $car->model }}</li>
            <li> {{ $car->produced_on }}</li>
            <li>Reviews:
            @foreach ($car->reviews as $review)
                <br>
                <em style="padding-left:5em">{{ $review['comment'] }}</em>
            @endforeach
            </li>
        @endforeach
    
    </body>


</html>