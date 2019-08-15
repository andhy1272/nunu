<h1>Citas</h1>

<div class="tools">
	<div class="views">
		<label>Ver</label>
		<ul>
			<li>Calendario</li>
			<li>Agenda</li>
			<li>Lista</li>
		</ul>
	</div>

	<?php echo form_open('appointments'); ?>
		<div class="filters">
			<div class="input-group">
				<label>Fecha</label>
				<ul>
					<li>
						<label>Desde:</label>
						<input type="text" name="date_from" class="form-control" placeholder="2000-12-31">
					</li>
					<li>
						<label>Hasta:</label>
						<input type="text" name="date_to" class="form-control" placeholder="2000-12-31">
					</li>
				</ul>
			</div>

			<label>Ordenar por:</label>
			<ul>
				<li>por:</li>
				<li>ASC / DESC</li>
			</ul>

			<div class="actions">
				<button type="submit" class="btn blue">Filtrar</button>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>

<table class="patients-list grid-list">
	<tr>
		<th>ID</th>
		<th class="text-left">Fecha / Hora</th>
		<th>Paciente</th>
		<th>Servicio</th>
		<th>Estado</th>
		<th>Notas</th>
		<th>&nbsp;</th>
	</tr>
<?php foreach($appointments_list as $appointment): ?>
	<tr>
		<td><?php echo $appointment['appointment_id']; ?></td>
		<td class="text-left">
			<?php echo $appointment['appointment_date'] . ' ' . $appointment['appointment_time']; ?>	
		</td>
		<td>
			<?php echo $appointment['patient_id_number'] . ' / ' . $appointment['patient_fullname']; ?>		
		</td>
		<td><?php echo $appointment['appointment_service']; ?></td>
		<td><?php echo $appointment['appointment_status']; ?></td>
		<td><?php echo $appointment['appointment_notes']; ?></td>
		<td>
			<a href="<?php echo site_url('appointments/view/' . $appointment['appointment_id']); ?>">Ver</a>
			<a href="<?php echo site_url('appointments/edit/' . $appointment['appointment_id']); ?>">Editar</a>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
finish......