<div class="content-header">
	<h1><?= $page_title; ?></h1>

	<div class="page-actions">
		<a href="<?php echo base_url(); ?>patients/" class="btn blue">ATRAS</a>
		<a href="<?php echo base_url(); ?>patients/" class="btn red">CANCELAR</a>
	</div>
</div>


<?php $errors = validation_errors(); ?>
<?php if($errors): ?>
	<div class="notifications error">
		<h6>ERROR</h6>
		<?php echo $errors; ?>
	</div>
<?php endif; ?>


<?php echo form_open('patients/create'); ?>

	<div class="box-container">

		<div class="box box-3">
			<div class="box-name"><span>Informaci&oacute;n General</span></div>
			<div class="box-content">
				<div class="box-element half-left">
					<label>Identificaci&oacute;n:</label>
					<?php echo get_id_type_list(); //options_helper ?>
				</div>
				<div class="box-element half-right">
					<label>&nbsp;</label>
					<input type="text" name="patient-id-number" class="form-control val-required" placeholder="ID Número" value="<?= $form_data['patient_id_number']; ?>">
				</div>
				<div class="box-element half-left">
					<label>Nombre:</label>
					<input type="text" name="patient-name" class="form-control val-required" placeholder="Nombre" value="<?= $form_data['patient_name']; ?>">
				</div>
				<div class="box-element half-right">
					<label>Apellidos:</label>
					<input type="text" name="patient-last-name" class="form-control val-required" placeholder="Apellidos" value="<?= $form_data['patient_last_name']; ?>">
				</div>
				<div class="box-element half-left">
					<label>Fecha de Nacimiento:</label>
					<input type="text" name="patient-birthdate" class="form-control val-date-older val-required calendar-control" value="<?= $form_data['patient_birthdate']; ?>" placeholder="2000-12-31" readonly>
				</div>
				<div class="box-element half-right">
					<label>Sexo:</label>
					<?php echo get_sex_list(); //options_helper ?>
				</div>
				<div class="box-element half-left">
					<label>Tipo Sangre:</label>	
					<?php echo get_blood_list(); //options_helper ?>
				</div>
				<div class="box-element half-right">
					<label>Estado civil:</label>	
					<?php echo get_marital_status_list(); //options_helper ?>
				</div>
				<div class="box-element half-left">
					<label>Educaci&oacute;n:</label>	
					<?php echo get_education_list(); //options_helper ?>
				</div>
				<div class="box-element half-right">
					<label>Profesi&oacute;n:</label>	
					<input type="text" name="patient-profesion" class="form-control" value="<?= $form_data['patient_profesion']; ?>" maxlength="255">
				</div>
			</div>
		</div>

		<div class="box box-3">
			<div class="box-name"><span>Informaci&oacute;n de Contacto</span></div>
			<div class="box-content">
				<div class="box-element half-left">
					<label>Celular:</label>
					<input type="text" name="patient-phone1" class="form-control val-required" placeholder="+(000) 111 2233" value="<?= $form_data['patient_phone1']; ?>">
				</div>
				<div class="box-element half-right">
					<label>Tel&eacute;fono:</label>
					<input type="text" name="patient-phone2" class="form-control" placeholder="+(000) 111 2233" value="<?= $form_data['patient_phone2']; ?>">	
				</div>
				<div class="box-element">
					<label>E-mail:</label>
					<input type="text" name="patient-email" class="form-control" placeholder="nunu.support@gmail.com" value="<?= $form_data['patient_email']; ?>">	
				</div>
				<div class="box-element half-left">
					<label>Pa&iacute;s:</label>
					<?php echo get_country_list(); //options_helper ?>

					<label>Provincia/Estado/Departamento:</label>
					<?php echo get_province_list(); //options_helper ?>

					<label>Ciudad:</label>
					<input type="text" name="patient-city" class="form-control" placeholder="Ciudad" value="<?= $form_data['patient_city']; ?>">	
				</div>

				<div class="box-element half-right">
					<label>Direcci&oacute;n:</label> <br/>
					<textarea rows="9" name="patient-address" maxlength="255" class="form-control val-required" placeholder="Direcci&oacute;n"><?= $form_data['patient_address']; ?></textarea>
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
						<label>Antecedentes:</label> <br/>
						<textarea rows="10" name="background-family" class="form-control"><?= $form_data_background['background_family']; ?></textarea>
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
						<label>Antecedentes:</label> <br/>
						<textarea rows="10" name="background-pathalogic" class="form-control"><?= $form_data_background['background_pathalogic']; ?></textarea>
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
						<label>Antecedentes:</label> <br/>
						<textarea rows="10" name="background-non-pathalogic" class="form-control"><?= $form_data_background['background_non_pathalogic']; ?></textarea>
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
						<label>Antecedentes:</label> <br/>
						<textarea rows="15" name="background-neonatal" class="form-control"><?= $form_data_background['background_neonatal']; ?></textarea>
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
						<label>Antecedentes:</label> <br/>
						<textarea rows="15" name="background-gyneco-obstetric" class="form-control"><?= $form_data_background['background_gyneco_obstetric']; ?></textarea>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="actions page-actions">
		<a href="<?php echo base_url(); ?>patients/" class="btn red">CANCELAR</a>
		<button type="reset" class="btn blue">LIMPIAR</button>
		<button type="submit" class="btn green">REGISTRAR</button>
	</div>
<?php echo form_close(); ?>




<?php $this->load->view('templates/calendar'); ?>


