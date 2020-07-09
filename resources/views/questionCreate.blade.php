@extends('layouts.master')

@section('title', 'Make a Question')

@section('content')

<div class="container">
	
	<form>
		<div class="form-group">
			<label for="title">Judul</label>
			<input type="text" class="form-control" id="title" name="title">	
		</div>
		<div class="form-group">
			<label for="question">Isi Pertanyaan</label>
			<textarea name="question" id="question" rows="10" cols="80">
		</textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

</div>

@endsection

@push('script')

<script type="text/javascript">
	
	CKEDITOR.replace( 'question' );

</script>

@endpush