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
	<link rel="stylesheet" href="css/style.css" />
	<title>DineInRestaurant</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark" id="navb">
		<a class="navbar-brand" href="login">DineInRestaurant</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
			aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
			<ul class="form-inline my-2 my-lg-0">
				<li class="nav-item active">
					<a class="nav-link" href="lproducts">Products</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#login">Login</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="bgc">
		<div class="content">
			<img src="img/frontbg.jpg" alt="" />
			<div class="chero">
				<h1>Welcome to Dine In Restaurant</h1>
				<h5>We are ready to cook for you, book a table now!</h5>
				<button class="btn btn-warning" id="bt" data-toggle="modal" data-target="#login">Book Table</button>
			</div>
		</div>
	</div>
	<div class="currentmenu">
		<h4>Our Current Menu</h4>
		<div class="row menub" id="menub">
			<div class="col" id="menu">
				<div class="row">
					<div class="col-md-6 d-flex justify-content-center">
						<img src="img/bibimbap.png" alt="" />
					</div>
					<div class="col">
						<h6>Bibimbap</h6>
						<h5>₱450.00</h5>
					</div>
				</div>
			</div>
			<div class="col" id="menu">
				<div class="row">
					<div class="col-md-6 d-flex justify-content-center">
						<img src="img/dish.png" alt="" />
					</div>
					<div class="col">
						<h6>Dish</h6>
						<h5>₱450.00</h5>
					</div>
				</div>
			</div>
			<div class="col" id="menu">
				<div class="row">
					<div class="col-md-6 d-flex justify-content-center">
						<img src="img/roast-chicken.png" alt="" />
					</div>
					<div class="col">
						<h6>Roast-chicken</h6>
						<h5>₱450.00</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="menub">
			<div class="col" id="menu">
				<div class="row">
					<div class="col-md-6 d-flex justify-content-center">
						<img src="img/roast-chicken.png" alt="" />
					</div>
					<div class="col">
						<h6>Roast-chicken</h6>
						<h5>₱450.00</h5>
					</div>
				</div>
			</div>
			<div class="col" id="menu">
				<div class="row">
					<div class="col-md-6 d-flex justify-content-center">
						<img src="img/bibimbap.png" alt="" />
					</div>
					<div class="col">
						<h6>Bibimbap</h6>
						<h5>₱450.00</h5>
					</div>
				</div>
			</div>
			<div class="col" id="menu">
				<div class="row">
					<div class="col-md-6 d-flex justify-content-center">
						<img src="img/dish.png" alt="" />
					</div>
					<div class="col">
						<h6>Dish</h6>
						<h5>₱450.00</h5>
					</div>
				</div>
			</div>
		</div>
		<a href="products">
			<p>Show more <i class="fa-solid fa-angle-right"></i></p>
		</a>
	</div>
	<footer>
		<h6>@Shaina Calotes 2023</h6>
		<div class="d-flex justify-content-center">
			<i class="fa-brands fa-instagram" style="color: #ffffff"></i>
			<i class="fa-brands fa-facebook" style="color: #ffffff"></i>
			<i class="fa-brands fa-google" style="color: #ffffff"></i>
		</div>
	</footer>
	<!-- Login -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" id="mheader">
					<h5 class="modal-title">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="loginForm">
					<div class="modal-body">
						<label for="email">Email</label>
						<input type="text" class="form-control" name="email" id="email" placeholder="email@email.com"
							required />
						<label for="pass">Password</label>
						<input type="password" class="form-control" name="pass" id="pass" placeholder="********" required />
						<p>
							Don't have an account?<span data-toggle="modal" data-target="#register">
								Register Here!</span>
						</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- register -->
	<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" id="mheader">
					<h5 class="modal-title">Register</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post" id="regForm">
					<div class="modal-body">
						<label for="">First Name</label>
						<input type="text" class="form-control" placeholder="First Name*" name="fname" required />
						<label for="">Last Name</label>
						<input type="text" class="form-control" placeholder="Last Name*" name="lname" required />
						<label for="">Username</label>
						<input type="text" class="form-control" placeholder="Username*" name="uname" required />
						<label for="">Address</label>
						<input type="text" class="form-control" placeholder="Address*" name="address" required />
						<label for="">Email</label>
						<input type="email" class="form-control" placeholder="email@email.com*" name="email" required />
						<label for="">Password</label>
						<input type="text" class="form-control" placeholder="********" name="pass" required />
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-primary">Register</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="js/script.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/page/login.js"></script>
</body>

</html>