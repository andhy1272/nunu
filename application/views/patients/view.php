
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
				<label>Direcci&oacute;n:</label> <br/>
				<?php echo $patient_data['patient_address']; ?>	
			</div>
		</div>
	</div>

	<div class="box box-3">
		<div class="box-name"><span>Informaci&oacute;n Adicional</span></div>
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

<div class="box box-background">
	<div class="box-name"><span>ANTECEDENTES</span></div>
	<div class="box-content">
		
		<div class="accordion accordion-horizontal">
			<div class="accordion-tab tab-title" data-index="tab-1">
				<span>Heredo Familiares</span>
			</div>
			<div class="accordion-tab tab-content tab-1">
				<div class="background-question">
					<p><strong>Alguien en su familia a sufrido de:</strong></p>
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
					<textarea rows="10" name="background-family" class="form-control"><?php echo $patient_data_background['background_family']; ?></textarea>
				</div>
			</div>

			<div class="accordion-tab tab-title" data-index="tab-2">
				<span>Personales Patologicos</span>
			</div>
			<div class="accordion-tab tab-content tab-2">
				<div class="background-question">
					<p><strong>Datos a recabar:</strong></p>
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
					<textarea rows="10" name="background-pathalogic" class="form-control"><?php echo $patient_data_background['background_pathalogic']; ?></textarea>
				</div>
			</div>

			<div class="accordion-tab tab-title" data-index="tab-3">
				<span>Personales No Patologicos</span>
			</div>
			<div class="accordion-tab tab-content tab-3">
				<div class="background-question">
					<p><strong>Datos a recabar:</strong></p>
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
					<textarea rows="10" name="background-non-pathalogic" class="form-control"><?php echo $patient_data_background['background_non_pathalogic']; ?></textarea>
				</div>
			</div>

			<div class="accordion-tab tab-title" data-index="tab-4">
				<span>Neonatales</span>
			</div>
			<div class="accordion-tab tab-content tab-4">
				<div class="background-question">
					<p><strong>Datos a recabar:</strong></p>
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
					<textarea rows="15" name="background-neonatal" class="form-control"><?php echo $patient_data_background['background_neonatal']; ?></textarea>
				</div>
			</div>

			<div class="accordion-tab tab-title" data-index="tab-5">
				<span>Gineco Obstetricos</span>
			</div>
			<div class="accordion-tab tab-content tab-5">
				<div class="background-question">
					<p><strong>Datos a recabar:</strong></p>
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
					<textarea rows="15" name="background-gyneco-obstetric" class="form-control"><?php echo $patient_data_background['background_gyneco_obstetric']; ?></textarea>
				</div>
			</div>
		</div>
		
	</div>
</div>


<?php endif; ?>