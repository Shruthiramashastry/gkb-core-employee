<!doctype html>
<html lang="en">
  <head>
    <title>Employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
  </head>
  <body>

  	<div class="jumbotron text-center" style="margin-bottom:0">
   <h1>Employees Informations</h1>
  <p>Employee details</p> 
</div>

   
<div class="container-fluid">
	<button type="button" class="btn btn-primary"><a href="{{url('createEmp')}}" style="color:white">Create employee</a></button>
</div>
    {{session('msg')}}
    <div class="dropdown-divider"></div>
    <div class="container-fluid">
  		<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Hobbies</th>
      <th scope="col">Gender</th>
      <th scope="col">Joining date</th>
      <th scope="col">Department</th>
      <th scope="col">Action</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  	@foreach($data as $employee)
  		<tr>
	      <!-- <th scope="row">1</th> -->
	      <td>{{$employee['id']}}</td>
	      <td>{{$employee['fname']}}</td>
	      <td>{{$employee['lname']}}</td>
	      <td>{{$employee['email']}}</td>
	      <td>{{$employee['hobbies']}}</td>
	      <td>{{$employee['gender']}}</td>
	      <td>{{$employee['joining_date']}}</td>
	      <td><img src="@if($employee['emp_img']==''){{  asset('assets/images/vector.jpg')}} @else {{asset('assets/images/'.$employee['emp_img']) }}@endif" width="50" height="50"></td>
	      <td>{{$employee['department']}}</td>
	      <td><a href="/empEdit/{{$employee['id']}}">Edit</a></td>
	      <td><a href="/empDel/{{$employee['id']}}">Delete</a></td>
	    </tr>
  	@endforeach
  </tbody>
</table>
	</div>
	    <div class="jumbotron text-center" style="margin-bottom:0">
	  <p>Footer</p>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>