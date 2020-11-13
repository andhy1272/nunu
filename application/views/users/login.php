
<div class="content-header">
	<h1><?php echo 'Consultorio Dra. Nataly Barreto Cardenas'; ?></h1>
</div>

<?php $errors = validation_errors(); ?>
<?php if($errors): ?>
	<div class="notifications error">
		<h6>ERROR</h6>
		<?php echo $errors; ?>
	</div>
<?php endif; ?>

<?php echo form_open('users/login'); ?>

<div class="box-container user-login">
	<div class="box">
		<div class="box-name"><span>Iniciar Sesi&oacute;n</span></div>
		<div class="box-content">
			<div class="box-element">
				<label>Usuario:</label>
				<input type="text" name="user-alias" class="form-control" placeholder="Usuario" autofocus>
			</div>
			<div class="box-element">
				<label>Contrase&ntilde;a:</label>
				<input type="password" name="user-password" class="form-control" placeholder="Contrase&ntilde;a">
			</div>

			<div class="actions">
				<button type="submit" class="btn green">ACEPTAR</button>
			</div>
		</div>
	</div>
</div>

<?php echo form_close(); ?>
