@extends('layouts.master')

@section('title', 'Edit a Question')

@section('content')

<div class="container">
	
	<form action="/questions" method="POST">

		@csrf
		@method('PUT')

		<input type="hidden" value="{{ Auth::id() }}" name="user_id">

		<div class="form-group">
			<label for="title">Judul</label>
			<input type="text" class="form-control" id="title" name="title">	
		</div>
		<div class="form-group">
			<label for="content">Isi Pertanyaan</label>
			<textarea name="content" id="content" rows="10" cols="80">
		</textarea>
		</div>
		<div class="form-group">
			<label for="tag">Tag</label>
			<input type="text" id="tag" name="tag" class="form-control">
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