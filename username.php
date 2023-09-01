<?php include 'head.php'; ?>
<form class="container col-4" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<h1>Create HR Account</h1>
  <div class="form-group justify-content-center">
    <label for="exampleInputEmail1">Enter Name</label>
    <input type="text" class="form-control" required="required" name="name" aria-describedby="emailHelp" placeholder="Enter Name"> 
  </div>
  <div class="form-group justify-content-center">
    <label for="exampleInputEmail1">Enter Password</label>
    <input type="password" class="form-control" required="required" name="password" aria-describedby="emailHelp" placeholder="Enter Password"> 
  </div>
  <br>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
<?php 
	session_start();
	if (isset($_SESSION['name']) && isset($_SESSION['password'])) {
		header("Location:index.php");
	}
	if (isset($_POST['submit'])) {
		include 'dbcon.php';
		$name = $_POST['name'];
		$password = $_POST['password'];
		$password = sha1($password);
		$sql = "INSERT into admin(name,password) values ((:name),(:password))";
		$stmt = $connection->prepare($sql);
		$stmt ->bindParam(':name',$name);
		$stmt ->bindParam(':password',$password);
		$stmt ->execute();
		header("Location:index.php");
	}
?>