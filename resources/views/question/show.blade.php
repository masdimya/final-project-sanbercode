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
							{!! $question->content !!}
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

			@foreach($question->tags as $tag)

			<a href="#" class="btn btn-success">{{$tag->tag_name}}</a>

			@endforeach
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" class="btn btn-info"><i class="fa fa-star" aria-hidden="true"></i> 16</a>
			<a href="#" class="btn btn-danger"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
			<a href="#" class="btn btn-dark"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
		</div>
	</div>

	<div class="card">

		<div class="card-header d-flex align-items-center">

			<h4>{{count($question->answer)}} Jawaban</h4>

		</div>
		
		<div class="card-body">
			@foreach ($question->answer as $answer)
			<div class="card">
				<div class="card-body">
					<div class="form-group">
						<div class="row align-items-center">
							<div class="col-md-11">
								<div class="m-3">
									{!! $answer->content !!}
								</div>
								<div class="m-3 d-flex">
									<small class="ml-auto">
										From &nbsp;&nbsp; <span class="badge badge-success">{{ $answer->user->name }}</span> &nbsp;&nbsp; {{date_format(date_create($answer->updated_at),'F, d Y ')}}
									</small>
								</div>
								<hr>
								<div class="pl-5"> 

									@isset($answer->comment)
									@foreach($answer->comment as $key => $value)
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
										<form role="form" action="/answer/addComment" method="POST">

											@csrf
											<input type="hidden" name="answer_id" value="{{ $answer->id }}">
											<input type="hidden" name="question_id" value="{{ $answer->question->id }}">
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
					<a href="#" class="btn btn-info"><i class="fa fa-star" aria-hidden="true"></i> 16</a>
					<a href="#" class="btn btn-danger"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
					<a href="#" class="btn btn-dark"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
					<a href="#" class="btn btn-success"><i class="fa fa-certificate" aria-hidden="true"></i> Approved</a>
				</div>
			</div>
			@endforeach

			<form method="POST" action="{{route('answer.add')}}">
				@csrf
				<div class="form-group">
					<label for="answer">Jawab pertanyaan</label>
					<input type="hidden" name="question_id" value={{$question->id}}>
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