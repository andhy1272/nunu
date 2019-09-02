
<?php if($error): ?>
	<div class="error">
		<?php echo $error; ?>
	</div>

<?php else: ?>


	<div class="content-header">
		<h1><?php echo $patient_data['patient_name'] . ' ' . $patient_data['patient_last_name']; ?></h1>

		<div class="page-actions">
			<a href="<?php echo base_url(); ?>patients/" class="btn blue">ATRAS</a>
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
					<span id="patient_sex"><?php echo $patient_data['patient_sex']; ?></span>
					<button type="button" action="edit" data-type="sex" data-label="Sexo:" data-control-name="patient_sex" data-value="<?php echo $patient_data['patient_sex']; ?>">Editar</button>
				</div>
				<div class="box-element">
					<label>Tipo Sangre:</label>
					<span id="patient_blood_type"><?php echo $patient_data['patient_blood_type']; ?></span>
					<button type="button" action="edit" data-type="blood" data-label="Tipo Sangre:" data-control-name="patient_blood_type" data-value="<?php echo $patient_data['patient_blood_type']; ?>">Editar</button>
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
					<span id="patient_phone1"><?php echo $patient_data['patient_phone1']; ?></span>
					<button type="button" action="edit" data-type="text" data-label="Celular:" data-control-name="patient_phone1" data-value="<?php echo $patient_data['patient_phone1']; ?>">Editar</button>
				</div>
				<div class="box-element">
					<label>Tel&eacute;fono:</label>
					<span id="patient_phone2"><?php echo $patient_data['patient_phone2']; ?></span>
					<button type="button" action="edit" data-type="text" data-label="Tel&eacute;fono:" data-control-name="patient_phone2" data-value="<?php echo $patient_data['patient_phone2']; ?>">Editar</button>
				</div>
				<div class="box-element">
					<label>Email:</label>
					<?php echo $patient_data['patient_email']; ?>	
				</div>
				<div class="box-element">
					<label>Direcci&oacute;n:</label> <br/>
					<span id="patient_address"><?php echo $patient_data['patient_address']; ?></span>
					<button type="button" action="edit" data-type="textarea" data-label="Direcci&oacute;n:" data-control-name="patient_address" data-value="<?php echo $patient_data['patient_address']; ?>">Editar</button>
				</div>
			</div>
		</div>

		<div class="box box-3">
			<div class="box-name"><span>Info Adicional</span></div>
			<div class="box-content">
				<div class="box-element">
					<label>Detalles:</label> <br/>
					<span id="patient_observations"><?php echo $patient_data['patient_observations']; ?></span>
					<button type="button" action="edit" data-type="textarea" data-label="Detalles:" data-control-name="patient_observations" data-value="<?php echo $patient_data['patient_observations']; ?>">Editar</button>
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

			$("button[action=edit]").click(function(){
				edit_label = $(this).attr('data-label');
				edit_value = $(this).attr('data-value');
				edit_type = $(this).attr('data-type');
				edit_hidden = $(this).attr('data-control-name');
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
				data = {
					patient_id: <?php echo $patient_data['patient_id']; ?>,
					object_name: 'patients',
					control_name: $('.edit-container .edit-hidden').val(),
					new_value: $('.edit-container .edit-control').val()
				};

				$.ajax({
			  		url: "<?php echo site_url('patients/edit_specific_attribute'); ?>", 
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
