<?php 
	include 'includes/autoload.inc.php';

	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$city = $_POST['city'];
		$designation = $_POST['designation'];

		$fields = [
			'name' => $name,
			'city' => $city,
			'designation' => $designation
		];

		$employee = new Employee();

		$employee->insert($fields);
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Employees</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="index.php">POWER EMPLOYEE</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">About</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="#">Contact</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>

	<div class="container mt-4">	
		<div class="row">	
			<div class="col-lg-12">	
				<div class="jumbotron">	
					<h4 class="mb-4">Add Employee</h4>
					<form action="" method="POST">
					  <div class="form-group">
					    <label for="name">Name</label>
					    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
					  </div>

					  <div class="form-group">
					    <label for="city">City</label>
					    <input name="city" type="text" class="form-control" id="city" placeholder="City">
					  </div>

					  <div class="form-group">
					    <label for="desig">Designation</label>
					    <input type="text" class="form-control" id="desig" name="designation" placeholder="Designation">
					  </div>

					  <input type="submit" class="btn btn-primary" name="submit" value="Add">
					</form>
				</div>	
			</div>	
		</div>	
	</div>	
</body>
</html>