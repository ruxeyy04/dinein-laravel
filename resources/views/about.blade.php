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
				<li class="nav-item">
					<a class="nav-link" href="table">Table</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="reserve">Reserve</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="order">Menu</a>
				</li>
			</ul>
			<ul class="form-inline my-2 my-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="about">
						<h6>About</h6>
					</a>
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
		<div class="abt">
			<h4 class="font-weight-bold">ABOUT US</h4>
			<div class="">
				<div class="row">
					<div class="col-md-12 mb-5 text-justify">
					Welcome to DineIn Restaurant, where memorable dining experiences await you!
                    At DineIn Restaurant, we believe that great food should be enjoyed in an atmosphere 
                    that exudes warmth, elegance, and comfort. Nestled in the heart of Ozamiz City, 
                    our restaurant is a haven for those seeking an exquisite culinary journey paired 
                    with impeccable service. Step into our inviting space, meticulously designed to 
                    create an ambiance that transcends mere dining and transforms it into a captivating 
                    experience. From the soft, ambient lighting to the carefully curated decor, every 
                    detail has been thoughtfully considered to ensure an unforgettable evening for our guests.
					</div>
					<div class="col-md-12 text-center mb-4">
						<h5 class="font-weight-bold">Website Created</h5>

						<img src="../img/me.jpg" width="250px" alt="" />
					</div>
					<div class="col-md-12 text-center mb-5">
						<h5 class="text-center">Shaina Ross Calotes</h5>
						<p class="text-justify container">
							Greetings! I'm Shaina Ross Calotes, the creative force behind the digital realm of DineIn,
							where the art of dining and the wonders of technology converge. As the website developer for DineIn, 
							my mission is to transport you into a virtual world of culinary delights and tantalizing experiences. 
							I harness the power of code and design to weave together an online tapestry that perfectly reflects 
							the essence of this remarkable restaurant.
						</p>
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

	<script src="../js/script.js"></script>
</body>

</html>