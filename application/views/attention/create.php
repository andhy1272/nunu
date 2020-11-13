<div class="content-header">
	<h1><?= $page_title; ?></h1>
</div>


<?php $errors = validation_errors(); ?>
<?php if($errors): ?>
	<div class="notifications error">
		<h6>ERROR</h6>
		<?php echo $errors; ?>
	</div>
<?php endif; ?>


<div class="atention atention-create">

<?php echo form_open('attention/create'); ?>

	<div class="box-container">

		<div class="box atention-general">
			<div class="box-name"><span>Informaci&oacute;n General</span></div>
			<div class="box-content">
				<div class="box-element patient-section">
					<label>Paciente:</label>
					<input type="text" name="patient-name" class="form-control search-patient-control" placeholder="Nombre / ID" readonly>
					<input type="hidden" name="patient-id" class="patient-id" value="">

					<button type="button" class="btn blue search-patient-popup" title="Busqueda de pacientes ya existentes">BUSCAR PACIENTE</button>
					<button type="button" class="btn green agenda-search-popup" title="Busqueda de Citas en la Agenda">BUSCAR CITA</button>
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
					<input type="text" name="agenda-date" class="form-control agenda-date calendar-control" value="<?php echo date("Y-m-d"); ?>" title="Calendario" readonly>
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
		</div>
	</div>

	<div class="actions page-actions">
		<a href="<?php echo base_url(); ?>" class="btn red">CANCELAR</a>
		<button type="submit" class="btn green">CREAR ATENCION</button>
	</div>

<?php echo form_close(); ?>
</div>




<?php $this->load->view('quicksearch/patients-search'); ?>

<?php $this->load->view('templates/calendar'); ?>

<?php $this->load->view('agenda/search'); ?>
