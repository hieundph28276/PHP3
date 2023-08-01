@extends('templates.layout')
@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf
    <div class="mb-3">
        <label  class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label class="form-label">Pass</label>
        <input type="password" name="password" class="form-control"  >
    </div>
        <button type="submit" class="btn btn-success">Đăng nhập</button>
    </form>
@endsection