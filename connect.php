<?php
//header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'btc') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if(isset($_POST['dangky'])){
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$email = trim($_POST['email']);
	$phone = trim($_POST['phone']);


	if (empty($username)) {
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) {
		array_push($errors, "Email is required"); 
	}
	if (empty($phone)) {
		array_push($errors, "phone is required"); 
	}
	if (empty($password)) {
		array_push($errors, "password is requeired"); 
	}

// Kiểm tra username hoặc email có bị trùng hay không
	$sql = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";

// Thực thi câu truy vấn
	$result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
	if (mysqli_num_rows($result) > 0)
	{
		echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="index.php";</script>';

// Dừng chương trình
		die ();
	}
	else {

		$sql = "INSERT INTO user (username, password, email, phone) VALUES ('$username','$password','$email','$phone')";
		echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="trangchu.php";</script>';

		if (mysqli_query($conn, $sql)){
			echo "Tên đăng nhập: ".$_POST['username']."<br/>";
			echo "Mật khẩu: " .$_POST['password']."<br/>";
			echo "Email đăng nhập: ".$_POST['email']."<br/>";
			echo "Số điện thoại: ".$_POST['phone']."<br/>";
		}
		else {
			echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="index.php";</script>';
		}
	}
}

//Post dữ liệu tra cứu
if(isset($_POST['tracuu'])){

	$username = trim($_POST['username']);
	$apitoken = trim($_POST['apitoken']);
	$chatid = trim($_POST['chatid']);
	
	//Lấy api crypto
	$key="7e3ea7fd2c05e53e0ae14ed64d638fe2";
	$link="http://api.coinlayer.com/api/live?access_key=".$key;

	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$link);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$result=curl_exec($ch);
	curl_close($ch);
	$result=json_decode($result,true);
	// $a = $result['rates'];
	// $gia =$a[$username];
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

	if (empty($username)) {
		array_push($errors, "Username is required"); 
	}
	
	$dulieu = array("ABC","ACP","ACT","ACT*","ADA","ADCN","ADL","ADX","ADZ","AE","AGI","AIB","AIDOC","AION","AIR","ALT","AMB","AMM","ANT","APC","APPC","ARC","ARCT","ARDR","ARK","ARN","ASAFE","AST","ATB","ATM","AURS","AVT","BAR","BASH","BAT","BAY","BBP","BCD","BCH","BCNe","BCPT","BEEe","BIO","BLC","BLOCK","BLU","BLZ","BMC","BNB","BNT","BOST","BQe","BQX","BRD","BRIT","BT","BT","BTC","BTCA","BTCS","BTCZ","BTG","BTLC","BTM","BTM*","BTQ","BTS","BTX","BURST","CALC","CAS","CAT","CCRB","CDT","CESC","CHAT","CJ","CL","CLD","CLOAK","CMT*","CND","CNX","CPC","CRAVE","CRC","CRE","CRW","CTO","CTR","CVC","DAS","DASH","DATe","DATA","DBC","DBET","DCNe","DCR","DCT","DEEP","DENT","DGB","DGD","DIMe","DIMEe","DMD","DNT","DOGE","DRGN","DRZ","DSH","DTAe","EC","EDG","EDO","EDR","EKO","ELA","ELF","EMC","EMGO","ENG","ENJ","EOS","ERT","ETC","ETH","ETN","ETP","ETT","EVR","EVX","FCT","FLP","FOTA","FRST","FUEL","FUN","FUNC","FUTC","GAME","GAS","GBYTE","GMXe","GNO","GNT","GNX","GRC","GRS","GRWI","GTC","GTO","GUP","GVT","GXS","HAC","HNC","HSR","HST","HVN","ICN","ICOS","ICX","IGNIS","ILC","INK","INS","INSN","INT","IOP","IOST","ITC","KCS","KICK","KINe","KLC","KMD","KNC","KRB","LA","LEND","LEO","LINDA","LINK","LOC","LOG","LRC","LSK","LTC","LUN","LUXe","MAID","MANA","MCAP","MCO","MDA","MDS","MIOTA","MKR","MLN","MNX","MOD","MOIN","MONA","MTL","MTN*","MTX","NAS","NAV","NBT","NDC","NEBL","NEO","NEU","NEWB","NGC","NKC","NLC","NMC","NMR","NULS","NVC","NXT","OAX","OBITS","OC","OCN","ODN","OK","OMG","OMNI","ORE","ORME","OST","OTN","OTX","OXY","PART","PAY","PBT","PCS","PIVX","PIZZA","PLBT","PLR","POEe","POLY","POSW","POWR","PPC","PPT","PPY","PRCe","PRES","PRG","PRL","PRO","PURA","PUT","QASH","QAU","QSP","QTUM","QUN","R","RBIES","RCN","RDD","RDN","RDN*","REBL","REEe","REP","REQ","REV","RGC","RHOC","RIYA","RKC","RLC","RPX","RUFF","SALT","SAN","SBC","SC","SENT","SHIFT","SIB","SMART","SMLYe","SMT*","SNC","SNGLS","SNM","SNT","SPK","SRN","STEEM","STK","STORJ","STRAT","STU","STX","SUB","SUR","SWFTC","SYS","TAAS","TESLA","THC","THETA","THS","TIO","TKN","TKY","TNB","TNT","TOA","TRC","TRIG","TRST","TRUMP","TRX","UBQ","UNO","UNRCe","UQC","USDT","UTK","UTT","VEE","VEN","VERI","VIA","VIB","VIBE","VOISE","VOX","VRS","VTC","VUCe","WABI","WAVES","WAX","WC","WGR","WINGS","WLK","WOP","WPR","WRC","WTC","XAUR","XBP","XBY","XCP","XCXT","XDNe","XEM","XGB","XHI","XID","XLM","XMR","XNC","XRB","XRP","XTO","XTZ","XUC","XVG","XZC","YEE","YOC","YOYOW","ZBC","ZCL","ZEC","ZEN","ZIL","ZNY","ZRX","ZSCe");
	$ktra = $username;
	if(!in_array($ktra, $dulieu)){
		echo '<script language="javascript">alert("Nhập sai hoặc không tồn tại loại tiền tệ này"); window.location="trangchu.php";</script>';
		die ();
	}
	else {
		
		

		//post vào csdl
		$sql = "INSERT INTO data (username, apitoken, chatid, gia, thoigian) VALUES ('$username','$apitoken','$chatid', '$gia', '$strtime')";
		sleep(2);
		
		 echo '<script language="javascript"> window.location="ketqua.php";</script>';

		if (mysqli_query($conn, $sql)){
			echo "Ký hiệu loại tiền ảo ".$_POST['username']."<br/>";
			echo "Api Token" .$_POST['apitoken']."<br/>";
			echo "Chat_id Telegram".$_POST['chatid']."<br/>";
			echo "Tỉ giá".$_POST['gia']."<br/>";
			echo "Thời gian".$_POST['strtime']."<br/>";
		}
		else {
			echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="trangchu.php";</script>';
		}





		$query=mysqli_query($conn,"select * from `tele` where id='1'");
		$row=mysqli_fetch_assoc($query);
		$con = new mysqli("localhost", "root", "", "btc");
		// Check connection
		if ($con->connect_error) {
			die("Connection failed: " . $con->connect_error);
		}
		$sql1 = "UPDATE `tele` SET apitoken='$apitoken', chatid='$chatid'  WHERE id='1'";
		if ($con->query($sql1) === TRUE) {
			echo "Cập nhật thành công";
			header("location: xem.php");
		} else {
			echo "Lỗi cập nhật: " . $con->error;
		}

		$con->close();
	}
}



//Cập nhật dữ li
?>