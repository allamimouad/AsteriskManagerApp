<?php

	$title = "ajouter client";
?>

<?php ob_start(); ?>
		
		<?php if ( isset($client_added) ) { ?>
		

		<div class="alert <?= ($client_added) ? "alert-success" : "alert-danger" ?> alert-dismissible fade show" role="alert">
			<h5 class="alert-heading"><?= ($client_added) ? "Client added" : "Client not added" ; ?></h5>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>

		<?php } ?>

		<div class="row align-middle">

			<div class="col-lg-6 offset-lg-3 pt-5 bg-secondary">
				
				<form method="POST"	action="/" >

					<div class="form-group row">

						<input name="v_username" type="text" class="form-control col-sm-12" placeholder="User Name" required>
						<input name="v_password" type="text" class="form-control col-sm-12" placeholder="Password" required>

					</div>

					<div class="form-group row">
						<legend class="col-form-label col-sm-12 pt-0 pb-0">Type de Protocole : </legend>
						<div class="form-check form-check-inline offset-lg-1">
							<input class="form-check-input" type="radio" name="v_Type_de_Protocole" id="inlineRadio1" value="transport-tls">
							<label class="form-check-label" for="inlineRadio1">TLS</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="v_Type_de_Protocole" id="inlineRadio2" value="transport-udp">
							<label class="form-check-label" for="inlineRadio2">UDP</label>
						</div>
					</div>

					<div class="form-group row">

						<label for="inputEmail3" class="col-sm-12 col-form-label">context : </label>
						<div class="col-sm-4 offset-lg-1">
							<select name="v_context" class="custom-select" id="inlineFormCustomSelect">

							<?php foreach ($contexts as $key => $value) { ?>
								
									<option value="<?= $value ?>"><?= $value ?></option>

							<?php } ?>

							</select>
						</div>
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