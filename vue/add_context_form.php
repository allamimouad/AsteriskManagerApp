<?php

	$title = "create context";
?>

<?php ob_start(); ?>
		
		<?php if ( isset($context_added) ) { ?>
		

		<div class="alert <?= ($context_added) ? "alert-success" : "alert-danger" ?> alert-dismissible fade show" role="alert">
			<h5 class="alert-heading"><?= ($context_added) ? "Context added" : "Contex not added" ; ?></h5>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>

		<?php } ?>

		<div class="row align-middle">

			<div class="col-lg-6 offset-lg-3 pt-5">
				
				<form method="POST"	action="/" >

					<div class="form-group row">

						<input name="v_context" type="text" class="form-control col-sm-12" placeholder="Context Name" required>

					</div>


					<div class="form-group row">
						<input type="submit" class="form-control col-sm-2 offset-sm-10" value="submit">
					</div>

				</form>

			</div>
		</div>

<?php

	$container = ob_get_clean(); 
?>

<?php require('template/template.php'); ?>