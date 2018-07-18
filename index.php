<?php 
require_once("./db.php") ?>
<!-- 方法定义只能require once -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

   <title>login</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">NY1</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Login</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>
<?php 

	   $login_wrong=false;
if ($_POST){
	$result=loginCheck2($_POST['user-email'],$_POST['user-pwd']);
	// var_dump($result);
	if($result){
		$Interests=loginCheck1($result['id']);
		foreach($Interests as $value){
            $array[]=$value['userInterests'];
		}
		// print_r($array);
		$newURL="./user.php";
		session_start();
		$_SESSION['id']=$result['id'];
		// $_SESSION['email']=$result['email'];
		$_SESSION['interests']=$array;
		header('Location:'.$newURL);

	}else{
		$login_wrong=true;
	}
}

?>

<div class="container mt-5"><!-- margintop -->
	<div class="jumbotron">
	  <h1 class="display-5">login into NY-1</h1>
	  
	  <hr class="my-4">
	 
	 <form action="" method="POST">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="user-email">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="user-pwd">
	  </div>
<!-- 	  <div class="form-group form-check">
	    <input type="checkbox" class="form-check-input" id="exampleCheck1">
	    <label class="form-check-label" for="exampleCheck1">Check me out</label>
	  </div> -->
	  <button type="submit" class="btn btn-primary">Submit</button>
	  <?php 
           if($login_wrong){
	   ?>
	   	  <div class="alert alert-warning" role="alert">
			  Login Error! Password is wrong!
			</div>
		<?php
		  }
		?>
	</form>
	</div>
</div>
	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>