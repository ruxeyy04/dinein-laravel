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
	<link rel="stylesheet" href="../css/admin.css" />
	<title>DineInRestaurant</title>
	<script src="../js/admin/profile.js"></script>
</head>

<body>
	<div class="page-wrapper chiller-theme toggled">
		<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
			<i class="fas fa-bars"></i>
		</a>
		<nav id="sidebar" class="sidebar-wrapper">
			<div class="sidebar-content">
				<div class="sidebar-brand">
					<div id="close-sidebar">
						<i class="fas fa-times"></i>
					</div>
				</div>
				<div class="text-center">
					<h6 class="navbar-brand text-light">DineInRestaurant</h6>
				</div>

				<div class="sidebar-header">
					<div class="user-info">
						<span><span id="user-name">Shaina Ross</span> <strong id="last-name">Calotes</strong></span>
						<span class="user-role">Administrator</span>
						<span class="user-status">
							<i class="fa fa-circle"></i>
							<span>Online</span>
						</span>
					</div>
				</div>
				<!-- sidebar-header  -->
				<div class="sidebar-search">
					<div>
						<div class="input-group">
							<input type="text" class="form-control search-menu" placeholder="Search..." />
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="fa fa-search" aria-hidden="true"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
				<!-- sidebar-search  -->
				<div class="sidebar-menu">
				<ul>
						<li class="sidebar-dropdown">
							<a href="{{ route('adminmainhome') }}">
								<i class="fa fa-tachometer-alt"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="sidebar-dropdown">
							<a href="{{ route('adminFoods') }}">
								<i class="fa-solid fa-utensils"></i>
								<span>Foods</span>
							</a>
						</li>
						<li class="sidebar-dropdown">
							<a href="{{ route('adminTable') }}">
								<i class="fa-solid fa-table"></i>
								<span>Table</span>
							</a>
						</li>
						<li class="sidebar-dropdown">
							<a href="{{ route('adminUsers') }}">
								<i class="fa-solid fa-users"></i>
								<span>Users</span>
							</a>
						</li>
						<li class="sidebar-dropdown">
							<a href="{{ route('adminProfile') }}">
								<i class="fa-solid fa-address-card"></i>
								<span>Profile</span>
							</a>
						</li>
						<li class="sidebar-dropdown">
							<a href="#" data-toggle="modal" data-target="#logout">
								<i class="fa-solid fa-right-from-bracket"></i>
								<span>Logout</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- sidebar-menu  -->
			</div>
		</nav>
		<!-- sidebar-wrapper  -->
		<main class="page-content mb-5">
			<div class="container">
				<div class="prof" id="profiled">
					<div class="row">
						<div class="col-md-12">
							<div class="profile text-center mb-5" id="profile">
								<hr />
								<h5>
									Profile
									<i class="eprof fa-solid fa-user-pen pl-2 fa-xs text-primary"
										data-target="#editprof" data-toggle="modal"></i>
								</h5>
								<hr />
								<form action="">
									<label for="">User ID</label>
									<input type="text" class="form-control" id="view_userid" readonly>
									<label for="">Name</label>
									<input type="text" class="form-control text-center" name="" id="view_name"
										placeholder="Shaina Rose Calotes" readonly />
									<label for="">Username</label>
									<input type="text" class="form-control text-center" name="" id="view_username" placeholder="Shai"
										readonly />
									<label for="">Email</label>
									<input type="text" class="form-control text-center" name="" id="view_email"
										placeholder="Shai@email.com" readonly />
									<label for="">Address</label>
									<input type="text" class="form-control text-center" name="" id="view_address"
										placeholder="Lam-an, dapit sea-oil basta ara anang naay apartment" readonly />
								</form>
								<hr />
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- page-content" -->
	</div>
	<footer>
		<h6>@Shaina Calotes 2023</h6>
		<div class="d-flex justify-content-center">
			<i class="fa-brands fa-instagram" style="color: #ffffff"></i>
			<i class="fa-brands fa-facebook" style="color: #ffffff"></i>
			<i class="fa-brands fa-google" style="color: #ffffff"></i>
		</div>
	</footer>
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
				<form id="update">
					<div class="modal-body">
						<label for="">User ID</label>
						<input type="text" class="form-control" name="userid" id="userid" readonly>
						<label for="">First Name</label>
						<input type="text" class="form-control" name="fname" id="fname" />
						<label for="">Last Name</label>
						<input type="text" class="form-control" name="lname" id="lname" />
						<label for="">Email</label>
						<input type="text" class="form-control" name="email" id="email" />
						<label for="">Address</label>
						<input type="text" class="form-control" name="address" id="address" />
						<label for="">Username</label>
						<input type="text" class="form-control" name="username" id="username" />
						<label for="">Password</label>
						<input type="text" class="form-control" name="password" id="password" />
						<input type="hidden" class="form-control" name="usertype" value="Admin" />
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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/js/script.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/page/admin.js"></script>
</body>

</html>