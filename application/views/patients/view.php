
<?php if($error): ?>
	<div class="error">
		<?php echo $error; ?>
	</div>

<?php else: ?>


<div class="content-header">
	<h1><?php echo $patient_data['patient_name'] . ' ' . $patient_data['patient_last_name']; ?></h1>

	<div class="page-actions">
		<a href="<?php echo base_url(); ?>patients/" class="btn blue">ATRAS</a>
		<a href="<?php echo base_url(); ?>patients/edit/" class="btn green">EDITAR</a>
	</div>
</div>

<div class="box-container">
	<div class="box box-3">
		<div class="box-name"><span>Informacion General</span></div>
		<div class="box-content">
			<div class="box-element">
				<label>Identificaci&oacute;n:</label>
				<?php echo $patient_data['patient_id_number']; ?> / <?php echo $patient_data['patient_id_type']; ?>	
			</div>
			<div class="box-element">
				<label>Fecha Nacimiento:</label>
				<?php echo $patient_data['patient_birthdate']; ?>	
			</div>
			<div class="box-element">
				<label>Sexo:</label>
				<?php echo ($patient_data['patient_sex'] == 'M') ? 'Masculino' : 'Femenino'; ?>
			</div>
			<div class="box-element">
				<label>Ultimo Peso:</label>
				<?php echo $patient_data['patient_last_weight']; ?>	
			</div>
			<div class="box-element">
				<label>Ultima Altura:</label>
				<?php echo $patient_data['patient_last_height']; ?>	
			</div>
			<div class="box-element">
				<label>Edad:</label>
				<?php //echo $patient_data['patient_age']; ?>	
			</div>
			<div class="box-element">
				<label>Tipo Sangre:</label>
				<?php echo $patient_data['patient_blood_type']; ?>	
			</div>
		</div>
	</div>

	<div class="box box-3">
		<div class="box-name">
			<span>Informacion de Contacto</span>
			<!--<span class="edit-link">Editar</span>-->
		</div>
		<div class="box-content">
			<div class="box-element">
				<label>Celular:</label>
				<?php echo $patient_data['patient_phone1']; ?>	
			</div>
			<div class="box-element">
				<label>Tel&eacute;fono:</label>
				<?php echo $patient_data['patient_phone2']; ?>	
			</div>
			<div class="box-element">
				<label>Email:</label>
				<?php echo $patient_data['patient_email']; ?>	
			</div>
			<div class="box-element">
				<label>Direcci&oacute;n:</label> <br/>
				<?php echo $patient_data['patient_address']; ?>	
			</div>
		</div>
	</div>

	<div class="box box-3">
		<div class="box-name"><span>Info Adicional</span></div>
		<div class="box-content">
			<div class="box-element">
				<label>Detalles:</label> <br/>
				<?php echo $patient_data['patient_observations']; ?>	
			</div>
			<div class="box-element">
				<label>Agregado en: </label>
				<?php echo $patient_data['patient_created_at']; ?>	
			</div>
		</div>
	</div>
</div>

<div class="box box-historial">
	<div class="box-name"><span>Historial / Citas</span></div>
	<div class="box-content">
		<div class="box-element">
			<label>Detalles:</label> <br/>
			<p><?php echo $patient_data['patient_observations']; ?></p>
			<p><?php echo $patient_data['patient_observations']; ?></p>
			<p><?php echo $patient_data['patient_observations']; ?></p>
			<p><?php echo $patient_data['patient_observations']; ?></p>
			<p><?php echo $patient_data['patient_observations']; ?></p>
			<p><?php echo $patient_data['patient_observations']; ?></p>
			<p><?php echo $patient_data['patient_observations']; ?></p>
			<p><?php echo $patient_data['patient_observations']; ?></p>
			<p><?php echo $patient_data['patient_observations']; ?></p>
			<p><?php echo $patient_data['patient_observations']; ?></p>
			<p><?php echo $patient_data['patient_observations']; ?></p>
			<p><?php echo $patient_data['patient_observations']; ?></p>
		</div>
	</div>
</div>


<?php endif; ?>