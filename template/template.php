

<?php 


        $reload_dialplan = '<svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-bootstrap-reboot" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 0 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.812 6.812 0 0 0 1.16 8zm5.48-.079V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324h-1.6zm0 3.75V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352h1.141z"/>
                            </svg>';
?>


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
							<ul class="navbar-nav mr-auto">
								<li class="nav-item <?= $navbar_active == "list contexts" ? "active" : '' ?> ">
									<a class="nav-link" href="/?action=clients_list">list clients</a>
								</li>
								<li class="nav-item <?= $navbar_active == "add client" ? "active" : '' ?> ">
									<a class="nav-link" href="/?action=add_client">add client</a>
								</li>
								<li class="nav-item <?= $navbar_active == "create context" ? "active" : '' ?> ">
									<a class="nav-link" href="/?action=add_context">create context</a>
								</li>
							</ul>
							<a class="nav-link" href="/?action=reload_dialplan"><?= $reload_dialplan."eload" ?></a>
						</div>
					</nav>
				</div>
			</div>
		</div>

		<!-- navigation bar end -->


		<!-- bootstrap Model begin -->

 
			<?= isset($model) ? $model : ""  ?>

		
		<!-- bootstrap Model end -->


		<!-- container begin -->

		<div class="container bg-light">
				
			<?= $container ?>

		</div>

		<!-- container end -->








			<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

		<?= isset($customjavascript) ? $customjavascript : "" ?>

	</body>
</html>
