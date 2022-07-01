<?php
		// Kết nối Database
	include 'ketnoi.php';
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from `data` where id='$id'");
	$row=mysqli_fetch_assoc($query);
	?>
	<?php

	if (isset($_POST['capnhat'])){
		$id=$_GET['id'];
		$username=$_POST['username'];
		$gia=$_POST['gia'];
		$thoigian=$_POST['thoigian'];
	

		//Lấy api crypto
	$key="70d71a4a59f4ea1b64f199f77757e286";
	$link="http://api.coinlayer.com/api/live?access_key=".$key;

	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$link);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$result=curl_exec($ch);
	curl_close($ch);
	$result=json_decode($result,true);
	
		//lấy giá trị crypto
	if(isset($result['success'])){
		if($result['success']==1){
			//thời gian
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$strtime=date('Y-m-d h:i:s',$result['timestamp']);
			
			//Tỉ giá
			$a = $result['rates'];
			$gia =$a[$username];

		}else{
			echo $result['error']['type'];
			if(isset($result['error']['info'])){
				echo $result['error']['info'];
			}
		}
	}else{
		echo "Da xay ra su co";
	}




									// Create connection
		$conn = new mysqli("localhost", "root", "", "btc");
									// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "UPDATE `data` SET username='$username', gia='$gia', thoigian='$strtime' WHERE id='$id'";

		if ($conn->query($sql) === TRUE) {
			echo "Cập nhật thành công";
			header("location: xem.php");
		} else {
			echo "Lỗi cập nhật: " . $conn->error;
		}

		$conn->close();
	}
	?>