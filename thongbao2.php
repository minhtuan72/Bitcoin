<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'ketnoi.php';
$query=mysqli_query($conn,"select * from `data` order by id DESC");

$tele=mysqli_query($conn,"select * from `tele` where id='1'");
$req=mysqli_fetch_assoc($tele);
while($row=mysqli_fetch_array($query)){
	?>
	<?php
	while (true) {
		$key="7e3ea7fd2c05e53e0ae14ed64d638fe2";
		$link="http://api.coinlayer.com/api/live?access_key=".$key;

		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$link);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$result=curl_exec($ch);
		curl_close($ch);
		$result=json_decode($result,true);
		if(isset($result['success'])){
			if($result['success']==1){

				$a = $result['rates'];
				$x = $row['username'];
				$x =  $a[$x];

				$apiToken = $req['apitoken'];
				$data = [
					'chat_id' =>  $req['chatid'],
					'text' => 'Giá '.$row['username']. '  mới nhất: 1 '.$row['username'].' = '.$x .' USD'
				];
				$response = file_get_contents ("https://api.telegram.org/bot$apiToken/sendMessage?".
					http_build_query ($data));

			//Gửi qua gmail
				

				$mail = new PHPMailer(true);
				try {
                $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
                $mail->isSMTP();  
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  //SMTP servers
                $mail->SMTPAuth = true; // Enable authentication
                $nguoigui = 'ee2340000@gmail.com';
                $matkhau = 'bmbarqguohpfygpe';
                $tennguoigui = 'Minh Tuan';
                $mail->Username = $nguoigui; // SMTP username
                $mail->Password = $matkhau;   // SMTP password
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // port to connect to                
                $mail->setFrom($nguoigui, $tennguoigui ); 
                $to = 'vitieubao0702@gmail.com';
                $to_name = "Minh Tuan";
                
                $mail->addAddress($to, $to_name); //mail và tên người nhận  
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = 'Gửi thư từ php';      
                $noidungthu = "Giá ".$row['username']. " mới nhất: 1 ".$row['username']."= ".$x ."USD" ;
                $mail->Body = $noidungthu;
                $mail->smtpConnect( array(
                	"ssl" => array(
                		"verify_peer" => false,
                		"verify_peer_name" => false,
                		"allow_self_signed" => true
                	)
                ));
                $mail->send();
                echo 'Đã gửi mail xong';
            } catch (Exception $e) {
            	echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
            }


        }else{
        	echo $result['error']['type'];
        	if(isset($result['error']['info'])){
        		echo $result['error']['info'];
        	}
        }
    }else{
    	echo "Da xay ra su co";
    }
    //sleep(300);
}

?>
<?php
}
?>
</table>




