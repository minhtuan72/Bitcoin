

<?php
require 'ketnoi.php';
$id= $_GET['id'];
$query=mysqli_query($conn,"select * from `data`where id ='$id'");
$tele=mysqli_query($conn,"select * from `tele` where id='1'");
$req=mysqli_fetch_assoc($tele);
while($row=mysqli_fetch_array($query)){
	?>

	<?php   
	while (true) {
		$apiToken = $req['apitoken'];
		$data = [
			'chat_id' => $req['chatid'],
			'text' => 'Giá 1'.$row['username'].' = '. $row['gia'].'  USD'
		];
		$response = file_get_contents ("https://api.telegram.org/bot$apiToken/sendMessage?".
			http_build_query ($data));
		sleep(300);
	}

	?>
	<?php
}
?>






