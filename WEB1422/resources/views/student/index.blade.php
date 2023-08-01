@extends('templates.layout')
@section('content')
    <h1>{{$name}}</h1>
    <form action="{{url('/student')}}" method="POST">
        @csrf
        <label>
            Email <input type="text" name="email">
        </label>
        
        <input type="submit" name="btnSearch" value="Tìm Kiếm">
    </form>
    <table border="2">
        <tr>
            <td>Id</td>
            <td>Name</td>
        </tr>
        @foreach($students as $st)
        <tr>
            <td>{{$st->id}}</td> 
            <td>{{$st->name}}</td>
        </tr>
        @endforeach
    </table>
@endsection