<?php
  session_start();
  if (isset($_SESSION['name']) && isset($_SESSION['password'])) {
     header("Location:template/admin/index.php");
   } 
?>
<form class="container col-5 mt-5" method="post" action="functions.php">
  <?php
  if (isset($_GET['text'])) {
    echo "<h4 class='text-danger'>".$_GET['text']."</h4>";  }
  ?>
  <h1>Login For HR</h1>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required="required">
  </div>
  <button type="submit" name="login" class="btn btn-primary">Login</button>
</form>

