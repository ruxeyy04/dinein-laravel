<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
	<script src="https://kit.fontawesome.com/b15d9bd0c0.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<link rel="stylesheet" href="../css/style.css" />
	<title>DineInRestaurant</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark" id="navb">
		<a class="navbar-brand" href="/">DineInRestaurant</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
			aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="/">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="table">Table</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="reserve">Reserve</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="order">Menu</a>
				</li>
			</ul>
			<ul class="form-inline my-2 my-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="about">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="prof"><i class="fa-regular fa-circle-user fa-xl"></i>Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#logout">Logout</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="prof" id="profiled">
			<div class="row">
				<div class="col-md-12 mb-3">
					<div id="mt">
						<div class="card">
							<div class="card-header" id="menutypee">
								<h5 class="mb-0">
									<h5 data-toggle="collapse" data-target="#menutype" aria-expanded="true"
										aria-controls="menutype">
										Settings
									</h5>
								</h5>
							</div>
							<div id="menutype" class="collapse show" aria-labelledby="menutypee" data-parent="#mt">
								<div class="card-body">
									<ul class="navbar-nav mr-auto">
										<li class="nav-item active">
											<a class="nav-link text-dark" id="cprofile" href="#">Profile</a>
										</li>
										<li class="nav-item">
											<a class="nav-link text-dark" id="ccpassword" href="#">Change Password</a>
										</li>
										<li class="nav-item">
											<a class="nav-link text-dark" id="cpurchased" href="#">Order/Table Reserve</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="profile text-center mb-5" id="profile">
						<hr />
						<h5>
							Profile
							<i class="eprof fa-solid fa-user-pen pl-2 fa-xs text-primary" data-target="#editprof"
								data-toggle="modal"></i>
						</h5>
						<hr />
							<label for="">Name</label>
							<input type="text" class="form-control text-center" readonly id="fullname" />
							<label for="">Username</label>
							<input type="text" class="form-control text-center username" readonly />
							<label for="">Email Address</label>
							<input type="text" class="form-control text-center email" readonly />
							<label for="">Address</label>
							<input type="text" class="form-control text-center address" readonly />
						</form>
						<hr />
					</div>
					<div class="cpassword" id="cpassword">
						<hr />
						<h5>Change password</h5>
						<hr />
						<form action="" method="post" id="changePass">
							<label for="oldpass">Old Password</label>
							<input type="password" class="form-control" id="oldpass" name="oldpass" required>
							
							<label for="newpass">New Password</label>
							<input type="password" class="form-control newpass" id="newpass" name="newpass" required>
							
							<label for="confirmpass">Confirm Password</label>
							<input type="password" class="form-control confirmpass" id="confirmpass" name="confirmpass" required>
							
							<button type="submit" class="btn btn-info mt-3">Save</button>
						</form>
						<hr />
					</div>
					<div class="purchased" id="purchased">
						<hr />
						<div class="row">
							<div class="col">
								<h5>Purchased</h5>
							</div>
							<div class="col">
								<i class="fa-solid fa-circle mr-1" style="color: #d7d117"></i>Pending
							</div>
							<div class="col">
								<i class="fa-solid fa-circle mr-1" style="color: #23be35"></i>Approved
							</div>
							
							<div class="col">
								<i class="fa-solid fa-circle mr-1" style="color: #be3523"></i>Canceled
							</div>
						</div>

						<hr />
						<div class="allord">
							<div class="ordereditem">
								<hr />
								<div class="row">
									<div class="col-md-4 d-flex align-items-center justify-content-center">
										<h4>Table #4</h4>
									</div>
									<div class="col-md-4 text-center">
										<h6>Bibimbap</h6>
										<p>Items: 2</p>
										<strong>
											<p>₱1,250.00</p>
										</strong>
										<p>
											Status:
											<i class="fa-solid fa-circle" style="color: #23be35"></i>
										</p>
									</div>
									<div class="col-md-4 d-flex align-items-center justify-content-center">
										<button class="btn btn-warning" data-target="#vdetails" data-toggle="modal">
											View Details
										</button>
									</div>
								</div>
								<hr />
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<h6>@Shaina Calotes 2023</h6>
		<div class="d-flex justify-content-center">
			<i class="fa-brands fa-instagram" style="color: #ffffff"></i>
			<i class="fa-brands fa-facebook" style="color: #ffffff"></i>
			<i class="fa-brands fa-google" style="color: #ffffff"></i>
		</div>
	</footer>
	<!-- reserve -->
	<div class="modal fade" id="vdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" id="mheader">
					<h5 class="modal-title">Order list</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<h4>Table #<span id="tableNo"></span></h4>
						</div>

						<div class="col-md-12 orderList">
						</div>

						<div class="col-md-12 mt-4">
							<div class="row" id="total">
								<div class="col-md-12 d-flex justify-content-between">
									<h5>Total:</h5>
									<h5>₱ <span id="totalAmount"></span></h5>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Close
					</button>
					<button type="button" class="btn btn-danger cancelOrder" data-resno="">
						Cancel Order
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Logout -->
	<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" id="mheader">
					<h5 class="modal-title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">Are you sure you want to logout?</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Close
					</button>
					<button type="button" class="btn btn-danger logoutt">Logout</button>
				</div>
			</div>
		</div>
	</div>
	<!-- edit profile -->
	<div class="modal fade" id="editprof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" id="editProfile">
					<div class="modal-body">
						<label for="">First Name</label>
						<input type="text" class="form-control" name="fname" id="fname" />
						<label for="">Last Name</label>
						<input type="text" class="form-control" name="lname" id="lname" />
						<label for="">Email</label>
						<input type="text" class="form-control email" name="email"  />
						<label for="">Address</label>
						<input type="text" class="form-control" name="address" id="address" />
						<label for="">Username</label>
						<input type="text" class="form-control" name="username" id="username" />
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/js/script.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/page/customer.js"></script>
	<script src="/js/profile.js"></script>
	<script src="/js/allorders.js"></script>
</body>

</html>