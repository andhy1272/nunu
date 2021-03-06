
<?php if($error): ?>
	<div class="error">
		<?php echo $error; ?>
	</div>

<?php else: ?>


<div class="content-header">
	<h1><?php echo $patient_data['patient_name'] . ' ' . $patient_data['patient_last_name']; ?></h1>

	<div class="page-actions">
		<?php
			$back_url = site_url('patients');
			if (isset($_SERVER['HTTP_REFERER'])) {
				$back_url = $_SERVER['HTTP_REFERER'];
			}
		?>
		<a href="<?php echo $back_url; ?>" class="btn blue">ATRAS</a>

		<a href="<?php echo site_url('patients/edit/' . $patient_data['patient_id']); ?>" class="btn green">EDITAR</a>
		<a href="<?php echo site_url('patients/delete/' . $patient_data['patient_id']); ?>" class="btn red">ELIMINAR</a>
		<a href="<?php echo site_url('patients/pdf/' . $patient_data['patient_id']); ?>" class="btn red">PDF</a>
	</div>
</div>

<div class="box-container">
	<div class="box box-3">
		<div class="box-name"><span>Informaci&oacute;n General</span></div>
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
				<?php echo $patient_data['patient_sex']; ?>
			</div>
			<div class="box-element">
				<label>Edad:</label>
				<?php //echo $patient_data['patient_age']; ?>	
			</div>
			<div class="box-element">
				<label>Tipo Sangre:</label>
				<?php echo $patient_data['patient_blood_type']; ?>	
			</div>
			<div class="box-element">
				<label>Estado civil:</label>
				<?php echo $patient_data['patient_marital_status']; ?>	
			</div>
			<div class="box-element">
				<label>Educaci&oacute;n:</label>
				<?php echo $patient_data['patient_education']; ?>	
			</div>
			<div class="box-element">
				<label>Profesi&oacute;n:</label>
				<?php echo $patient_data['patient_profesion']; ?>	
			</div>
			<div class="box-element">
				<label>Agregado en: </label>
				<?php echo $patient_data['patient_created_at']; ?>	
			</div>
		</div>
	</div>

	<div class="box box-3">
		<div class="box-name">
			<span>Informaci&oacute;n de Contacto</span>
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
				<label>Pa&iacute;s:</label>
				<?php echo $patient_data['patient_country']; ?>	
			</div>
			<div class="box-element">
				<label>Provincia/Estado/Departamento:</label>
				<?php echo $patient_data['patient_province']; ?>	
			</div>
			<div class="box-element">
				<label>Ciudad:</label>
				<?php echo $patient_data['patient_city']; ?>	
			</div>
			<div class="box-element">
				<label>Direcci&oacute;n:</label>
				<?php echo $patient_data['patient_address']; ?>	
			</div>
		</div>
	</div>

</div>

