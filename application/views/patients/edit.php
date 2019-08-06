
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


	<div class="edit-container">
		<div class="edit-wrapper">
			<div class="box">
				<div class="box-name"><span>EDITAR</span></div>
				<div class="box-content">
					<div class="box-element">
						<label class="edit-label" for="edit-control">Edit Label</label>
						<input type="text" name="edit-control" class="form-control edit-control" value="">
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
			$("button[action=edit]").click(function(){
				edit_label = $(this).attr('data-label');
				edit_value = $(this).attr('data-value');
				edit_type = $(this).attr('data-type');
				edit_hidden = $(this).attr('data-control-name');

				$('.edit-container .edit-label').html(edit_label);
				$('.edit-container .edit-control').val(edit_value);
				$('.edit-container .edit-hidden').val(edit_hidden);

				$('.edit-container').fadeIn('fast'); 			  	
			});

			$('.edit-container .actions .cancel').click(function() {
				$('.edit-container').fadeOut('fast'); 
			});

			$('.edit-container .actions .save').click(function() {
				data = {
					patient_id: <?php echo $patient_data['patient_id']; ?>,
					object_name: 'patients',
					control_name: $('.edit-container .edit-hidden').val(),
					new_value: $('.edit-container .edit-control').val()
				};

				
				$.ajax({
			  		url: "<?php echo site_url('patients/edit_field'); ?>", 
			  		type: "POST",
			  		dataType: 'json',
					data: data,
			  		success: function(result){
			  			if(result) {
			  				$("#" + data.control_name).html(data.new_value);
			  			}

			  			$('.edit-container').fadeOut('fast'); 

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
			  	
			});
		});
	</script>

<?php endif; ?>
