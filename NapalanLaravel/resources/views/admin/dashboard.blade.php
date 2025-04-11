@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Welcome Admin, {{ Auth::guard('admin')->user()->name }}</h2>

    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
@endsection