<div class="box box-background">
	<div class="box-name"><span>ANTECEDENTES</span></div>
	<div class="box-content">
		
		<div class="accordion accordion-horizontal">
			<div class="accordion-tab tab-title" data-index="tab-1">
				<span>Heredo Familiares</span>
			</div>
			<div class="accordion-tab tab-content tab-1">
				<div class="background-question">
					<ul>
						<li>- Asma</li>
						<li>- Diabetes</li>
						<li>- Hipertension</li>   
						<li>- Cardiopatia</li>      
						<li>- Hepatopatia</li> 
						<li>- Nefropatia</li> 
						<li>- Enf. Mentales</li> 
						<li>- Osteoarticulares</li> 
						<li>- Enf. Alergicas</li> 
						<li>- Enf. Endocrinas </li> 
						<li>- Neoplasias</li> 
					</ul>
				</div>
				<div class="box-element background-control">
					<label>Antecedentes Heredo Familiares:</label> <br/>
					<textarea rows="10" name="background-family" class="form-control" readonly><?php echo $patient_data_background['background_family']; ?></textarea>
				</div>
			</div>

			<div class="accordion-tab tab-title" data-index="tab-2">
				<span>Personales Patologicos</span>
			</div>
			<div class="accordion-tab tab-content tab-2">
				<div class="background-question">
					<ul>
						<li>- Quirurgicos</li>
						<li>- Transfusion</li>
						<li>- Alergias</li>   
						<li>- Traumaticos</li>      
						<li>- Patologia Cronica</li> 
						<li>- Hospitalizaciones Previas</li> 
						<li>- Adicciones</li> 
						<li>- Digestivas</li> 
						<li>- Otros</li> 
					</ul>
				</div>
				<div class="box-element background-control">
					<label>Antecedentes Personales Patologicos:</label> <br/>
					<textarea rows="10" name="background-pathalogic" class="form-control" readonly><?php echo $patient_data_background['background_pathalogic']; ?></textarea>
				</div>
			</div>

			<div class="accordion-tab tab-title" data-index="tab-3">
				<span>Personales No Patologicos</span>
			</div>
			<div class="accordion-tab tab-content tab-3">
				<div class="background-question">
					<ul>
						<li>- Drogas</li>
						<li>- Alcohol</li>
						<li>- Tabaquismo (cig/dia)</li>
						<li>- Alimentacion (veces/dia)</li>
						<li>- Actividad Fisica</li>
						<li>- Inmunizaciones</li>
					</ul>
				</div>
				<div class="box-element background-control">
					<label>Antecedentes Personales No Patologicos:</label> <br/>
					<textarea rows="10" name="background-non-pathalogic" class="form-control" readonly><?php echo $patient_data_background['background_non_pathalogic']; ?></textarea>
				</div>
			</div>

			<div class="accordion-tab tab-title" data-index="tab-4">
				<span>Neonatales</span>
			</div>
			<div class="accordion-tab tab-content tab-4">
				<div class="background-question">
					<ul>
						<li>- Cesarea &oacute Parto</li>
						<li>- Controles</li>
						<li>- Ecos</li>
						<li>- Semanas de Gestacion</li>
						<li>- Infecciones Urinarias (Si/No) - (Recibio Tratamiento)</li>
						<li>- Infecciones Vaginales (Si/No) - (Recibio Tratamiento)</li>
						<li>- Hipertension durante el embarazo (Si/No)</li>
						<li>- Diabetes Gestacional (Si/No)</li>
						<li>- Peso al Nacer (Kgs)</li>
						<li>- Talla al Nacer (cms)</li>
						<li>- Perimetro Cefalico (cms)</li>    
					</ul>

					<ul>
						<li>APGAR</li>
						<li>- Minuto 1</li>     
						<li>- Minuto 5</li>
					</ul>
				</div>
				<div class="box-element background-control">
					<label>Antecedentes Neonatales:</label> <br/>
					<textarea rows="15" name="background-neonatal" class="form-control" readonly><?php echo $patient_data_background['background_neonatal']; ?></textarea>
				</div>
			</div>

			<div class="accordion-tab tab-title" data-index="tab-5">
				<span>Gineco Obstetricos</span>
			</div>
			<div class="accordion-tab tab-content tab-5">
				<div class="background-question">
					<ul>
						<li>- Menarquia</li> 
						<li>- Menopausia</li> 
						<li>- Ritmo Menstrual</li>
						<li>- FUM</li>
						<li>- FPP</li>
						<li>- Gestacionales</li>
						<li>- Actividad Sexual (Si/No)</li>
						<li>- Met. Anticonceptivo</li>
						<li>- PAP test</li>
						<li>- Numero de parejas</li>
					</ul>

					<ul>
						<li>PARTOS</li>
						<li>- Vivos</li>
						<li>- Cesareas</li>
						<li>- Abortos</li>
					</li>
				</div>
				<div class="box-element background-control">
					<label>Antecedentes Gineco Obstetricos:</label> <br/>
					<textarea rows="15" name="background-gyneco-obstetric" class="form-control" readonly><?php echo $patient_data_background['background_gyneco_obstetric']; ?></textarea>
				</div>
			</div>
		</div>
		
	</div>
</div>


<?php endif; ?>