<div class="content-header">
	<h1><?= $page_title; ?></h1>

	<div class="page-actions">
		<?php
			$back_url = site_url('users');
			if (isset($_SERVER['HTTP_REFERER'])) {
				$back_url = $_SERVER['HTTP_REFERER'];
			}
		?>
		<a href="<?php echo $back_url; ?>" class="btn blue">ATRAS</a>
	</div>
</div>

<?php $errors = validation_errors(); ?>
<?php if($errors): ?>
	<div class="notifications error">
		<h6>ERROR</h6>
		<?php echo $errors; ?>
	</div>
<?php endif; ?>

<?php echo form_open('users/register'); ?>
<div class="box-container user-register">
	<div class="box box-3">
		<div class="box-name"><span>Informaci&oacute;n General</span></div>
		<div class="box-content">
			<div class="box-element">
				<label>Nombre Completo:</label>
				<input type="text" name="user-name" class="form-control" placeholder="Nombre">
			</div>
			<div class="box-element">
				<label>Email:</label>
				<input type="email" name="user-email" class="form-control" placeholder="Email">
			</div>
			<div class="box-element">
				<label>Tel&eacute;fonos:</label>
				<input type="text" name="user-phone" class="form-control" placeholder="Telefonos">
			</div>
			<div class="box-element">
				<label>Direcci&oacute;n:</label>
				<input type="text" name="user-address" class="form-control" placeholder="Direccion">
			</div>
			
		</div>
	</div>

	<div class="box box-3">
		<div class="box-name"><span>Datos del Usuario</span></div>
		<div class="box-content">
			<div class="box-element">
				<label>Alias:</label>
				<input type="text" name="user-alias" class="form-control" placeholder="Alias">
			</div>
			<div class="box-element">
				<label>Contrase&ntilde;a:</label>
				<input type="password" name="user-password" class="form-control" placeholder="Contrase&ntilde;a">
			</div>
			<div class="box-element">
				<label>Confirmar Contrase&ntilde;a:</label>
				<input type="password" name="user-password2" class="form-control" placeholder="Confirmar Contrase&ntilde;a">
			</div>
			<div class="box-element">
				<label>Rol:</label>
				<select name="user-role" class="form-control user-roles" multiple>
					<option value="Administrador">Administrador</option>
					<option value="Medico General">Medico General</option>
					<option value="Medico Pediatra">Medico Pediatra</option>
					<option value="Medico Ginecologo">Medico Ginecologo</option>
					<option value="Medico Oncologo">Medico Oncologo</option>
					<option value="Odontologo">Odontologo</option>
					<option value="Medico Geriatra">Medico Geriatra</option>
					<option value="Medico Urologo">Medico Urologo</option>
					<option value="Medico Pediatra">Medico Pediatra</option>
					<option value="Recepcionista">Recepcionista</option>
					<option value="Auxiliar">Auxiliar</option>
					<option value="Enfermera">Enfermera</option>
				</select>
			</div>
		</div>
	</div>

	<div class="box box-3">
		<div class="box-name"><span>Permisos</span></div>
		<div class="box-content">
			<div class="box-element">
				<label>Permisos:</label>
				<select name="user-permisions" class="form-control user-permisions" multiple="multiple">
					<optgroup label="Pacientes">
						<option value="patient-view">Ver</option>
						<option value="patient-create">Crear</option>
						<option value="patient-edit">Editar</option>
					</optgroup>
					<optgroup label="Citas">
						<option value="appointment-view">Ver</option>
						<option value="appointment-create">Crear</option>
						<option value="appointment-edit">Editar</option>
					</optgroup>
					<optgroup label="Historial">
						<option value="history-view">Ver</option>
						<option value="history-create">Crear</option>
						<option value="history-edit">Editar</option>
					</optgroup>
					<optgroup label="Administrador">
						<option value="admin-edit">Editar</option>
					</optgroup>
				</select>
			</div>

			<div class="actions">
				<button type="submit" class="btn green">REGISTRAR</button>
			</div>
		</div>
	</div>

</div>
<?php echo form_close(); ?>
