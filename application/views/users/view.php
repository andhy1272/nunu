<div class="content-header">
	<h1><?php echo $user_data['user_name']; ?></h1>

	<div class="page-actions">
		<?php
			$back_url = site_url('users');
			if (isset($_SERVER['HTTP_REFERER'])) {
				$back_url = $_SERVER['HTTP_REFERER'];
			}
		?>
		<a href="<?php echo $back_url; ?>" class="btn blue">ATRAS</a>

		<a href="<?php echo base_url(); ?>users/edit/" class="btn green">EDITAR</a>
	</div>
</div>

<?php if($error): ?>
	<div class="error">
		<?php echo $error; ?>
	</div>
<?php else: ?>

<div class="box-container">
	<div class="box box-3">
		<div class="box-name"><span>Informaci&oacute;n del Usuario</span></div>
		<div class="box-content">
			<div class="box-element">
				<label>Nombre:</label>
				<?php echo $user_data['user_name']; ?>	
			</div>
			<div class="box-element">
				<label>Alias:</label>
				<?php echo $user_data['user_alias']; ?>	
			</div>
			<div class="box-element">
				<label>Email:</label>
				<?php echo $user_data['user_email']; ?>	
			</div>
			<div class="box-element">
				<label>Status:</label>
				<?php echo $user_data['user_status']; ?>	
			</div>
		</div>
	</div>

	<div class="box box-3">
		<div class="box-name">
			<span>Permisos del Usuario</span>
		</div>
		<div class="box-content">			
			<div class="box-element">
				<label>Permisos:</label> <br/>
				<?php echo $user_data['user_role']; ?>	
			</div>
		</div>
	</div>

</div>

<?php endif; ?>



