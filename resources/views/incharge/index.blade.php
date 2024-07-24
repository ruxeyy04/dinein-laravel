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
	<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../css/admin.css" />
	<title>DineInRestaurant</title>
	<script src="../js/incharge/index.js"></script>
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
						<span><span id="user-name">Shaina Rose</span> <strong id="last-name">Calotes</strong></span>
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
							<a href="{{route('inchIndex')}}">
								<i class="fa fa-tachometer-alt"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="sidebar-dropdown">
							<a href="{{route('inchFoods')}}">
								<i class="fa-solid fa-utensils"></i>
								<span>Foods</span>
							</a>
						</li>
						<li class="sidebar-dropdown">
							<a href="{{route('inchTable')}}">
								<i class="fa-solid fa-table"></i>
								<span>Table</span>
							</a>
						</li>
						<li class="sidebar-dropdown">
							<a href="{{route('inchReservation')}}">
								<i class="fa-solid fa-clock"></i>
								<span>Reservation</span>
							</a>
						</li>
						<li class="sidebar-dropdown">
							<a href="{{route('inchProfile')}}">
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
			<div class="dashboardd">
				<div class="row text-center mt-5">

					<div class="col-md-4">
						<i class="fa-solid fa-utensils fa-lg"> Food/s</i>
						<h1 class="total-food">0</h1>
					</div>
					<div class="col-md-4">
						<i class="fa-solid fa-table fa-lg"> Table/s</i>
						<h1 class="total-table">0</h1>
					</div>
					<div class="col-md-4">
						<i class="fa-solid fa-user fa-lg"> In-charge/s</i>
						<h1 class="total-incharge">0</h1>
					</div>
					<div class="col-md-6 mt-5">
						<h6>Recent Orders</h6>
						<table class="table" id="reservations">
							<thead class="thead-dark">
								<tr>
									<th scope="col">Reservation ID</th>
									<th scope="col">Table ID</th>
									<th scope="col">User ID</th>
									<th scope="col">Date</th>
									<th scope="col">Status</th>
								</tr>
							</thead>
						</table>

					</div>
					<div class="col-md-6 mt-5">
						<h6>Recent Users</h6>
						<table class="table" id="users">
							<thead class="thead-dark">
								<tr>
									<th scope="col">User ID</th>
									<th scope="col">Name</th>
									<th scope="col">Email</th>
									<th scope="col">Username</th>
									<th scope="col">Usertype</th>
								</tr>
							</thead>
						</table>

						
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
	<!-- logout -->
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
					<button type="button" class="btn btn-danger logoutt" id="logout">Logout</button>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/js/script.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/page/incharge.js"></script>
</body>

</html>