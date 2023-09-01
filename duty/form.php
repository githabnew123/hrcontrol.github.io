<?php 
  session_start();
  if (isset($_SESSION["name"])) {
    
  }else {
    header("Location:username.php");
  }
?>
<form class="container" method="post" action="functions.php">
  <h1>
    <?php
      date_default_timezone_set('Asia/Rangoon');
      $timestamp = date('H:i:s');
      $today = date("d-m-Y");
      echo $today;
    ?>
    <?php
      $ipaddress = getenv("REMOTE_ADDR") ;
    ?>
  </h1>
  <h1 id="span"></h1>
  <script type="text/javascript">
    var span = document.getElementById('span');
    function time() {
      var d = new Date();
      var s = d.getSeconds();
      var m = d.getMinutes();
      var h = d.getHours();
      span.textContent = ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
    }
    setInterval(time, 1000);
  </script>
  <?php 
    include 'functions.php';
    $data = $_SESSION["ip"];
    $user = get_name_with_ip($data);
  ?>
  <div class="col-12 row justify-content-between">
    <button type="submit" class="btn btn-primary col-6" disabled="disabled">
    <?php 
      foreach ($user as $key => $value) {
         echo $value[0];
       } 
    ?></button>
    <?php
      $duty = get_duty();
      if ($duty==null) {
        echo '<button type="submit" class="btn btn-success col-2" name="d_in">In</button>';
      }else{
        echo '<button type="submit" class="btn btn-success col-2" name="d_in" disabled="disabled">In</button>';
      }
    ?>
    <?php
      if ($timestamp>"14:00:00" && $duty!=null && $duty[0][4]==null) {
        echo '<button type="submit" name="d_out" class="btn btn-danger col-2">Out</button>';
      }else{
        echo '<button type="submit" class="btn btn-danger col-2" disabled="disabled">Out</button>';
      }
    ?>
  </div>
  <?php
      if ($timestamp>"14:00:00" && $duty!=null && $duty[0][4]==null) {
        echo '<h1>Thanks For Your Service!!</h1>';
      }else{
        
      }
    ?>
  <br>
  <i class="fa-solid fa-party-horn"></i>
  <div class="col-12">
    <?php
      $data = data();
     ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">IN_Time</th>
            <th scope="col">OUT_Time</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 0;
          foreach ($data as $key => $value) :
          ?>
        <tr>
            <th scope="row"><?php echo ++$i; ?></th>
            <td><?php echo $value[1]; ?></td>
            <td><?php echo $value[3]; ?></td>
            <td><?php echo $value[4]; ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</form>