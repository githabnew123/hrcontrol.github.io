<?php 
  session_start();
  if (!(isset($_SESSION['name']) && isset($_SESSION['password']))) {
    //header("Location:../../index.php");
  }
  include '../../functions.php';
?>
<?php include 'parts/head.php'; ?>
  <body>
    <div class="container-scroller">
      <?php include 'parts/side_bar.php'; ?>
      <div class="container-fluid page-body-wrapper">
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border me-3"></div>Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles default primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles light"></div>
          </div>
        </div>
        <?php include 'parts/up_nav.php'; ?>
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <div class="header-left">
                <?php if(isset($_GET['content'])):?>
                  <?php if($_GET['content']=="employee"):?>
                    <a href="index.php?content=add" class="btn btn-primary mb-2 mb-md-0 me-2"><i class="fa fa-plus">Create New Employee </i></a>
                  <?php endif; ?>
                  <?php if($_GET['content']=="employee_edit"):?>
                    <li class="nav-item dropdown" style="list-style-type:none;">
                      <button class="nav-link btn btn-info" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-solid fa-caret-down">Employee List</i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <?php 
                          $employee_list = get_employee_list();
                          foreach ($employee_list as $key => $value):
                        ?>
                        <a href="index.php?content=employee_edit&id=<?php echo $value[0];?>" class="dropdown-item preview-item"><?php echo $value[1];?></a>
                        <?php endforeach;?>
                      </div>
                    </li>
                  <?php endif; ?>
                  <?php if($_GET['content']=="employee_report"): ?>
                    <!-- <a href="index.php?content=print" class="btn btn-primary mb-2 mb-md-0 me-2"><i class="fa fa-print">Print Report</i></a>
                    <a href="../../functions.php?content=export" class="btn btn-primary mb-2 mb-md-0 me-2"><i class="fa fa-file">Export Report</i></a> -->
                    <form method="get" action="../../functions.php" class="row col-12 justify-content-between">
                        <div class="container row">
                          <div class="form-group col-6">
                            <label for="from" style="font-size:20px;">From</label>
                            <input type="date" style="font-size:20px;" class="form-control" id="from" name="from">
                          </div>
                          <div class="form-group col-6">
                            <label for="from" style="font-size:20px;">To</label>
                            <input type="date" style="font-size:20px;" class="form-control" id="to" name="to">
                          </div>
                        </div>
                        <button type="submit" name="report" class="btn btn-primary col-3" style="font-size:15px;"><i >Get Report</i></button>
                        <button type="submit" name="export" class="btn btn-primary col-3" style="font-size:15px;"><i class="fa fa-file">Export Report</i></button>
                        <button type="submit" name="print" class="btn btn-primary col-3" style="font-size:15px;"><i class="fa fa-print">Print Report</i></button>
                    </form>
                  <?php endif; ?>
                <?php endif;?>
              </div>
            </div>
            <div>
            <?php 
              if (isset($_GET['content'])) {
                if (isset($_GET['text'])) {
                  if ($_GET['text']=="update") {
                    echo "<script>alert('Updating User Success')</script>";
                  }
                  if ($_GET['text']=="delete") {
                    echo "<script>alert('Deleting User Success')</script>";
                  }
                  if ($_GET['text']=="add") {
                    echo "<script>alert('Adding User Success')</script>";
                  }
                }
                if ($_GET['content']=="employee") {
                  $employee_list = get_employee_list();
                  include 'employee_list.php';
                }
                if ($_GET['content']=="employee_edit") {
                  $id = 1;
                  if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                  }
                  $data = get_employee_with_id($id);
                  include 'employee_edit.php';
                }
                if ($_GET['content']=="add") {
                  include 'employee_add.php';
                }
                if ($_GET['content']=="employee_report") {
                  if (isset($_GET['from']) && isset($_GET['to'])) {
                    $from = $_GET['from'];
                    $to = $_GET['to'];
                    $data = monthly_report($from, $to);
                    include 'employee_report.php';
                  }
                }
              }
            ?>
              
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include 'parts/footer.php'; ?>