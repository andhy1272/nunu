<div class="content-header">
	<h1><?php echo $agenda_data['patient_fullname']; ?></h1>

	<div class="page-actions">
		<a href="<?php echo base_url(); ?>agenda/" class="btn blue">ATRAS</a>
		<a href="<?php echo base_url(); ?>agenda/edit/" class="btn green">EDITAR</a>
	</div>
</div>

<div class="box-container">
	<div class="box">
		<div class="box-name"><span>Informacion General</span></div>
		<div class="box-content">
			<div class="box-element">
				<label>Identificaci&oacute;n:</label>
				<?php //echo $patient_data['patient_id_number']; ?> / <?php //echo $patient_data['patient_id_type']; ?>	
			</div>
			<div class="box-element">
				<label>Fecha Nacimiento:</label>
				<?php //echo $patient_data['patient_birthdate']; ?>	
			</div>
			<div class="box-element">
				<label>Sexo:</label>
				<?php //echo ($patient_data['patient_sex'] == 'M') ? 'Masculino' : 'Femenino'; ?>
			</div>
			<div class="box-element">
				<label>Ultimo Peso:</label>
				<?php //echo $patient_data['patient_last_weight']; ?>	
			</div>
			<div class="box-element">
				<label>Ultima Altura:</label>
				<?php //echo $patient_data['patient_last_height']; ?>	
			</div>
			<div class="box-element">
				<label>Edad:</label>
				<?php //echo $patient_data['patient_age']; ?>	
			</div>
			<div class="box-element">
				<label>Tipo Sangre:</label>
				<?php //echo $patient_data['patient_blood_type']; ?>	
			</div>
		</div>
	</div>

</div>


