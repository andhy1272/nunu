<h1><?= $title; ?></h1>


<?php $errors = validation_errors(); ?>
<?php if($errors): ?>
	<div class="notifications error">
		<h6>ERROR</h6>
		<?php echo $errors; ?>
	</div>
<?php endif; ?>


<div class="medium-container">
	<?php echo form_open('users/register'); ?>
		<div class="input-group">
			<label>Nombre</label>
			<input type="text" name="name" class="form-control" placeholder="Nombre">
		</div>
		<div class="input-group">
			<label>Nombre Usuario</label>
			<input type="text" name="username" class="form-control" placeholder="Nombre Usuario">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control" placeholder="Email">
		</div>
		<div class="input-group">
			<label>Contrase&ntilde;a</label>
			<input type="password" name="password" class="form-control" placeholder="Contrase&ntilde;a">
		</div>
		<div class="input-group">
			<label>Confirmar Contrase&ntilde;a</label>
			<input type="password" name="password2" class="form-control" placeholder="Confirmar Contrase&ntilde;a">
		</div>
		<div class="input-group">
			<label>Observaciones</label>
			<textarea name="observaciones" class="form-control" placeholder="Observaciones"></textarea>
		</div>

		<div class="actions">
			<button type="submit" class="btn blue">Registrar</button>
		</div>
	<?php echo form_close(); ?>
</div>