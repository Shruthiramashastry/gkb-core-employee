<!DOCTYPE html>
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
  <h1>Employee Task</h1>
  <p>Update employee</p> 
</div>

<!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>    
    </ul>
  </div>  
</nav> -->

<div class="container-fluid">
  <h2>Edit employee details</h2>
  
  <form method="post" action="/update_emp/{{$data['id']}}" enctype="multipart/form-data">
    {{@csrf_field()}}
    <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="text" class="form-control" id="usr" name="fname" value="{{$data['fname']}}">
    </div>
    <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" class="form-control" id="pwd" name="lname" value="{{$data['lname']}}">
    </div>
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="usr" name="email" value="{{$data['email']}}">
    </div>
    <div class="form-group">
      <label for="hob">Hobbies:</label>
      <input type="text" class="form-control" id="pwd" name="hobbies" value="{{$data['hobbies']}}">
    </div>
    <div class="form-group">
      
      <label for="gen">Gender:</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" value="Male" {{ $data['gender'] == 'Male' ? 'checked' : ''}} name="gender" id="flexRadioDefault1" >
        <label class="form-check-label" for="flexRadioDefault1">
          Male
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" value="Female" {{ $data['gender'] == 'Female' ? 'checked' : ''}} name="gender" id="flexRadioDefault2" >
        <label class="form-check-label" for="flexRadioDefault2">
          Female
        </label>
      </div>
    </div>

    <div class="form-group">
      <label for="doj">Joining date:</label>
      <input type="date" class="form-control" id="pwd" name="joining_date" value="{{$data['joining_date']}}">
    </div>

    <div class="form-group">
      <label for="img">Employee Image:</label>
      <img src="@if($data['emp_img']==''){{  asset('assets/images/vector.jpg')}} @else {{asset('assets/images/'.$data['emp_img']) }}@endif" width="50" height="50">
      <input type="file" class="form-control" id="img" name="emp_img">
    </div>

    <div class="form-group">
      <label for="dept">Department:</label>
      <input type="text" class="form-control" id="pwd" name="department" value="{{$data['department']}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <br>
</div>
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

</body>
</html>
