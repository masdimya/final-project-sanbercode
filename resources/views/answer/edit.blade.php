@extends('layouts.master')

@section('title', 'Edit a Answer')

@section('content')

<div class="container">
	
	<form action="{{route('answer.update',['answer'=>$answer->id])}}" method="POST">

		@csrf
		@method('PUT')

		<div class="form-group">
			<label for="content">Answer</label>
		<textarea name="content" id="content" rows="10" cols="80">{!!$answer->content !!}</textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

</div>

@endsection

@push('script')

<script type="text/javascript">
	
	CKEDITOR.replace( 'content' );

</script>

@endpush