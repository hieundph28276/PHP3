@extends('templates.layout')
@section('content')
<form action="{{url('/addStudent')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label  class="form-label" >Email</label>
        <input type="text" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label  class="form-label" >Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <button class="btn btn-success" type="submit">Thêm</button>
</form>
@endsection