<?php if($data[0][0]!=1): ?>
<form class="col-6 container bg-info" method="post" action="../../functions.php">
  <h1>Employee Information</h1>
  <div class="form-group"  hidden="hidden">
    <label for="id" style="font-size:15px;">ID</label>
    <input type="text" style="font-size:15px;" class="form-control" id="id" name="id" value="<?php echo $data[0][0];?>">
  </div>
  <div class="form-group">
    <label for="name" style="font-size:15px;">Employee Name</label>
    <input type="text" style="font-size:15px;" class="form-control" id="name" name="name" value="<?php echo $data[0][1];?>">
  </div>
  <div class="form-group">
    <label for="phno" style="font-size:15px;">Phone No</label>
    <input type="text" style="font-size:15px;" class="form-control" id="phno" name="ip" value="<?php echo $data[0][2];?>">
  </div>
  <div class="form-group">
    <label for="position" style="font-size:15px;">Position</label>
    <input type="text" style="font-size:15px;" class="form-control" id="position" name="position" value="<?php echo $data[0][3];?>">
  </div>
  <div class="form-group">
    <label for="dit" style="font-size:15px;">Duty-In Time</label>
    <div class="container row">
      <select class="form-select w-50" aria-label="Default select example" name="din_h">
      <option>Hour</option>
      <?php for($i=1; $i<25; $i++): ?>
        <?php if($i<10): ?>
          <option value="0<?php echo $i;?>">0<?php echo $i;?>&nbsp;&nbsp;hr</option>
        <?php endif;?>
        <?php if($i>9): ?>
          <option value="<?php echo $i;?>"><?php echo $i;?>&nbsp;&nbsp;hr</option>
        <?php endif;?>
      <?php endfor; ?>
    </select>
    <select class="form-select w-50" aria-label="Default select example" name="din_m">
      <option>Second</option>
      <?php for($i=0; $i<59; $i++): ?>
        <?php if($i<10): ?>
          <option value="0<?php echo $i;?>">0<?php echo $i;?>&nbsp;&nbsp;min</option>
        <?php endif;?>
        <?php if($i>9): ?>
          <option value="<?php echo $i;?>"><?php echo $i;?>&nbsp;&nbsp;min</option>
        <?php endif;?>
      <?php endfor; ?>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="dot" style="font-size:15px;">Duty-Out Time</label>
    <div class="container row">
      <select class="form-select w-50" aria-label="Default select example" name="don_h">
      <option>Hour</option>
      <?php for($i=1; $i<25; $i++): ?>
        <?php if($i<10): ?>
          <option value="0<?php echo $i;?>">0<?php echo $i;?>&nbsp;&nbsp;hr</option>
        <?php endif;?>
        <?php if($i>9): ?>
          <option value="<?php echo $i;?>"><?php echo $i;?>&nbsp;&nbsp;hr</option>
        <?php endif;?>
      <?php endfor; ?>
    </select>
    <select class="form-select w-50" aria-label="Default select example" name="don_m">
      <option>Minute</option>
      <?php for($i=0; $i<59; $i++): ?>
        <?php if($i<10): ?>
          <option value="0<?php echo $i;?>">0<?php echo $i;?>&nbsp;&nbsp;min</option>
        <?php endif;?>
        <?php if($i>9): ?>
          <option value="<?php echo $i;?>"><?php echo $i;?>&nbsp;&nbsp;min</option>
        <?php endif;?>
      <?php endfor; ?>
    </select>
    </div>
  </div>
  <button type="submit" name="update" class="btn btn-primary col-4" style="font-size:15px;">Save Changes</button>
</form>
<?php endif; ?>
<?php if($data[0][0]==1): ?>
<form class="col-6 container bg-info" method="post" action="../../functions.php">
  <h1>Employee Information</h1>
  <div class="form-group"  hidden="hidden">
    <label for="id" style="font-size:15px;">ID</label>
    <input type="text" style="font-size:15px;" class="form-control" id="id" name="id">
  </div>
  <div class="form-group">
    <label for="name" style="font-size:15px;">Employee Name</label>
    <input type="text" style="font-size:15px;" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="phno" style="font-size:15px;">Phone No</label>
    <input type="text" style="font-size:15px;" class="form-control" id="phno" name="ip">
  </div>
  <div class="form-group">
    <label for="phno" style="font-size:15px;">Position</label>
    <input type="text" style="font-size:15px;" class="form-control" id="position" name="position">
  </div>
  <div class="form-group">
    <label for="dit" style="font-size:15px;">Duty-In Time</label>
    <div class="container row">
      <select class="form-select w-50" aria-label="Default select example" name="din_h">
      <option>Hour</option>
      <?php for($i=1; $i<25; $i++): ?>
        <?php if($i<10): ?>
          <option value="0<?php echo $i;?>">0<?php echo $i;?>&nbsp;&nbsp;hr</option>
        <?php endif;?>
        <?php if($i>9): ?>
          <option value="<?php echo $i;?>"><?php echo $i;?>&nbsp;&nbsp;hr</option>
        <?php endif;?>
      <?php endfor; ?>
    </select>
    <select class="form-select w-50" aria-label="Default select example" name="din_m">
      <option>Second</option>
      <?php for($i=0; $i<59; $i++): ?>
        <?php if($i<10): ?>
          <option value="0<?php echo $i;?>">0<?php echo $i;?>&nbsp;&nbsp;min</option>
        <?php endif;?>
        <?php if($i>9): ?>
          <option value="<?php echo $i;?>"><?php echo $i;?>&nbsp;&nbsp;min</option>
        <?php endif;?>
      <?php endfor; ?>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="dot" style="font-size:15px;">Duty-Out Time</label>
    <div class="container row">
      <select class="form-select w-50" aria-label="Default select example" name="don_h">
      <option>Hour</option>
      <?php for($i=1; $i<25; $i++): ?>
        <?php if($i<10): ?>
          <option value="0<?php echo $i;?>">0<?php echo $i;?>&nbsp;&nbsp;hr</option>
        <?php endif;?>
        <?php if($i>9): ?>
          <option value="<?php echo $i;?>"><?php echo $i;?>&nbsp;&nbsp;hr</option>
        <?php endif;?>
      <?php endfor; ?>
    </select>
    <select class="form-select w-50" aria-label="Default select example" name="don_m">
      <option>Minute</option>
      <?php for($i=0; $i<59; $i++): ?>
        <?php if($i<10): ?>
          <option value="0<?php echo $i;?>">0<?php echo $i;?>&nbsp;&nbsp;min</option>
        <?php endif;?>
        <?php if($i>9): ?>
          <option value="<?php echo $i;?>"><?php echo $i;?>&nbsp;&nbsp;min</option>
        <?php endif;?>
      <?php endfor; ?>
    </select>
    </div>
  </div>
  <button type="submit" name="update" class="btn btn-primary col-4" style="font-size:15px;">Save Changes</button>
</form>
<?php endif; ?>