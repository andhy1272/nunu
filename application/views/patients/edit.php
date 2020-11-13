
<?php if($error): ?>
	<div class="error">
		<?php echo $error; ?>
	</div>

<?php else: ?>


	<div class="content-header">
		<h1><?= $page_title; ?> / <?php echo $patient_data['patient_name'] . ' ' . $patient_data['patient_last_name']; ?></h1>

		<div class="page-actions">
			<?php
				$back_url = site_url('patients');
				if (isset($_SERVER['HTTP_REFERER'])) {
					$back_url = $_SERVER['HTTP_REFERER'];
				}
			?>
			<a href="<?php echo $back_url; ?>" class="btn blue">ATRAS</a>
		</div>
	</div>

	<div class="box-container patients patients-edit edit-form">
		<div class="box box-3">
			<div class="box-name"><span>Informacion General</span></div>
			<div class="box-content">
				<div class="box-element form-control">
					<label>Nombres:</label>
					<span id="patient_name"><?php echo $patient_data['patient_name']; ?></span>
					<button type="button" action="edit" data-type="date" data-label="Nombres:" data-control-name="patient_name" data-value="<?php echo $patient_data['patient_name']; ?>">Editar</button>
				</div>
				<div class="box-element form-control">
					<label>Apellidos:</label>
					<span id="patient_last_name"><?php echo $patient_data['patient_last_name']; ?></span>
					<button type="button" action="edit" data-type="date" data-label="Apellidos:" data-control-name="patient_last_name" data-value="<?php echo $patient_data['patient_last_name']; ?>">Editar</button>
				</div>
				<div class="box-element form-control">
					<label>Identificaci&oacute;n:</label>
					<span id="patient_id_number"><?php echo $patient_data['patient_id_number']; ?></span>
					<button type="button" action="edit" data-type="text" data-label="N&uacute;mero Identificaci&oacute;n::" data-control-name="patient_id_number" data-value="<?php echo $patient_data['patient_id_number']; ?>">Editar</button>
					/
					<span id="patient_id_type"><?php echo $patient_data['patient_id_type']; ?></span>
					<button type="button" action="edit" data-type="id_type" data-label="Tipo Identificaci&oacute;n:" data-control-name="patient_id_type" data-value="<?php echo $patient_data['patient_id_type']; ?>">Editar</button>
				</div>
				<div class="box-element form-control">
					<label>Fecha Nacimiento:</label>
					<span id="patient_birthdate"><?php echo $patient_data['patient_birthdate']; ?></span>
					<button type="button" action="edit" data-type="date" data-label="Fecha Nacimiento:" data-control-name="patient_birthdate" data-value="<?php echo $patient_data['patient_birthdate']; ?>">Editar</button>
				</div>
				<div class="box-element form-control">
					<label>Sexo:</label>
					<span id="patient_sex"><?php echo $patient_data['patient_sex']; ?></span>
					<button type="button" action="edit" data-type="sex" data-label="Sexo:" data-control-name="patient_sex" data-value="<?php echo $patient_data['patient_sex']; ?>">Editar</button>
				</div>
				<div class="box-element form-control">
					<label>Tipo Sangre:</label>
					<span id="patient_blood_type"><?php echo $patient_data['patient_blood_type']; ?></span>
					<button type="button" action="edit" data-type="blood" data-label="Tipo Sangre:" data-control-name="patient_blood_type" data-value="<?php echo $patient_data['patient_blood_type']; ?>">Editar</button>
				</div>
				<div class="box-element form-control">
					<label>Estado civil:</label>
					<span id="patient_marital_status"><?php echo $patient_data['patient_marital_status']; ?></span>
					<button type="button" action="edit" data-type="marital_status" data-label="Estado civil:" data-control-name="patient_marital_status" data-value="<?php echo $patient_data['patient_marital_status']; ?>">Editar</button>
				</div>
				<div class="box-element form-control">
					<label>Educaci&oacute;n:</label>
					<span id="patient_education"><?php echo $patient_data['patient_education']; ?></span>
					<button type="button" action="edit" data-type="education" data-label="Educaci&oacute;n:" data-control-name="patient_education" data-value="<?php echo $patient_data['patient_education']; ?>">Editar</button>
				</div>
				<div class="box-element form-control">
					<label>Profesi&oacute;n:</label>
					<span id="patient_profesion"><?php echo $patient_data['patient_profesion']; ?></span>
					<button type="button" action="edit" data-type="text" data-label="Profesi&oacute;n:" data-control-name="patient_profesion" data-value="<?php echo $patient_data['patient_profesion']; ?>">Editar</button>
				</div>
			</div>
		</div>

		<div class="box box-3">
			<div class="box-name">
				<span>Informacion de Contacto</span>
				<!--<span class="edit-link">Editar</span>-->
			</div>
			<div class="box-content">
				<div class="box-element form-control">
					<label>Celular:</label>
					<span id="patient_phone1"><?php echo $patient_data['patient_phone1']; ?></span>
					<button type="button" action="edit" data-type="text" data-label="Celular:" data-control-name="patient_phone1" data-value="<?php echo $patient_data['patient_phone1']; ?>">Editar</button>
				</div>
				<div class="box-element form-control">
					<label>Tel&eacute;fono:</label>
					<span id="patient_phone2"><?php echo $patient_data['patient_phone2']; ?></span>
					<button type="button" action="edit" data-type="text" data-label="Tel&eacute;fono:" data-control-name="patient_phone2" data-value="<?php echo $patient_data['patient_phone2']; ?>">Editar</button>
				</div>
				<div class="box-element form-control">
					<label>Email:</label>
					<span id="patient_email"><?php echo $patient_data['patient_email']; ?></span>
					<button type="button" action="edit" data-type="text" data-label="Email:" data-control-name="patient_email" data-value="<?php echo $patient_data['patient_email']; ?>">Editar</button>
				</div>

				<div class="box-element form-control">
					<label>Pa&iacute;s:</label>
					<span id="patient_country"><?php echo $patient_data['patient_country']; ?></span>
					<button type="button" action="edit" data-type="country" data-label="Pa&iacute;s:" data-control-name="patient_country" data-value="<?php echo $patient_data['patient_country']; ?>">Editar</button>
				</div>
				<div class="box-element form-control">
					<label>Provincia/Estado/Departamento:</label>
					<span id="patient_province"><?php echo $patient_data['patient_province']; ?></span>
					<button type="button" action="edit" data-type="province" data-label="Provincia/Estado/Departamento:" data-control-name="patient_province" data-value="<?php echo $patient_data['patient_province']; ?>">Editar</button>
				</div>
				<div class="box-element form-control">
					<label>Ciudad:</label>
					<span id="patient_city"><?php echo $patient_data['patient_city']; ?></span>
					<button type="button" action="edit" data-type="text" data-label="Ciudad:" data-control-name="patient_city" data-value="<?php echo $patient_data['patient_city']; ?>">Editar</button>
				</div>

				<div class="box-element form-control">
					<label>Direcci&oacute;n:</label>
					<span id="patient_address"><?php echo $patient_data['patient_address']; ?></span>
					<button type="button" action="edit" data-type="textarea" data-label="Direcci&oacute;n:" data-control-name="patient_address" data-value="<?php echo $patient_data['patient_address']; ?>">Editar</button>
				</div>
			</div>
		</div>

	</div>

	<div class="box box-background patients patients-edit edit-form">
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
					<div class="box-element box-element-textarea background-control">
						<label>Antecedentes Heredo Familiares:</label>
						<textarea rows="10" id="background_family" name="background-family" class="form-control" readonly>
							<?php echo $patient_data_background['background_family']; ?>
						</textarea>
						<button type="button" action="edit-background" data-type="textarea" data-label="Antecedentes Heredo Familiares:" data-control-name="background_family" data-value="<?php echo $patient_data_background['background_family']; ?>">Editar</button>
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
					<div class="box-element box-element-textarea background-control">
						<label>Antecedentes Personales Patologicos:</label>
						<textarea rows="10" id="background_pathalogic" name="background-pathalogic" class="form-control" readonly>
							<?php echo $patient_data_background['background_pathalogic']; ?>
						</textarea>
						<button type="button" action="edit-background" data-type="textarea" data-label="Antecedentes Personales Patologicos:" data-control-name="background_pathalogic" data-value="<?php echo $patient_data_background['background_pathalogic']; ?>">Editar</button>
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
					<div class="box-element box-element-textarea background-control">
						<label>Antecedentes Personales No Patologicos:</label>
						<textarea rows="10" id="background_non_pathalogic" name="background-non-pathalogic" class="form-control" readonly>
							<?php echo $patient_data_background['background_non_pathalogic']; ?>
						</textarea>
						<button type="button" action="edit-background" data-type="textarea" data-label="Antecedentes Personales No Patologicos:" data-control-name="background_non_pathalogic" data-value="<?php echo $patient_data_background['background_non_pathalogic']; ?>">Editar</button>
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
					<div class="box-element box-element box-element-textarea background-control">
						<label>Antecedentes Neonatales:</label>
						<textarea rows="15" id="background_neonatal" name="background-neonatal" class="form-control" readonly><?php echo $patient_data_background['background_neonatal']; ?></textarea>
						<button type="button" action="edit-background" data-type="textarea" data-label="Antecedentes Neonatales:" data-control-name="background_neonatal" data-value="<?php echo $patient_data_background['background_neonatal']; ?>">Editar</button>
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
					<div class="box-element box-element-textarea background-control">
						<label>Antecedentes Gineco Obstetricos:</label>
						<textarea rows="15" id="background_gyneco_obstetric" name="background-gyneco-obstetric" class="form-control" readonly>
							<?php echo $patient_data_background['background_gyneco_obstetric']; ?>
						</textarea>
						<button type="button" action="edit-background" data-type="textarea" data-label="Antecedentes Gineco Obstetricos:" data-control-name="background_gyneco_obstetric" data-value="<?php echo $patient_data_background['background_gyneco_obstetric']; ?>">Editar</button>
					</div>
				</div>
			</div>

		</div>
	</div>






	<!--EDIT CONTROL-->
	<div class="edit-container">
		<div class="edit-wrapper">
			<div class="box edit-box">
				<div class="box-name"><span>EDITAR</span></div>
				<div class="box-content">
					<div class="box-element">
						<label class="edit-label" for="edit-control">Edit Label</label>
						<div id="edit-ajax-control">
							<input type="text" name="edit-control" class="form-control edit-control" value="">
						</div>
						<input type="hidden" name="edit-data" class="edit-hidden" value="">
					</div>

					<div class="actions">
						<button type="button" class="btn red cancel">CANCELAR</button>
						<button type="button" class="btn green save">GUARDAR</button>
					</div>
				</div>
			</div>

			<div class="box confirmation-box">
				<div class="box-name"><span>EXITO</span></div>
				<div class="box-content">
					<div class="box-element">
						<label>Informacion actualizada con exito.</label>
					</div>

					<div class="actions">
						<button type="button" class="btn blue cancel">OK</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			var edit_button_clicked = "";
			var edit_action = "";

			$("button[action*=edit]").click(function(){
				edit_label = $(this).attr('data-label');
				edit_value = $(this).attr('data-value');
				edit_type = $(this).attr('data-type');
				edit_hidden = $(this).attr('data-control-name');
				edit_action = $(this).attr('action');
				edit_button_clicked = $(this);


				$.ajax({
			  		url: "<?php echo site_url('patients/load_control_type'); ?>",
			  		type: "POST",
					data: "type=" + edit_type + "&value=" + edit_value.toString(),
			  		success: function(result){
			  			if(result) {
			  				$('#edit-ajax-control').html(result);
			  			}

			    		console.log(result);
			    		console.log("AJAX SUCCESS");
			  		},
			  		error: function (request, status, error) {
			  			console.log("---------AJAX ERROR BEGIN---------");
			  			console.log(error);
				        console.log(request.status);
				        console.log(request.responseText);
				        console.log("---------AJAX ERROR ENDS----------");
				    }
			  	});

				$('.edit-container .edit-label').html(edit_label);
				$('.edit-container .edit-control').val(edit_value);
				$('.edit-container .edit-hidden').val(edit_hidden);

				$('.edit-container').fadeIn('fast');
			});

			$('.edit-container .actions .cancel').click(function() {
				$('.edit-container').fadeOut('fast');
				$('.edit-container').removeClass('show-message');
			});

			$('.edit-container .actions .save').click(function() {
				 save_edited_data();
			});


			function save_edited_data() {
				ajax_url = "<?php echo site_url('patients/edit_specific_attribute'); ?>";

				data = {
					patient_id: <?php echo $patient_data['patient_id']; ?>,
					object_name: 'patients',
					control_name: $('.edit-container .edit-hidden').val(),
					new_value: $('.edit-container .edit-control').val()
				};

				console.log(data);

				//if is an element of background patient table
				if(edit_action == "edit-background") {
					ajax_url = "<?php echo site_url('patients/edit_specific_attribute_background'); ?>"

					data = {
						patient_id: <?php echo $patient_data['patient_id']; ?>,
						object_name: 'patient_background',
						control_name: $('.edit-container .edit-hidden').val(),
						new_value: $('.edit-container .edit-control').val()
					};
				}

				$.ajax({
			  		url: ajax_url,
			  		type: "POST",
			  		dataType: 'json',
					data: data,
			  		success: function(result){
			  			if(result) {
			  				$("#" + data.control_name).html(data.new_value);
			  				edit_button_clicked.attr('data-value', data.new_value);
			  			}

			  			$('.edit-container').addClass('show-message');

			    		console.log(result);
			    		console.log("AJAX SUCCESS");
			  		},
			  		error: function (request, status, error) {
			  			console.log("---------AJAX ERROR BEGIN---------");
			  			console.log(error);
				        console.log(request.status);
				        console.log(request.responseText);
				        console.log("---------AJAX ERROR ENDS----------");
				    }
			  	});
			}

		});
	</script>

<?php endif; ?>

<?php $this->load->view('templates/calendar'); ?>
