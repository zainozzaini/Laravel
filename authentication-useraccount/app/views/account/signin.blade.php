@extends('layout.main')

@section('content')
	<form action="{{ URL::route('account-sign-in-post') }}" method="post">


		<div class="field">
			Email:<input type="text" name="email" 
			{{ (Input::old('email')) ? 'value="'. Input::old('email').'"':'' }}>
			@if($errors->has('email'))
				{{$errors->first('email')}}
			@endif
		</div>

		<div class="field">
			Password:<input type="password" name="password">
		</div>

		<div class="field">
			<input type="checkbox" name="remember" id="remember">
			<label for="remeber">Remeber me</label>
		</div>

		<input type="submit" value="Sign in">
		{{Form::token()}}

	</form>
@stop