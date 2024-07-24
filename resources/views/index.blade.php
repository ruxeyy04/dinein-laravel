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
				<li class="nav-item active">
					<a class="nav-link" href="/">
						<h6>Home</h6>
					</a>
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
					<a class="nav-link" href="prof"><i class="fa-regular fa-circle-user fa-xl"></i> Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#logout">Logout</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="bgc">
		<div class="content">
			<img src="../img/frontbg.jpg" alt="" />
			<div class="chero">
				<h1>Welcome to Dine In Restaurant</h1>
				<h5>We are ready to cook for you, book a table now!</h5>
				<button class="btn btn-warning" onclick="document.location='reserve'" id="bt">
					Book Table
				</button>
			</div>
		</div>
	</div>
	<div class="currentmenu">
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
					<button type="button" class="btn btn-danger logoutt" >Logout</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Order in Advance -->
	<div class="modal fade" id="oia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" id="mheader">
					<h5 class="modal-title foodTitle">Bibimbap</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 text-center">
							<img id="foodImg" src="../img/bibimbap.png" width="200" alt="" class="img-thumbnail"/>
						</div>
						<div class="col-md-12">
							<label for="">Description:</label>
							<p class="text-justify foodDesc">
								Bibimbap is a popular Korean dish that translates to "mixed
								rice" in English. It consists of a bowl of steamed rice topped
								with an assortment of seasoned vegetables, meat (such as beef,
								chicken, or tofu), and a fried or raw egg. The ingredients are
								arranged in separate sections on top of the rice, creating a
								colorful and visually appealing dish. Bibimbap is typically
								served with a spicy chili pepper paste called gochujang, which
								is mixed into the rice and vegetables to enhance the flavors.
								Before eating, the ingredients are thoroughly mixed together,
								allowing the flavors to blend harmoniously. Bibimbap is known
								for its balanced combination of textures, flavors, and
								nutrition, making it a satisfying and wholesome meal option.
							</p>
						</div>

						<div class="col-md-12 text-center" id="prodd">
							<label for="">Price:</label>&nbsp;
							<h6>₱ <span id="foodPrice"></span></h6>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Close
					</button>
					<button type="button" class="btn btn-warning" onclick="document.location='reserve'">
						Order
					</button>
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