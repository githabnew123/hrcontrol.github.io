<?php
	//session_start();
    if (isset($_POST['login'])) {
        $name = $_POST['name'];
        $pass = $_POST['password'];
        $data = get_admin();
        $i = 0;
        foreach ($data as $key => $value) {
            if ($name == $value[1] && sha1($pass) == $value[2]) {
                $_SESSION['name'] = $name;
                $_SESSION['password'] = $pass;
                header("Location:template/admin/index.php");
            }else{
                header("Location:index.php?text=Wrong Password");
            }
        }
    }

    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header("Location:index.php");
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $ip = $_POST['ip'];
        $position = $_POST['position'];
        $din_h = $_POST['din_h'];
        $din_m = $_POST['din_m'];
        $don_h = $_POST['don_h'];
        $don_m = $_POST['don_m'];
        $in_time = $din_h.":".$din_m.":"."00";
        $out_time = $don_h.":".$don_m.":"."00";
        update_user($id,$name,$ip,$position,$in_time,$out_time);
        header("Location:template/admin/index.php?content=employee&text=update");
    }

    if (isset($_GET['content'])) {
        if ($_GET['content']=="employee_delete") {
            $id = $_GET['id'];
            delete_employee($id);
            header("Location:template/admin/index.php?content=employee&text=delete");
        }
    }

    if (isset($_POST['add_employee'])) {
        $name = $_POST['name'];
        $ip = $_POST['ip'];
        $position = $_POST['position'];
        add_employee($name,$ip,$position);
        header("Location:template/admin/index.php?content=employee&text=add");
    }

    if (isset($_GET['report'])) {
        $from = date("d-m-Y", strtotime($_GET['from']));
        $to = date("d-m-Y", strtotime($_GET['to']));
        header("Location:template/admin/index.php?content=employee_report&from=".$from."&to=".$to);
    }

    if (isset($_GET['export'])) {
        $from = date("d-m-Y", strtotime($_GET['from']));
        $to = date("d-m-Y", strtotime($_GET['to']));
        $data = monthly_report($from, $to);
        $i = 0;
        header("Content-Type: application/vnd.ms-excel");
        echo '#' . "\t" . 'Name' . "\t" . 'Date' . "\t" ."Duty_IN" . "\t" . "Duty_Out" ."\n";
        foreach ($data as $key => $value) {
            echo ++$i . "\t" . $value[1] . "\t" . $value[2] . "\t" . $value[3] . "\t" . $value[4] ."\n";
        }
        header("Content-disposition: attachment; filename=spreadsheet.xls");
    }

    if (isset($_GET['print'])) {
        $from = date("d-m-Y", strtotime($_GET['from']));
        $to = date("d-m-Y", strtotime($_GET['to']));
        $data = monthly_report($from, $to);
        echo '<style> table, th, td {border:1px solid black; border-collapse: collapse;}</style>';
        echo '<table width="100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Duty_In</th>
                    <th scope="col">Duty_OUt</th>
                  </tr>
            </thead><tbody>';
        $i = 0;
        foreach ($data as $key => $value) {
            echo '<tr><th scope="row">';
            echo ++$i;
            echo '</th><td>';
            echo $value[1];
            echo '</td><td>';
            echo $value[2];
            echo '</td><td>';
            echo $value[3];
            echo '</td><td>';
            echo $value[4];
            echo '</td></tr>';
        }
                
        echo '</tbody></table>';
        echo '<script>print();</script>';
    }

    function get_admin(){
        require 'dbcon.php';
        $sql = "SELECT * from admin";
        $stmt = $connection->prepare($sql);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function get_employee_list(){
        require 'dbcon.php';
        $sql = "SELECT * from user";
        $stmt = $connection->prepare($sql);
        $stmt -> execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function get_employee_with_id($id){
        require 'dbcon.php';
        $sql = "SELECT * from user where id = (:id)";
        $stmt = $connection->prepare($sql);
        $stmt -> bindParam(':id',$id);
        $stmt -> execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function update_user($id,$name,$ip,$position,$in_time,$out_time){
        require 'dbcon.php';
        $sql = "UPDATE user set name=(:name), ip=(:ip), position=(:position), in_time=(:in_time), out_time=(:out_time) where id=(:id)";
        $stmt = $connection->prepare($sql);
        $stmt -> bindParam(':id',$id);
        $stmt -> bindParam(':name',$name);
        $stmt -> bindParam(':ip',$ip);
        $stmt -> bindParam(':position',$position);
        $stmt -> bindParam(':in_time',$in_time);
        $stmt -> bindParam(':out_time',$out_time);
        $stmt -> execute();
    }

    function delete_employee($id){
        require 'dbcon.php';
        $sql = "DELETE from user where id = (:id)";
        $stmt = $connection->prepare($sql);
        $stmt -> bindParam(':id',$id);
        $stmt ->execute();
    }

    function add_employee($name,$ip,$position){
        require 'dbcon.php';
        $sql = "INSERT into user(name,ip,position) values ((:name),(:ip),(:position))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':name',$name);
        $stmt ->bindParam(':ip',$ip);
        $stmt ->bindParam(':position',$position);
        $stmt ->execute();
    }

    function monthly_report($from, $to){
        require 'dbcon.php';
        $sql = "SELECT * from duty where date_>= (:from_date) and date_<= (:to_date)";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':from_date',$from);
        $stmt ->bindParam(':to_date',$to);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

?>