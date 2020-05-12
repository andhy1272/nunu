<div class="content-header">
	<h1><?= $page_title; ?></h1>

	<div class="page-actions">
		<a href="<?php echo base_url(); ?>agenda/create" class="btn green">NUEVO</a>
	</div>
</div>

<div class="tools">
	<div class="views">
		<label>Ver</label>
		<ul>
			<li>Calendario</li>
			<li>Agenda</li>
			<li>Lista</li>
		</ul>
	</div>

	<?php echo form_open('agenda', array('method' => 'get')); ?>
		<div class="filters">
			<div class="input-group">
				<label>Fecha</label>
				<ul>
					<li>
						<label>Desde:</label>
						<input type="text" name="date_from" class="form-control calendar-control" value="<?php echo date("Y-m-d"); ?>" readonly>
					</li>
					<li>
						<label>Hasta:</label>
						<input type="text" name="date_to" class="form-control calendar-control" value="<?php echo date("Y-m-d"); ?>" readonly>
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
<?php foreach($agenda_list as $agenda): ?>
	<tr>
		<td><?php echo $agenda['agenda_id']; ?></td>
		<td class="text-left">
			<?php echo $agenda['agenda_date'] . ' ' . $agenda['agenda_time']; ?>	
		</td>
		<td>
			<?php echo $agenda['patient_id_number'] . ' / ' . $agenda['patient_fullname']; ?>		
		</td>
		<td><?php echo $agenda['agenda_service']; ?></td>
		<td><?php echo $agenda['agenda_status']; ?></td>
		<td><?php echo $agenda['agenda_notes']; ?></td>
		<td>
			<a href="<?php echo site_url('agenda/view/' . $agenda['agenda_id']); ?>">Ver</a>
			<a href="<?php echo site_url('agenda/edit/' . $agenda['agenda_id']); ?>">Editar</a>
		</td>
	</tr>
<?php endforeach; ?>
</table>


<?php $this->load->view('templates/calendar'); ?>
