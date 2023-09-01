<?php
	
	function user_confirmation($data){
		require 'dbcon.php';
		$bool = 0;
		$sql = "SELECT ip from user";
		$stmt = $connection->prepare($sql);
		$stmt ->execute();
		$check = $stmt->fetchAll();
		foreach ($check as $key => $value) {
			if ($value[0]==$data) {
				$bool = 1;
			}
		}
		if ($bool==1) {
				//header("Location:index.php");
			}else{
				header("Location:username.php");
			}
	}

	if (isset($_POST['d_in'])) {
        session_start();
		//$ip = $_SERVER['HTTP_USER_AGENT'];
        $ip = $_SESSION["ip"];
		$name = get_name_with_ip($ip);
		date_default_timezone_set('Asia/Rangoon');
      	$timestamp = date('H:i:s');
		$date_ = date("d-m-Y");
		$in_time = $timestamp;
		$out_time = "";
		//print_r($name);
		duty_in($name,$date_,$in_time,$out_time);
		header('Location:index.php');
	}
	if (isset($_POST['d_out'])) {
        session_start();
		$ip = $_SESSION['ip'];
		$name1 = get_name_with_ip($ip);
		date_default_timezone_set('Asia/Rangoon');
      	$timestamp = date('H:i:s');
		$date_ = date("d-m-Y");
		$out_time = $timestamp;
		$name = $name1[0][0];
		duty_update($name,$date_,$out_time);
		//header('Location:index.php');
	}
	function duty_in($name,$date_,$in_time,$out_time){
        require 'dbcon.php';
        $sql = "INSERT into duty(name,date_,in_time,out_time) values ((:name),(:date_),(:in_time),(:out_time))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':name',$name[0][0]);
        $stmt ->bindParam(':date_',$date_);
        $stmt ->bindParam(':in_time',$in_time);
        $stmt ->bindParam(':out_time',$out_time);
        $stmt ->execute();
    }
    function duty_update($name,$date_,$out_time){
    	require 'dbcon.php';
    	$sql = "UPDATE duty set out_time = (:out_time) where date_ = (:date_) and name = (:name)";
    	$stmt = $connection->prepare($sql);
    	$stmt ->bindParam(':name',$name);
    	$stmt ->bindParam(':date_',$date_);
    	$stmt ->bindParam(':out_time',$out_time);
    	$stmt ->execute();
    	header("Location:index.php");
    }
    function get_duty(){
    	require 'dbcon.php';
    	$ip = $_SERVER['HTTP_USER_AGENT'];
    	$name = get_name_with_ip($ip);
    	$date_ = date("d-m-Y");
    	$sql = "SELECT * from duty where name = (:name) and date_ = (:date_)";
    	$stmt = $connection->prepare($sql);
    	$stmt ->bindParam(':name',$name[0][0]);
    	$stmt ->bindParam(':date_',$date_);
    	$stmt ->execute();
    	$data = $stmt->fetchAll();
    	return $data;
    }
    function get_name_with_ip($ip){
    	require 'dbcon.php';
    	$sql = "SELECT name from user where ip = (:ip)";
    	$stmt = $connection->prepare($sql);
    	$stmt ->bindParam(':ip',$ip);
    	$stmt ->execute();
    	$data = $stmt->fetchAll();
    	return $data;
    }
    function data(){
    	require 'dbcon.php';
    	$date_ = date("d-m-Y");
    	$sql = "SELECT * from duty where date_ = (:date_)";
        $stmt = $connection->prepare($sql);
        $stmt -> bindParam(':date_',$date_);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

?>