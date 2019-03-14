<!DOCTYPE html>
<html>
<head>
    <title>Sales Force Automation</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="jumbotron">
        <h1><center>Sales Force Automation</center></h1>
    </div>
</div>
<div class="container">
<div class="row">
	<div class="col-md-12">
		<br/>
		<h3 align="center">Rep Details</h3>
		<br/>
		@if($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{$message}}</p>
		</div>
		@endif
		<div align="right">
			<a href="{{route('employee.create')}}" class="btn btn-primary">Add Member</a>
			<br/>
			<br/>
		</div>
		<table class="table table-bordered">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Telephone</th>
				<th>Join-Date</th>
				<th>Current Routes</th>
				<th>Comments</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			@foreach($employees as $row)
			<tr>
				<td>{{$row['name']}}</td>
				<td>{{$row['email']}}</td>
				<td>{{$row['tel']}}</td>
				<td>{{$row['jdate']}}</td>
				<td>{{$row['route']}}</td>
				<td>{{$row['comment']}}</td>
				<td><a href="{{action('emp_control@edit',$row['id'])}}" class="btn btn-warning">Edit</a></td>
				<td>
					<form method="post" class="delete_form" action="{{action('emp_control@destroy',$row['id'])}}">
						{{csrf_field()}}
						<input type="hidden" name="_method" value="DELETE" />
						<button type="submit" class="btn btn-danger">Delete</button>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
	</div>
</div>
	<script>
	$(document).ready(function(){
	$('.delete_form').on('submit',function(){
		if (confirm("Are you sure you want to delete this data?")) 
		{
			return true;
		}
		else
		{
			return false;
		}
	});

});
</script>
</div>
</body>
</html>