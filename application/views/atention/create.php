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



<?php echo form_open('atention/create'); ?>

	<div class="box-container atention-create">

		<div class="box box-margins atention-general">
			<div class="box-name"><span>Informaci&oacute;n General</span></div>
			<div class="box-content">
				<div class="box-element patient-section">
					<label>Paciente:</label>
					<input type="text" name="patient-name" class="form-control search-patient-control" placeholder="Nombre / ID" readonly>

					<button type="button" class="btn blue search-patient-popup" title="Busqueda de pacientes ya existentes">BUSCAR PACIENTE</button>
					<button type="button" class="btn green serch-agenda-popup" title="Busqueda de Citas en la Agenda">BUSCAR CITA</button>

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


		<div class="box atention-tabs">
			<div class="box-name"><span>Tabs</span></div>
			<div class="box-content">
				
				<div class="tabs-container">
					<ul class="tab-tiles">
						<li data-index="tab-1">Examen F&iacute;sico</li>
						<li data-index="tab-2">Diagnostico</li>
						<li data-index="tab-3">Prescripcion</li>
						<li data-index="tab-4">Examenes</li>
						<li data-index="tab-5">Imagenes</li>
						<li data-index="tab-6">Procedimientos</li>
					</ul>

					<div class="tab-contents">
						<div data-index="tab-1">
							<fieldset class="atention-signs-section">
								<legend>Signos Vitales</legend>
								<div class="box-element">
									<label title="Presion Arterial">P.A.(mmHg):</label>
									<input type="text" name="atention-blood-pressure" class="form-control" value="">
								</div>
								<div class="box-element">
									<label title="Frecuencia Cardiaca">F.C.(Ipm):</label>
									<input type="text" name="atention-heart-rate" class="form-control" value="">
								</div>
								<div class="box-element">
									<label title="Frecuencia Respiratoria">F.R.(rpm):</label>
									<input type="text" name="atention-breath-rate" class="form-control" value="">
								</div>
								<div class="box-element">
									<label title="Temperatura">Temperatura(°C):</label>
									<input type="text" name="atention-temperature" class="form-control" value="">
								</div>
							</fieldset>

							<fieldset class="atention-antropometric-section">
								<legend>Antropometr&iacute;a</legend>
								<div class="box-element">
									<label title="Peso">Peso(Kg):</label>
									<input type="text" name="atention-weight" class="form-control" value="">
								</div>
								<div class="box-element">
									<label title="Estatura">Estatura(cm):</label>
									<input type="text" name="atention-height" class="form-control" value="">
								</div>
								<div class="box-element">
									<label title="Indice Masa Corporal">I.M.C.:</label>
									<input type="text" name="atention-bmi" class="form-control" value="">
								</div>
								<div class="box-element">
									<label title="Perimetro Cefalico">Perimetro Cef&aacute;lico(cm):</label>
									<input type="text" name="atention-head-circunference" class="form-control" value="">
								</div>
							</fieldset>

							<fieldset class="atention-exploration-section">
								<legend>Exploraci&oacute;n</legend>
								<div class="box-element float-left">
									<label title="Piel">Piel:</label>
									<select name="atention-skin" class="form-control">
										<option value="Sin Alteraciones">Sin Alteraciones</option>
										<option value="Palidez">Palidez</option>
										<option value="Icterico">Icterico</option>
										<option value="Cianosis">Cianosis</option>
									</select>
									<br/>
									<textarea name="atention-skin-details" class="form-control" placeholder="Observaciones Piel"></textarea>
								</div>

								<div class="box-element float-right">
									<label title="Conciencia">Conciencia:</label>
									<select name="atention-conscience" class="form-control">
										<option value="Orientado">Orientado</option>
										<option value="Desorientado">Desorientado</option>
										<option value="Obnubilacion">Obnubilacion</option>
										<option value="Somnolencia">Somnolencia</option>
										<option value="Estupor">Estupor</option>
										<option value="Coma">Coma</option>
									</select>
								</div>
								
								<div class="box-element float-right">
									<label title="Marcha">Marcha:</label>
									<textarea name="atention-walk" class="form-control" placeholder="(Normal/Alteracion)"></textarea>
								</div>
								<div class="box-element float-left">
									<label title="Biotipo">Biotipo:</label>
									<textarea name="atention-biotype" class="form-control" placeholder="(Normal/Atletico/Picnico)"></textarea>
								</div>
								<div class="box-element float-right">
									<label title="Neurologico">Neurologico:</label>
									<textarea name="atention-neurologic" class="form-control"></textarea>
								</div>
								<div class="box-element float-left">
									<label title="Cabeza">Cabeza:</label>
									<textarea name="atention-head" class="form-control"></textarea>
								</div>
								<div class="box-element float-right">
									<label title="ORL">ORL:</label>
									<textarea name="atention-orl" class="form-control"></textarea>
								</div>
								<div class="box-element float-left">
									<label title="Cuello">Cuello:</label>
									<textarea name="atention-neck" class="form-control"></textarea>
								</div>
								<div class="box-element float-right">
									<label title="Torax">Torax:</label>
									<textarea name="atention-chest" class="form-control"></textarea>
								</div>
								<div class="box-element float-left">
									<label title="Abdomen">Abdomen:</label>
									<textarea name="atention-abdomen" class="form-control"></textarea>
								</div>
								<div class="box-element float-right">
									<label title="Genito-Urinario">Genito-Urinario:</label>
									<textarea name="atention-genitourinary" class="form-control"></textarea>
								</div>
								<div class="box-element float-left">
									<label title="Columna Vertebral">Columna Vertebral:</label>
									<textarea name="atention-spine" class="form-control"></textarea>
								</div>
								<div class="box-element float-right">
									<label title="Miembros Superiores Inferiores">Miembros Sup/Inf:</label>
									<textarea name="atention-limbs" class="form-control"></textarea>
								</div>
							</fieldset>

							<fieldset>
								<div class="box-element">
									<label title="Observaciones">Observaciones:</label>
									<textarea name="atention-observations" class="form-control"></textarea>
								</div>
							</fieldset>
						</div>

						<div data-index="tab-2">
							Something 02
						</div>

						<div data-index="tab-3">
							Something 03
						</div>

						<div data-index="tab-4">
							Something 04
						</div>

						<div data-index="tab-5">
							Something 05
						</div>

						<div data-index="tab-6">
							Something 06
						</div>
					</div>
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

<?php $this->load->view('templates/calendar'); ?>









