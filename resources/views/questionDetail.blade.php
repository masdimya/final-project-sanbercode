@extends('layouts.master')

@section('title', 'Detail')

@section('content')

<div class="container">

	<div class="card">

		<form role="form">
			<div class="card-body">
				<h4>Judul</h4>
				<small>From &nbsp;&nbsp; <span class="badge badge-success">admin</span> &nbsp;&nbsp; 27, feb 2020</small>

				<div class="form-group">
					<div class="row align-items-center">
						<div class="col-md-11">
							<div class="m-3">
								Isi pertanyaan bos
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