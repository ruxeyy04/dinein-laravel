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
				<li class="nav-item active">
					<a class="nav-link" href="table">
						<h6>Table</h6>
					</a>
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
					<a class="nav-link" href="prof"><i class="fa-regular fa-circle-user fa-xl"></i> Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#logout">Logout</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="prod">
			<h4>Tables</h4>
			<div id="tab">
				<div class="accordion" id="tables">
					<div class="row" id="option">
						<div class="col">
							<i class="fa-solid fa-circle fa-2xs" style="color: #1dc928"></i>
							Available
						</div>
						<div class="col">
							<i class="fa-solid fa-circle fa-2xs" style="color: #e39c20"></i>
							Occupied
						</div>
						<div class="col">
							<i class="fa-solid fa-circle fa-2xs" style="color: #c52921"></i>
							Not Available
						</div>
						<div class="col">
							<i class="fa-solid fa-lock fa-2xs" style="color: #95a0b1"></i>
							Maintenance
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
					<button type="button" class="btn btn-danger logoutt">Logout</button>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/js/script.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/page/customer.js"></script>
</body>

</html>