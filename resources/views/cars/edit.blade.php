@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a car</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('cars.update', $car->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="make">Make:</label>
                <input type="text" class="form-control" name="make" value={{ $car->make }} />
            </div>

            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" name="model" value={{ $car->model }} />
            </div>

            <div class="form-group">
                <label for="produced_on">Produced on:</label>
                <input type="date" class="form-control" name="produced_on" value={{ $car->produced_on }} />
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection