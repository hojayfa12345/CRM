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



					<a href="{{ route('all.employee') }}" class="btn btn-success btn-sm pull-right" style="float: right;">All Employees</a><br>
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif

					<form action="{{ route('store.employee') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">First Name</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="firstname" required="">

						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Last Name</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lastname" required="">

						</div>

						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Company</label>
							<select class="form-control" name="company_id">
								@foreach($company as $row)
								<option value="{{ $row->id }}">{{ $row->name }}</option>
								@endforeach
							</select>
							
						</div>

						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required="">
							<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
						</div>



						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Phone</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone" required="">
							
						</div>

						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Salary</label>
							<input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="salary" required="">
							
						</div>

						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Department</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="department" required="">
							
						</div>




						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
