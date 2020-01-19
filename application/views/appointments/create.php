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

	<div class="box-container appointment-create">

		<div class="box">
			<div class="box-name"><span>Informaci&oacute;n General</span></div>
			<div class="box-content">
				<div class="box-element patient-section">
					<label>Paciente:</label>
					<input type="text" name="patient-name" class="form-control search-patient-control" placeholder="Nombre / ID" readonly>

					<button type="button" class="btn blue search-patient-popup">BUSCAR</button>
					<button type="button" class="btn green new-patient-popup">NUEVO</button>

					<input type="hidden" name="patient-id" class="patient-id" value="">
				</div>
				<div class="box-element">
					<label>Medico:</label>
					<select name="appointment-medic" class="form-control">
						<option value="Medico01">Medico 01</option>
						<option value="Medico01">Medico 02</option>
						<option value="Medico01">Medico 03</option>
					</select>
				</div>
				<div class="box-element">
					<label>Sucursal:</label>
					<select name="appointment-store" class="form-control">
						<option value="Clinica01">Clinica 01</option>
						<option value="Clinica02">Clinica 02</option>

					</select>
				</div>
				<div class="box-element">
					<label>Servicio:</label>
					<select name="appointment-service" class="form-control">
						<option value="servicio02">Procedimiento</option>
						<option value="servicio01">Consulta General</option>
						<option value="servicio01">Consulta Pediatrica</option>
					</select>
				</div>
				<div class="box-element">
					<label>Fecha:</label>
					<input type="text" name="appointment-date" class="form-control calendar-control" placeholder="2000-01-01" readonly>
				</div>
				<div class="box-element hour-section">
					<label>Hora:</label>
					<input type="text" name="appointment-hour" class="form-control hour-control" placeholder="00:00" readonly>
					<button class="btn blue show-day-hours">VER HORAS</button>
				</div>
				<div class="box-element">
					<label>Detalles:</label>
					<input type="text" name="appointment-notes" class="form-control" placeholder="Detalles">
				</div>
			</div>

			<div class="box-content">
				<div class="box-element">
					<label>Lista de Citas:</label>
					<div class="appointment-day-list">
						<div class="appointment-item disabled">
							<input type="radio" name="hour" id="08:00" value="08:00">
							<label for="08:00">08:00</label>
							<div class="appointment-name">Andrey Picado Fernadez</div>
						</div>
						<div class="appointment-item">
							<input type="radio" name="hour" id="09:00" value="09:00">
							<label for="09:00">09:00</label>
						</div>
						<div class="appointment-item">
							<input type="radio" name="hour" id="10:00" value="10:00">
							<label for="10:00">10:00</label>
						</div>
						<div class="appointment-item">
							<input type="radio" name="hour" id="11:00" value="11:00">
							<label for="11:00">11:00</label>
						</div>
						<div class="appointment-item">
							<input type="radio" name="hour" id="12:00" value="12:00">
							<label for="12:00">12:00</label>
						</div>
						<div class="appointment-item">
							<input type="radio" name="hour" id="13:00" value="13:00">
							<label for="13:00">13:00</label>
						</div>
						<div class="appointment-item disabled">
							<input type="radio" name="hour" id="14:00" value="14:00">
							<label for="14:00">14:00</label>
							<div class="appointment-name">Nataly Barreto Cardenas</div>
						</div>
						<div class="appointment-item">
							<input type="radio" name="hour" id="15:00" value="15:00">
							<label for="15:00">15:00</label>
						</div>
						<div class="appointment-item">
							<input type="radio" name="hour" id="16:00" value="16:00">
							<label for="16:00">16:00</label>
						</div>
						<div class="appointment-item">
							<input type="radio" name="hour" id="17:00" value="17:00">
							<label for="17:00">17:00</label>
						</div>
					</div>

					<script type="text/javascript">
						$(document).ready(function(){

							$('.appointment-day-list .appointment-item:not(.disabled)').click(function(){
								hour = $(this).find('input').val();

								console.log(hour);
								$('.hour-control').val(hour);
							});

							$('.appointment-day-list .appointment-item.disabled').click(function(e){
								e.preventDefault();
								alert('La hora seleccionada no esta disponible');
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

<?php $this->load->view('appointments/patients-quick-create'); ?>

<?php $this->load->view('templates/calendar'); ?>









