<div class="content-header">
	<h1><?= $page_title; ?></h1>

	<div class="page-actions">
		<a href="<?php echo base_url(); ?>appointments/" class="btn blue">ATRAS</a>
		<a href="<?php echo base_url(); ?>appointments/" class="btn red">CANCELAR</a>
	</div>
</div>


<?php $errors = validation_errors(); ?>
<?php if($errors): ?>
	<div class="notifications error">
		<h6>ERROR</h6>
		<?php echo $errors; ?>
	</div>
<?php endif; ?>



<?php echo form_open('appointments/create'); ?>

	<div class="box-container">

		<div class="box">
			<div class="box-name"><span>Informaci&oacute;n General</span></div>
			<div class="box-content">
				<div class="box-element">
					<label>Paciente:</label>
					<input type="text" name="patient-name" class="form-control search-patient-control" placeholder="Nombre / ID" readonly>

					<button type="button" class="btn blue search-patient-popup">BUSCAR</button>
					<button type="button" class="btn green new-patient-popup">NUEVO</button>

					<input type="hidden" name="patient-id" class="patient-id" value="">
				</div>
				<div class="box-element">
					<label>Medico:</label>
					<select name="patient-sex" class="form-control">
						<option value="Medico01">Medico 01</option>
						<option value="Medico01">Medico 02</option>
						<option value="Medico01">Medico 03</option>
					</select>
				</div>
				<div class="box-element">
					<label>Sucursal:</label>
					<select name="patient-blood-type" class="form-control">
						<option value="Clinica01">Clinica 01</option>
						<option value="Clinica02">Clinica 02</option>

					</select>
				</div>
				<div class="box-element">
					<label>Servicio:</label>
					<select name="patient-id-type" class="form-control">
						<option value="servicio02">Procedimiento</option>
						<option value="servicio01">Consulta General</option>
						<option value="servicio01">Consulta Pediatrica</option>
					</select>
				</div>
				<div class="box-element">
					<label>Motivo:</label>
					<input type="text" name="patient-name" class="form-control" placeholder="Motivo">
				</div>
			</div>

			<div class="box-content">
			</div>
		</div>
	</div>

	<div class="actions page-actions">
		<a href="<?php echo base_url(); ?>patients/" class="btn red">CANCELAR</a>
		<button type="reset" class="btn blue">LIMPIAR</button>
		<button type="submit" class="btn green">GUARDAR</button>
	</div>
<?php echo form_close(); ?>



<?php $this->load->view('quicksearch/patients-search'); ?>




<div class="patient-quickcreation-container popup">
	<div class="popup-wrapper">
		<div class="box edit-box">
			<div class="box-name"><span>CREACION RAPIDA DE PACIENTE</span></div>
			<div class="box-content">

				<div class="box-element half-width">
					<label>Identificaci&oacute;n:</label>
					<?php echo get_id_type_list(); ?>
				</div>

				<div class="box-element half-width">
					<label>&nbsp;</label>
					<input type="text" name="patient-id-number" class="form-control" placeholder="ID Número">
				</div>

				<div class="box-element half-width">
					<label for="name-control">Nombre:</label>
					<input type="text" name="patient-name" class="form-control" placeholder="Nombre">
				</div>

				<div class="box-element half-width">
					<label for="name-control">Apellido:</label>
					<input type="text" name="patient-last-name" class="form-control" placeholder="Apellido">
				</div>

				<div class="box-element half-width">
					<label for="name-control">Fecha de Nacimiento:</label>
					<input type="text" name="patient-birthdate" class="form-control date" placeholder="">
				</div>

				<div class="box-element half-width">
					<label for="name-control">Email:</label>
					<input type="text" name="patient-email" class="form-control" placeholder="Email">
				</div>

				<div class="box-element half-width">
					<label for="name-control">Tel&eacute;fono:</label>
					<input type="text" name="patient-phone1" class="form-control" placeholder="Telefono">
				</div>
				
				<div class="clearfix"></div>

				<div class="actions">
					<button type="button" class="btn red cancel">CANCELAR</button>
					<button type="button" class="btn green save">GUARDAR</button>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		jsonData = "";

		$('.new-patient-popup').click(function() {
			$('.patient-quickcreation-container').show();
		});


		/*Loads Patient list*/
		$('.patient-quickcreation-container button.save').click(function() {
			patient_id = $('.patient-quickcreation-container input.id').val();
			patient_name = $('.patient-quickcreation-container input.name').val();

			if( (patient_id.trim() != "") || (patient_name.trim() != "") ) {
				data = {
					id: patient_id,
					name: patient_name
				};

				$.ajax({
			  		url: "<?php echo site_url('patients/quick_search'); ?>", 
			  		type: "POST",
			  		dataType: "json",
					data: data,
			  		success: function(result){
			  			if(result) {
			  				tableHTML = "<table>";
			  				tableHTML += "<thead><tr><th></th><th>ID</th><th>Nombre</th></tr></thead>" 
			  				tableHTML += "<tbody>";
			  				$.each(result, function (i, item) {   
					            tableHTML += "<tr index='" + i + "'>";
					            tableHTML += "<td class='check'></td>";
					            tableHTML += "<td>" + item.patient_id_number + "</td>"; 
					            tableHTML += "<td>" + item.patient_name + " " + item.patient_last_name + "</td>"; 
					            tableHTML += "</tr>";            
					        });
					        tableHTML += "</tbody></table>" 
					        $('.results-container').html(tableHTML);

					        jsonData = result;
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
			}
			else {
				alert('Porfavor ingrese un ID o un Nombre.');
			}
		});

		/*
		$('.patient-quickcreation-container .actions .save').click(function() {
			index = $('.results-container tbody tr.selected').attr('index');

			patient_name = jsonData[index]['patient_id_number'] + " / " + jsonData[index]['patient_name'] + " " + jsonData[index]['patient_last_name'];

			$('.search-patient-control').val(patient_name);
			$('.patient-id').val(jsonData[index]['patient_id']);

			$('.quicksearch-container').hide();
		});
		*/

		$('.patient-quickcreation-container .actions .cancel').click(function() {
			$('.patient-quickcreation-container').hide();
		});

	});
</script>











