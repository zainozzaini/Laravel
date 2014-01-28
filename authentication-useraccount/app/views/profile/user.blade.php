@extends('layout.main')

@section('content')

	User Profile <br><br>
	{{$user->username}}<br><br>
	{{$user->email}}
@stop