	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tra cứu giá tiền ảo</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="./css/jquery.toast.css">

	</head>

	<body>
		<div class="container" style = "height: auto">
			<!--header-->
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
								<!-<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
									

								</button>->
								<a class="btn btn-warning" href="index.php" role="button">Đăng Xuất</a>

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
													<button type="submit" class="btn btn-primary"></button>
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
							<a class="nav-link active" id="pills-trangchu-tab" data-toggle="pill" href="#pills-trangchu" role="tab" aria-controls="pills-trangchu" aria-selected="true"><i class="fas fa-home"></i> Trang chủ</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link " href="xem.php"><i class="fas fa-shopping-basket"></i> Quản lý</a>
						</li>
						<li class="nav-item" role="presentation">

							<a class="nav-link" id="pills-thongke-tab" data-toggle="pill" href="#pills-thongke" role="tab" aria-controls="pills-thongke" aria-selected="false"><i class="far fa-chart-bar"></i> Thống kê</a>

						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="pills-doimk-tab" data-toggle="pill" href="#pills-doimk" role="tab" aria-controls="pills-doimk" aria-selected="false"><i class="fas fa-lock"></i> Đổi mật khẩu</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link " id="pills-trangcanhan-tab" data-toggle="pill" href="#pills-trangcanhan" role="tab" aria-controls="pills-trangcanhan" aria-selected="true"><i class="fas fa-user"></i> Tài khoản</a>
						</li>

					</ul>
				</nav>
				<!--kết thúc thanh điều hướng-->
				<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

				<script src="./js/jquery.toast.js"></script>
				
				<script type="text/javascript">
					
					$.toast({
						text: "Kiem tra du lieu",
						heading: "Loading...",
						icon: "success",
						class: "bottom-right"
					});
				</script>
				
				<!--nội dung tabs-->
				<div class = "row">
					<div class="container-fluid">
						<div class="tab-pane fade show active" id="pills-quanLy" role="tabpanel" aria-labelledby="pills-quanLy-tab">
							<a class="btn btn-primary" href="trangchu.php" role="button">Tra cứu loại tiền khác</a>
							
							<br>
							<br>
							<table class="table table-bordered" border="1">
								<thead class="thead-light">
									<tr>
										<th>ID</th>
										<th>Ký hiệu loại tiền</th>
										<th>Tỉ giá (USD)</th>
										<th>Thời gian</th>

									</tr>
								</thead>

								<?php
								require 'ketnoi.php';
								$query=mysqli_query($conn,"select * from `data`order by id DESC");
								while($row=mysqli_fetch_array($query)){
									?>
									<tbody>
										<tr>
											<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['username']; ?></td>
											<td><?php echo $row['gia']; ?></td>
											<td><?php echo $row['thoigian']; ?></td>
											

											<td><a href="ketqua.php?id=<?php echo $row['id']; ?>" name="capnhat">Cập nhật</a></td>
											<?php require 'connect.php';?> 
											<td><a href="xoa.php?id=<?php echo $row['id']; ?>">Xóa</a></td>
											<td><a href="thongbao.php?id=<?php echo $row['id']; ?>">Nhận thông báo</a></td>
										</tr>
									</tbody>
									<?php
								}
								?>
							</table>

						</div>

						
					</div>


				</div>
				<!--kết thúc nội dung tabs-->

				<!--aside và bài viết-->
				<div class = "row" >

					<article class="col-sm-9">

						<!-- TradingView Chart BEGIN -->
						<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
						<script type="text/javascript">
							var tradingview_embed_options = {};
							tradingview_embed_options.width = "100%";
							tradingview_embed_options.height = '400';
							tradingview_embed_options.chart = 'sVJY3TSd';
							new TradingView.chart(tradingview_embed_options);
						</script>
						<p><a href="https://vn.tradingview.com/chart/BTCUSD/sVJY3TSd/"></a><a href="https://vn.tradingview.com/u/NguyenNhatHoan_Crypto/"></a><a href="https://vn.tradingview.com/"></a></p>
						<!--TradingView Chart END -->

					</article>

					<aside class="col-sm-3">
						<div class="panel panel-default">
							<br>
							<nav class="navbar navbar-light bg-light">
								<form class="form-inline">
									<input class="form-control mr-sm-2" type="tìm kiếm" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
								</form>
							</nav>
							<div class="panel-heading">
								<span class = "glyphicon glyphicon-th-list"></span>
								<strong>Top 10 tiền điện tử ở Việt Nam</strong>
							</div>
							<div class="list-group">
								<a href="#" class="list-group-item">Bitcoin</a>
								<a href="#" class="list-group-item">Ethereum</a>
								<a href="#" class="list-group-item">Ripple</a>
								<a href="#" class="list-group-item">Bitcoin Cash</a>

							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<span class = "glyphicon glyphicon-th-list"></span>
								<strong>Tiền điện tử được quan tâm</strong>
							</div>
							<div class="list-group">
								<a href="#" class="list-group-item">Bitcoin</a>
								<a href="#" class="list-group-item">Ethereum</a>
								<a href="#" class="list-group-item">Ripple</a>
								<a href="#" class="list-group-item">Bitcoin Cash</a>
							</div>
						</div>
					</aside>
				</div>
				<!--kết thúc aside và bài viết-->

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


		<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->
		<!-- <script language="javascript">window.location="thongbao2.php";</script> -->
	</body>
	</html>

