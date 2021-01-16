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
				

					<form action="{{ url('update/company/'.$company->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Name</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required="" value="{{ $company->name }}">

						</div>

						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required="" value="{{ $company->email }}">
							<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
						</div>

						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Website</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="website" required="" value="{{ $company->website }}">
							
						</div>

						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Logo</label>
							<input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="logo">
							
						</div>

						

						
						<div class="col-lg-4">
							<lebel>Old Logo<span class="tx-danger">*</span></lebel>
							<label class="custom-file">
								<img src="{{ URL::to($company->logo) }}" style="height: 80px; width: 140px;" >
								<input type="hidden" name="old_logo" value="{{ $company->logo }}">
							</label>
						</div>

						<button type="submit" class="btn btn-primary" style="float: right;">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
