<h1><?= $title; ?></h1>

<?php $errors = validation_errors(); ?>
<?php if($errors): ?>
	<div class="notifications error">
		<h6>ERROR</h6>
		<?php echo $errors; ?>
	</div>
<?php endif; ?>


<?php echo form_open('users/register'); ?>

	<div class="box-container">

		<div class="box box-3">
			<div class="box-name"><span>Informaci&oacute;n General</span></div>
			<div class="box-content">
				<div class="box-element">
					<label>Identificaci&oacute;n:</label>
					<select name="patient.id.type">
						<option value="id">Cedula</option>
						<option value="passport">Pasaporte</option>
					</select>
					<input type="text" name="patient.id.number" class="form-control" placeholder="ID Número">
				</div>
				<div class="box-element">
					<label>Nombre:</label>
					<input type="text" name="patient.name" class="form-control" placeholder="Nombre">
				</div>
				<div class="box-element">
					<label>Apellidos:</label>
					<input type="text" name="patient.last.name" class="form-control" placeholder="Apellidos">
				</div>
				<div class="box-element">
					<label>Fecha Nacimiento:</label>
					<input type="text" name="patient.birthdate" class="form-control" placeholder="2000-31-12">
				</div>
				<div class="box-element">
					<label>Sexo:</label>
					<select name="patient.sex">
						<option value="No Definido">No Definido</option>
						<option value="masculino">Masculino</option>
						<option value="Femenino">Femenino</option>
					</select>
				</div>
				<div class="box-element">
					<label>Tipo Sangre:</label>
					<select name="patient.sex">
						<option value="Otro">Otro</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="A-">A-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
					</select>	
				</div>
			</div>
		</div>

		<div class="box box-3">
			<div class="box-name"><span>Informaci&oacute;n de Contacto</span></div>
			<div class="box-content">
				<div class="box-element">
					<label>Celular:</label>
					<input type="text" name="patient.phone1" class="form-control" placeholder="+(000) 111 2233">
				</div>
				<div class="box-element">
					<label>Tel&eacute;fono:</label>
					<input type="text" name="patient.phone2" class="form-control" placeholder="+(000) 111 2233">	
				</div>
				<div class="box-element">
					<label>E-mail:</label>
					<input type="text" name="patient.email" class="form-control" placeholder="nunu.support@gmail.com">	
				</div>
				<div class="box-element">
					<label>Direcci&oacute;n:</label> <br/>
					<textarea rows="4" name="patient.address" class="form-control" placeholder="Direcci&oacute;n"></textarea>	
				</div>
			</div>
		</div>

		<div class="box box-3">
			<div class="box-name"><span>Informaci&oacute;n Adicional</span></div>
			<div class="box-content">
				<div class="box-element">
					<label>Observaciones:</label> <br/>
					<textarea rows="10" name="patient.observations" class="form-control" placeholder="Observaciones"></textarea>
				</div>
			</div>
		</div>

	</div>


	<div class="box box-historial">
		<div class="box-name"><span>ANTECEDENTES</span></div>
		<div class="box-content">

			<div class="accordion accordion-horizontal">
				<div class="accordion-tab tab-title" data-index="tab-1">
					<span>Heredo Familiares</span>
				</div>
				<div class="accordion-tab tab-content tab-1">
					<div class="box-element">
						<label>Diabetes:</label> <br/>
						<textarea rows="2" name="patient.record.diabetes" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Hipertension:</label> <br/>
						<textarea rows="2" name="patient.record.hipertension" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Cardiopatia:</label> <br/>
						<textarea rows="2" name="patient.record.cardiopatia" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Hepatopatia:</label> <br/>
						<textarea rows="2" name="patient.record.hepatopatia" class="form-control"></textarea>
					</div>
				</div>

				<div class="accordion-tab tab-title" data-index="tab-2">
					<span>Personales Patologicos</span>
				</div>
				<div class="accordion-tab tab-content tab-2">
					<div class="box-element">
						<label>Diabetes:</label> <br/>
						<textarea rows="2" name="patient.record.diabetes" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Hipertension:</label> <br/>
						<textarea rows="2" name="patient.record.hipertension" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Cardiopatia:</label> <br/>
						<textarea rows="2" name="patient.record.cardiopatia" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Hepatopatia:</label> <br/>
						<textarea rows="2" name="patient.record.hepatopatia" class="form-control"></textarea>
					</div>
				</div>

				<div class="accordion-tab tab-title" data-index="tab-3">
					<span>Personales No Patologicos</span>
				</div>
				<div class="accordion-tab tab-content tab-3">
					<div class="box-element">
						<label>Diabetes:</label> <br/>
						<textarea rows="2" name="patient.record.diabetes" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Hipertension:</label> <br/>
						<textarea rows="2" name="patient.record.hipertension" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Cardiopatia:</label> <br/>
						<textarea rows="2" name="patient.record.cardiopatia" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Hepatopatia:</label> <br/>
						<textarea rows="2" name="patient.record.hepatopatia" class="form-control"></textarea>
					</div>
				</div>

				<div class="accordion-tab tab-title" data-index="tab-4">
					<span>Neonatales</span>
				</div>
				<div class="accordion-tab tab-content tab-4">
					<div class="box-element">
						<label>Diabetes:</label> <br/>
						<textarea rows="2" name="patient.record.diabetes" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Hipertension:</label> <br/>
						<textarea rows="2" name="patient.record.hipertension" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Cardiopatia:</label> <br/>
						<textarea rows="2" name="patient.record.cardiopatia" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Hepatopatia:</label> <br/>
						<textarea rows="2" name="patient.record.hepatopatia" class="form-control"></textarea>
					</div>
				</div>

				<div class="accordion-tab tab-title" data-index="tab-5">
					<span>Gineco Obstetricos</span>
				</div>
				<div class="accordion-tab tab-content tab-5">
					<div class="box-element">
						<label>Diabetes:</label> <br/>
						<textarea rows="2" name="patient.record.diabetes" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Hipertension:</label> <br/>
						<textarea rows="2" name="patient.record.hipertension" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Cardiopatia:</label> <br/>
						<textarea rows="2" name="patient.record.cardiopatia" class="form-control"></textarea>
					</div>
					<div class="box-element">
						<label>Hepatopatia:</label> <br/>
						<textarea rows="2" name="patient.record.hepatopatia" class="form-control"></textarea>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="actions">
		<button type="submit" class="btn blue">Registrar</button>
	</div>
<?php echo form_close(); ?>

