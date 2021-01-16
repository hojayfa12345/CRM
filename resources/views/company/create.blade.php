@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Dashboard</div>

				<div class="card-body">
					@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
					@endif



					<a href="{{ route('all.company') }}" class="btn btn-success btn-sm pull-right" style="float: right;">All Companies</a><br>
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif

					<form action="{{ route('store.copany') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Name</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required="">

						</div>

						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required="">
							<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
						</div>

						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Logo</label>
							<input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="logo" required="">
							
						</div>

						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Website</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="website" required="">
							
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
