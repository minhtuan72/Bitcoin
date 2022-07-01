	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	</head>
	<body>

	<form method="post" action="index.php">


	<div class="container" style = "height: auto">
		<header class="row">
				<div class= "container-fluid">
					<div class= "row bg-dark">
						<div class ="col-md-2">
							<a clas="navbar-branch" href="">
								<img src="./images/logo(1).png" height="50">
							</a>

						</div>
						<div class ="navbar bg-dark col-md-6">
							<h4 class="text-white">Tra cứu giá tiền ảo</h4>
						</div>
						<div class ="navbar bg-dark col-md-3 justify-content-end ">
							<div class="d-grid ">
								<a class="btn btn-warning" href="login.php" role="button">Đăng nhập</a>
								<a class="btn btn-warning" href="index.php" role="button">Đăng ký</a>

								<!-- The Modal -->
								<div class="modal" id="myModal">
									<div class="modal-dialog">
										<div class="modal-content">

											<div class="login-right col-sm-12 ">
												<div class="form-center">
													<h1>Đăng nhập để tiếp tục </h1>
													<br>
													<div class="login-input">
														<div class="form-group">
															<input type="text"
															class="form-control" name="" id="" aria-describedby="helpId" placeholder="Tài khoản">
														</div>
														<div class="form-group">
															<input type="password" class="form-control" name="" id="" placeholder="Mật khẩu">
														</div>
														<div class="login-remember">
															<div class="form-check">
																<label class="form-check-label">
																	<input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
																	<span>Nhớ mật khẩu &emsp;</span>
																	<a href="" class="login-forget" >Quên mật khẩu?</a>
																</label>
															</div>
															
														</div>
													</div>
												</div>

												<!-- Modal footer -->
												<div class="modal-footer">
													<button type="submit" class="btn btn-primary">Đăng nhập</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
												</div>

											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</header>
				<!--kết thúc header-->

				<!--thanh điều hướng-->
				<nav class="navbar navbar-expand-lg navbar-light bg-light row" style="background-color: #e3f2fd;">
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="pills-trangchu-tab" data-toggle="pill" href="#pills-trangchu" role="tab" aria-controls="pills-trangchu" aria-selected="true"><i class="fas fa-home"></i> Trang chủ</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link " id="pills-quanLy-tab" data-toggle="pill" href="#pills-quanLy" role="tab" aria-controls="pills-quanLy" aria-selected="true"><i class="fas fa-shopping-basket"></i> Quản lý đơn hàng</a>
						</li>
						<li class="nav-item" role="presentation">

							<a class="nav-link" id="pills-thongke-tab" data-toggle="pill" href="#pills-thongke" role="tab" aria-controls="pills-thongke" aria-selected="false"><i class="far fa-chart-bar"></i> Thống kê</a>

						</li>
						<li class="nav-item active" role="presentation">
							<a class="nav-link active" id="pills-dangky-tab" data-toggle="pill" href="#pills-dangky" role="tab" aria-controls="pills-dangky" aria-selected="false"><i class="fas fa-lock"></i> Đăng ký</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link " id="pills-trangcanhan-tab" data-toggle="pill" href="#pills-trangcanhan" role="tab" aria-controls="pills-trangcanhan" aria-selected="true"><i class="fas fa-user"></i> Tài khoản</a>
						</li>

					</ul>
				</nav>
				<!--kết thúc thanh điều hướng-->

	<form method="post" action="index.php" >
	<h2>Đăng ký</h2>
	<div class="col-sm-6 justify-content-center">
	 <div class="form-group ">
	    <label for="exampleInputUsername1">Tên đăng nhập</label>
	    <input type="text" name="username" class="form-control" value="" required/>
	  </div>
	

	  <div class="form-group">
	    <label for="exampleInputPassword1">Mật khẩu</label>
	   <input type="password" name="password" class="form-control" value="" required/>
	  </div>

	<div class="form-group">
	    <label for="exampleInputEmail1">Email</label>
	    <input type="email" name="email" class="form-control" value="" required/>
	  </div>

	 <div class="form-group">
	    <label for="exampleInputPhone1">Số điện thoại</label>
	    <input type="text" name="phone" class="form-control" value="" required/>
	  </div> 
	   
	  </div>


	<input type="submit" name="dangky" value="Đăng Ký"/>
	<br>
	<br>
	</div>
	<?php require 'connect.php';?>
	</form>
<div class="container" style = "height: auto">
	<!--footer-->
			<footer class="panel panel-default bg-dark" style = "height: 60px">

				<div class="container-fluid">
					<div class="copyright">
						<br>
						<p class="web text-white"><label>Email:</label><span class="ft-content web-site"><a href="mailto:support@soracart.com"> minhtuan070220@gmail.com</a></span>	
							<span style="float: right">
								<a style="color:#fff" href="http://localhost/QLDH/gioithieu.html">Giới thiệu</a> - 
								<a style="color:#fff" href="/dieu-khoan/">Điều khoản</a> - 
								<a style="color:#fff" href="/lien-he/">Liên hệ</a> - 
								<a style="color:#fff" href="/bao-mat/">Bảo mật</a>
							</span>
						</p>

					</div>
				</div>
			</div>

		</footer>
		<!--kết thúc footer-->
	</div>
	</div>

	</body>
	</html>