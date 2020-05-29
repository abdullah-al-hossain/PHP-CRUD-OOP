<?php 
	include 'includes/autoload.inc.php';

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$employee = new Employee();

		$employee->delete($id);
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
					<h4 class="mb-4">All Employees</h4>
					<a class="mb-2 btn btn-success text-white" href="create.php">Add Employee</a>
					<table class="table table-striped table-dark table-hover">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Name</th>
					      <th scope="col">City</th>
					      <th scope="col">Designation</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
					  		$employee = new Employee;
					  		$rows = $employee->select();

					  		// print_r($rows);
					  	 ?>
					  	 
					  	 <?php foreach ($rows as $row): ?>
						  	 <tr>
						      <td><?php echo $row['id'] ?></td>
						      <td><?php echo $row['name'] ?></td>
						      <td><?php echo $row['city'] ?></td>
						      <td><?php echo $row['designation'] ?></td>
						      <td>
						      	<a class="btn btn-sm btn-primary" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
						      	<a class="btn btn-sm btn-danger" href="index.php?id=<?php echo $row['id']; ?>">Delete</a>
						      </td>
						    </tr>
					  	<?php endforeach ?>
					    

					  </tbody>
					</table>
				</div>	
			</div>	
		</div>	
	</div>	
</body>
</html>