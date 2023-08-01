@extends('templates.layout')
@section('content')
<h1>{{$name}}</h1>
<form action="{{url('/student')}}" method="POST">
    @csrf
    <label>
        Email <input type="text" name="name">
    </label>

    <input type="submit" name="btnSearch" value="Tìm Kiếm">
</form>
<div>
    <a href="{{ route('logout') }}">logout</a>
</div>
<table class="table">
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Anh</td>
        <td>Hanh dong</td>
        <!-- <td>Hanh dong</td> -->
    </tr>
    @foreach($students as $st)
    <tr>
        <td>{{$st->id}}</td>
        <td>{{$st->name}}</td>
        <td><img src="{{ $st->image?''.Storage::url($st->image):''}}" style="width: 100px" /></td>
        <td>
            <a href="{{ route('route_student_edit',['id'=>$st->id]) }}">
                <button class="btn btn-primary">sua</button>    
            </a>
            <a href="{{ route('route_student_delete',['id'=>$st->id]) }}">
                <button class="btn btn-danger">Xao</button>
            </a>
        </td>
    </tr>
    @endforeach
</table>
@endsection