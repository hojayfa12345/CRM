@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">

<div class="card-header">Dashboard</div>
				<div class="card-body">
					<a href="{{ route('add.company') }}" class="btn btn-success btn-sm pull-right" style="float: right;">Add Companies</a><br><br>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Name</th>
								<th scope="col">Mail</th>
								<th scope="col">Website</th>
								<th scope="col">Logo</th>
						
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($post as $row)
							<tr>


								<td>{{ $row->id }}</td>
								<td>{{ $row->name }}</td>
								<td>{{ $row->email }}</td>
								<td>{{ $row->website }}</td>
								<!-- <td>{{ $row->logo }}</td> -->
								  <td><img src="{{ URL::to($row->logo) }}" height="50px;" width="50px;"></td>
							
								<td>
									<a href="{{ URL::to('edit/company/'.$row->id) }}" class="btn btn-sm btn-info">edit</a>
									<a href="{{ URL::to('delete/company/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">delete</a>
								</td>
							</tr>

							@endforeach



						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
