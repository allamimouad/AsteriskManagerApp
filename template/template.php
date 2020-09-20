<!DOCTYPE html>
<html>
	<head>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


		<title><?= $title ?></title>

		<style type="text/css">
			

			/*img{
				max-width: 100%
			}

			.row {
		        border: 1px solid #7451EB;
		        padding: 3px;
			}
			[class^="col"] {
		        padding: 1rem;
		        border: 2px solid #3FA5DB;
			}*/



		</style>


	</head>
	<body>

		<!-- navigation bar start -->

		<div class="bg-dark">
			<div class="container">
				<div class="row">
					<nav class="col navbar navbar-expand-lg navbar-dark">
						<a class="navbar-brand" href="/?action=clients_list">
							<img src="Asterisk_logo.svg.png" width="50" height="40" alt="erro while finding the logo">
							Administration
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div id="navbarContent" class="collapse navbar-collapse">
							<ul class="navbar-nav">
								<li class="nav-item <?= $navbar_active == "list clients" ? "active" : '' ?> ">
									<a class="nav-link" href="/?action=clients_list">list clients</a>
								</li>
								<li class="nav-item <?= $navbar_active == "add client" ? "active" : '' ?> ">
									<a class="nav-link" href="/?action=add_client">add client</a>
								</li>
								<li class="nav-item <?= $navbar_active == "create context" ? "active" : '' ?> ">
									<a class="nav-link" href="/?action=add_context">create context</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>

		<!-- navigation bar end -->


		<div class="container bg-light">
				
			<?= $container ?>

		</div>








			<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	</body>
</html>
