@extends('layouts.master')

@section('title', 'Edit a Question')

@section('content')

<div class="container">
	
	<form action="/questions" method="POST">

		@csrf

		<input type="hidden" value="{{ Auth::id() }}" name="user_id">

		<input type="hidden" value="0" name="total_vote">

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
			<label for="tag">Tag*</label>
			<input type="text" id="tag" name="tag" class="form-control" aria-describedby="tagHelp">
			<small id="tagHelp" class="form-text text-muted">*Pisahkan tiap tag dengan tanda koma (,)</small>
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