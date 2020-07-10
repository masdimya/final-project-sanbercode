@extends('layouts.master')

@section('title', 'Detail')

@section('content')

<div class="container">

	<div class="card">

		
		<div class="card-body">
			<h4>{{ $question->title }}</h4>
			<small>From &nbsp;&nbsp; <span class="badge badge-success">{{ $question->user->name }}</span> &nbsp;&nbsp; {{date_format(date_create($question->updated_at),'F, d Y ')}}</small>

			<div class="form-group">
				<div class="row align-items-center">
					<div class="col-md-11">
						<div class="m-3">
							{{ $question->content }}
						</div>
						<hr>
						<div class="pl-5"> 

							@isset($question->QuestionComment)
							@foreach($question->QuestionComment as $key => $value)
							<div class="coment">
								<h6 class="small">
									{{$value->comment}} 
									- <span class="badge badge-primary">{{$value->user->name}}</span> 
									<span class="text-muted"> {{date_format(date_create($value->updated_at),'F, d Y ')}} </span> 
								</h6>
								<hr>
							</div>
							@endforeach
							@endisset


							<div class="add-comment">
								<form role="form" action="/question/addComment" method="POST">

									@csrf
									<input type="hidden" name="question_id" value="{{ $question->id }}">
									<input type="hidden" value="{{ Auth::id() }}" name="user_id">
									<input class="border-0 small col-9" type="text" name="comment" placeholder="add comment">
									<input type="submit" class="btn btn-sm btn-primary small" value="Add Comment">
									<hr>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

		
		<div class="card-footer">
			<a href="#" class="btn btn-success">laravel</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" class="btn btn-info"><i class="fa fa-star" aria-hidden="true"></i> 16</a>
			<a href="#" class="btn btn-danger"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 20</a>
			<a href="#" class="btn btn-dark"><i class="fa fa-thumbs-down" aria-hidden="true"></i> 4</a>
		</div>
	</div>

	<div class="card">

		<div class="card-header d-flex align-items-center">

			<h4>5 Jawaban</h4>

		</div>
		
		<div class="card-body">
			
			<div class="card">

				<form role="form">
					<div class="card-body">

						<div class="form-group">
							<div class="row align-items-center">
								<div class="col-md-11">

									<div class="m-3">
										Isi Jawaban
									</div>
									<div class="m-3 d-flex">
										<small class="ml-auto">
											from admin &nbsp;&nbsp;&nbsp;&nbsp; 30 maret 2020
										</small>
									</div>
									<hr>
									<div class="pl-5"> 
										<div class="coment">
											<h6 class="small">
												Comen Bos 
												- <span class="badge badge-primary">admin</span> 
												<span class="text-muted"> 05-01-2020 </span> 
											</h6>
											<hr>
										</div>


										<div class="add-comment">
											<input class="border-0 small col-9" type="text" name="comment" placeholder="add comment">
											<input type="submit" class="btn btn-sm btn-primary small" value="Add Comment">
											<hr>
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>

				</form>
				<div class="card-footer">
					<a href="#" class="btn btn-success">laravel</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#" class="btn btn-info"><i class="fa fa-star" aria-hidden="true"></i> 16</a>
					<a href="#" class="btn btn-danger"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 20</a>
					<a href="#" class="btn btn-dark"><i class="fa fa-thumbs-down" aria-hidden="true"></i> 4</a>
					<a href="#" class="btn btn-success"><i class="fa fa-certificate" aria-hidden="true"></i> Approved</a>
				</div>
			</div>

			<form>
				
				<div class="form-group">
					<label for="answer">Jawab pertanyaan</label>
					<textarea name="answer" id="answer" rows="10" cols="80">
					</textarea>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>

			</form>

		</div>

	</div>

</div>

@endsection

@push('script')

<script type="text/javascript">
	
	CKEDITOR.replace( 'answer' );

</script>

@endpush