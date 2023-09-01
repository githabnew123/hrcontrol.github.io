<?php 
	session_start();
	if (!(isset($_SESSION['name']) && isset($_SESSION['password']))) {
		header("Location:index.php");
	}
?>
<?php include 'head.php'; ?>
<!-- <form method="post" action="functions.php">
	<button class="btn btn-danger" type="submit" name="logout">Logout</button>
</form> -->

<ul class="nav nav-tabs bg-primary">
  <li class="nav-item col-2">
    <a class="nav-link active" href="#">Employee List</a>
  </li>
  <li class="nav-item col-2">
    <a class="nav-link text-light" href="#">Report</a>
  </li>
  <li class="nav-item col-2">
    <a class="nav-link text-light" href="#">Announcement</a>
  </li>
  <li class="nav-item col-2 btn-danger">
    <a class="nav-link text-light" href="#">Logout</a>
  </li>
</ul>
