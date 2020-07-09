@extends('layouts.master')

@section('title', 'Forum')

@section('content')


<div class="container">

	<a href="/question/create" class="btn btn-primary mb-4"><i class="fa fa-plus" aria-hidden="true"></i> Make Question</a>

	<div class="card">
		<div class="card-body">
			<div class="user-block">
				<img class="img-circle" src="{{ asset('adminlte/dist/img/user1-128x128.jpg')}}" alt="User Image">
				<span class="username"><a href="#">value->title </a></span>
				<span class="description"> value->user->name - value->updated_at </span>
			</div>
		</div>
		<div class="card-footer">
			<a href="#" class="btn btn-success">value->tag</a>
			<a href="#" class="btn btn-info"><i class="fa fa-comments" aria-hidden="true"></i> 100</a>
		</div>
	</div>

</div>

@endsection