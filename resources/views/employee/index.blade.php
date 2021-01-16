@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">

				<div class="card-header">Dashboard</div>
				<div class="card-body">
					<a href="{{ route('add.employee') }}" class="btn btn-success btn-sm pull-right" style="float: right;">Add Employee</a><br><br>

					 <form action="{{ route('all.employee') }}" method="get" >
       {{ csrf_field() }}
        <label for="category">Companyy </label>
  
        <select name="company_id" id="category">
         <option label="Choose Company"></option>
         @foreach($company as $row)
         <option value="{{ $row->id }}" <?php if ($row->id == $request->company_id) {
                      echo "selected";
                    } ?>>{{ $row->name }}</option>
         @endforeach
       </select><br>

       <label for="category">Salary</label>
 
        <select name="salary" id="Salary">
         <option label="Choose Salary"></option>
         @foreach($employee as $row)
         <option value="{{ $row->salary }}" <?php if ($row->salary == $request->salary) {
                      echo "selected";
                    } ?>>{{ $row->salary }}</option>
         @endforeach
       </select><br>

         <label for="category">Department </label>
 
        <select name="department" id="category">
         <option label="Choose Department"></option>
         @foreach($employee1 as $row)
         <option value="{{ $row->department }}" <?php if ($row->department == $request->department) {
                      echo "selected";
                    } ?>>{{ $row->department }}</option>
         @endforeach
       </select>&nbsp;&nbsp;


    
       <input type="submit" value="Submit">
     </form>
          <br>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">First Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Company</th>
								<th scope="col">Mail</th>
								<th scope="col">Phone</th>
								<th scope="col">Salary</th>
								<th scope="col">Department</th>

								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($post as $row)
							<tr>


								<td>{{ $row->id }}</td>
								<td>{{ $row->firstname }}</td>
								<td>{{ $row->lastname }}</td>
								<td>{{ $row->name }}</td>
								<td>{{ $row->email }}</td>
								<td>{{ $row->phone }}</td>
								<td>{{ $row->salary }}</td>
								<td>{{ $row->department }}</td>
								

								

								<td>
									<a href="{{ URL::to('edit/employee/'.$row->id) }}" class="btn btn-sm btn-info">edit</a>
									<a href="{{ URL::to('delete/employee/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">delete</a>
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
