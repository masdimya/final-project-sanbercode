@extends('layouts.master')

@section('title', 'Detail')

@section('content')

<div class="container">

	<div class="card">

		
		<div class="card-body">
			<h4>{{ $question->title }}</h4>
			<small>From &nbsp;&nbsp; 
				<span class="badge badge-success mr-2">{{ $question->user->name }}</span>
			    <span class="mr-3"><i class="fa fa-star text-warning" aria-hidden="true"></i> {{$question->user->reputasi}}</span> {{date_format(date_create($question->updated_at),'F, d Y ')}}</small>

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
									  <span class="mr-3"><i class="fa fa-star text-warning" aria-hidden="true"></i> {{$value->user->reputasi}}</span> 
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

		
		<div class="card-footer d-flex">
			@foreach($question->tags as $tag)

			<a href="#" class="btn btn-success">{{$tag->tag_name}}</a>

			@endforeach
			<a href="#" class="btn btn-warning ml-1 mr-1"><i class="fa fa-star" aria-hidden="true"></i> {{$question->total_vote}}</a>
			<form class="ml-1 mr-1" action="{{route('question.vote',['question_id'=>$question->id,'vote_type'=>'upvote'])}}" method="POST">
				@csrf
				
				<button type="submit" class="btn btn-primary" {{setVoteIndicator($question->question_vote->first(),'upvote')}}><i class="fa fa-thumbs-up" aria-hidden="true"></i> {{$question->question_upvote->count()}}</button>
				
			</form>
			<form class="ml-1 mr-1" action="{{route('question.vote',['question_id'=>$question->id,'vote_type'=>'downvote'])}}" method="POST">
				@csrf
				<button type="submit" class="btn btn-danger" {{setVoteIndicator($question->question_vote->first(),'downvote')}} ><i class="fa fa-thumbs-down" aria-hidden="true"></i> {{$question->question_downvote->count()}}</button>
			</form>
		</div>
	</div>

	<div class="card">

		<div class="card-header d-flex align-items-center">

			<h4>{{count($question->answer)}} Jawaban</h4>

		</div>
		
		<div class="card-body">
			@foreach ($question->answer as $answer)
			<div class="card">
				<form role="form">
					<div class="card-body">
						<div class="form-group">
							<div class="row align-items-center">
									<div class="col-md-11">
										<div class="m-3">
											{!! $answer->content !!}
										</div>
										<div class="m-3 d-flex">
											<small class="ml-auto">
												From &nbsp;&nbsp; <span class="badge badge-success m-2">{{ $answer->user->name }}</span>
									  			<span class="mr-3"><i class="fa fa-star text-warning" aria-hidden="true"></i> {{ $answer->user->reputasi}}</span> 
												&nbsp;&nbsp; {{date_format(date_create($answer->updated_at),'F, d Y ')}}
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
				</form>
				<div class="card-footer d-flex">
					<a href="#" class="btn btn-success">laravel</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#" class="btn btn-warning ml-1 mr-1"><i class="fa fa-star" aria-hidden="true"></i> {{$answer->total_vote}}</a>
					<form class="ml-1 mr-1" action="{{route('answer.vote',['question_id'=>$question->id,'answer_id'=>$answer->id,'vote_type'=>'upvote'])}}" method="POST">
						@csrf
						
						<button type="submit" class="btn btn-primary" {{setVoteIndicator($answer->answer_vote->first(),'upvote')}}><i class="fa fa-thumbs-up" aria-hidden="true"></i> {{$answer->answer_upvote->count()}}</button>
						
					</form>
					<form class="ml-1 mr-1" action="{{route('answer.vote',['question_id'=>$question->id,'answer_id'=>$answer->id,'vote_type'=>'downvote'])}}" method="POST">
						@csrf
						<button type="submit" class="btn btn-danger" {{setVoteIndicator($answer->answer_vote->first(),'downvote')}} ><i class="fa fa-thumbs-down" aria-hidden="true"></i> {{$answer->answer_downvote->count()}}</button>
					</form>
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