@extends('base')

<div>
    <a style="margin: 19px;" href="{{ route('cars.create')}}" class="btn btn-primary">New car</a>
 </div>  

@section('main')

<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>

<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Cars</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Make</td>
          <td>Model</td>
          <td>Produced on</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->make}}</td>
            <td>{{$car->model}}</td>
            <td>{{$car->produced_on}}</td>
            <td>
                <a href="{{ route('cars.edit',$car->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('cars.destroy', $car->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection