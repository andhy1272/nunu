<h1>Pacientes</h1>

<table class="patients-list grid-list">
	<tr>
		<th>ID</th>
		<th class="text-left">Nombre</th>
		<th>Sexo</th>
		<th>Edad</th>
		<th>Tel&eacute;fono</th>
		<th>Email</th>
		<th>&nbsp;</th>
	</tr>
<?php foreach($patients_list as $patient): ?>
	<tr>
		<td><?php echo $patient['patient_id_number']; ?></td>
		<td class="text-left">
			<?php echo $patient['patient_name'] . ' ' . $patient['patient_last_name']; ?>	
		</td>
		<td><?php echo ($patient['patient_sex'] == 'M') ? 'Masculino' : 'Femenino'; ?></td>
		<td><?php //echo $patient['patient_age']; ?></td>
		<td><?php echo $patient['patient_phone1']; ?></td>
		<td><?php echo $patient['patient_email']; ?></td>
		<td>
			<a href="<?php echo site_url('patients/view/' . $patient['patient_id']); ?>">Ver</a>
			<a href="<?php echo site_url('patients/edit/' . $patient['patient_id']); ?>">Editar</a>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
finish......