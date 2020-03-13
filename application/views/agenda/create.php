<div class="content-header">
	<h1><?= $page_title; ?></h1>

	<div class="page-actions">
		<?php
			$back_url = site_url('agenda');
			if (isset($_SERVER['HTTP_REFERER'])) {
				$back_url = $_SERVER['HTTP_REFERER'];
			}
		?>
		<a href="<?php echo $back_url; ?>" class="btn blue">ATRAS</a>
		
		<a href="<?php echo base_url(); ?>agenda/" class="btn red">CANCELAR</a>
	</div>
</div>


<?php $errors = validation_errors(); ?>
<?php if($errors): ?>
	<div class="notifications error">
		<h6>ERROR</h6>
		<?php echo $errors; ?>
	</div>
<?php endif; ?>



<?php echo form_open('agenda/create'); ?>

	<div class="box-container agenda-create">

		<div class="box">
			<div class="box-name"><span>Informaci&oacute;n General</span></div>
			<div class="box-content">
				<div class="box-element patient-section">
					<label>Paciente:</label>
					<input type="text" name="patient-name" class="form-control search-patient-control" placeholder="Nombre / ID" readonly>

					<button type="button" class="btn blue search-patient-popup" title="Busqueda de pacientes ya existentes">BUSCAR</button>
					<button type="button" class="btn green new-patient-popup" title="Creacion rapida de paciente nuevo">NUEVO</button>

					<input type="hidden" name="patient-id" class="patient-id" value="">
				</div>
				<div class="box-element">
					<label>Establecimiento:</label>
					<?php echo get_stores_list(); //options_helper ?>
				</div>
				<div class="box-element">
					<label>Servicio:</label>
					<?php echo get_services_list(); //options_helper ?>
				</div>
				<div class="box-element date-section">
					<label>Fecha:</label>
					<input type="text" name="agenda-date" class="form-control agenda-date calendar-control" value="<?php echo date("Y-m-d"); ?>" readonly>
					<button type="button" class="btn blue show-appointements" title="Muestra las citas para la fecha seleccionada" >VER CITAS</button>
				</div>
				<div class="box-element hour-section">
					<label>Hora:</label>
					<select name="agenda-hour" class="agenda-hour form-control">
						<?php  
						$hours = 7;
						while($hours < 24) {
							$hour = $hours;
							if($hour < 10){ $hour = "0" . $hour; }
						?>
							<option value="<?php echo $hour; ?>"><?php echo $hour; ?></option>
						<?php
							$hours++;
						}
						?>
					</select>
					<span> : </span>
					<select name="agenda-minutes" class="agenda-minutes form-control">
						<?php  
						$minutes = 0;
						while($minutes < 60) {
							$minute = $minutes;
							if($minute < 10){ $minute = "0" . $minute; }
						?>
							<option value="<?php echo $minute; ?>"><?php echo $minute; ?></option>
						<?php
							$minutes += 5;
						}
						?>
					</select>
				</div>
				<div class="box-element">
					<label>Detalles:</label>
					<input type="text" name="agenda-notes" class="form-control" placeholder="Detalles">
				</div>
			</div>

			<div class="box-content">
				<div class="box-element">
					<label>Lista de citas para la fecha seleccionada:</label>
					<div class="agenda-day-list agenda-day-hours-list-container">

						<div class="agenda-item disabled">
							<label>&nbsp;</label>
						</div>

					</div>


					<script type="text/javascript">
						$(document).ready(function(){

							$('.show-appointements').click(function(){

								agenda_store = $('.agenda-create select.store-list').val();
								agenda_date = $('.agenda-create input.agenda-date').val();

								if( (agenda_date.trim() != "") && (agenda_store.trim() != "") ) {
									data = {
										date: agenda_date,
										store: agenda_store
									};

									
									$.ajax({
								  		url: "<?php echo site_url('agenda/appointments_per_day'); ?>", 
								  		type: "POST",
								  		dataType: "json",
										data: data,
								  		success: function(result){
								  			_html = "<div class='agenda-item disabled'>";
								  			_html += "<label>No hay citas para esta fecha</label>";
								  			_html += "</div>";

								  			if(result && result.length > 0) {
								  				_html = "";
								  				$.each(result, function (i, item) {   
								  					_html += "<div index='" + i + "' class='agenda-item'>";
										            _html += "<label for='" + item.agenda_time + "'>" + item.agenda_time + " <span>" + item.agenda_service + "</span></label>";
										            _html += "<div class='agenda-name'>" + item.patient_fullname + "</div>";
										            _html += "<div class='agenda-notes'>" + item.agenda_notes + "</div>";
										            _html += "</div>";         
										        });
								  			}

								  			$('.agenda-day-hours-list-container').html(_html);

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
						});
					</script>

				</div>
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

<?php $this->load->view('agenda/patients-quick-create'); ?>

<?php $this->load->view('templates/calendar'); ?>









