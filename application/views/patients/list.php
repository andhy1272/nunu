<div class="content-header">
	<h1><?= $page_title; ?></h1>

	<div class="page-actions">
		<a href="<?php echo base_url(); ?>patients/create/" class="btn green">NUEVO</a>
	</div>
</div>


<table class="patients-list grid-list">
	<tr>
		<th>&nbsp;</th>
		<th>ID</th>
		<th class="text-left">Nombre</th>
		<th>Edad</th>
		<th>&nbsp;</th>
	</tr>
<?php foreach($patients_list as $patient): ?>
	<tr class="patient-<?php echo $patient['patient_id']; ?> click-view" view-url="<?php echo site_url('patients/view/' . $patient['patient_id']); ?>">
		<td class="click-view-control">
			<?php echo $patient['patient_id']; ?>	
		</td>
		<td class="click-view-control">
			<?php echo $patient['patient_id_number']; ?>	
		</td>
		<td class="text-left click-view-control">
			<?php echo $patient['patient_name'] . ' ' . $patient['patient_last_name']; ?>	
		</td>
		<td class="click-view-control age-control">
			<span><?php echo $patient['patient_birthdate']; ?></span>
		</td>

		<td>
			<a href="<?php echo site_url('patients/view/' . $patient['patient_id']); ?>" class="view-link">
				<span>Ver</span>
			</a>
			&nbsp;&nbsp;&nbsp;
			<a href="<?php echo site_url('patients/edit/' . $patient['patient_id']); ?>" class="edit-link">
				<span>Editar</span>
			</a>
		</td>
	</tr>
<?php endforeach; ?>
</table>


<?php $this->load->view('templates/pagination'); // PAGINATION TEMPLATE (templates/pagination.php) ?>






<script type="text/javascript">

	//Changes BOD date to Age
	$('.patients-list .age-control').each(function () {
		var _DOB = $(this).find('span').html();
		
		age = getAge(_DOB); //main.js file

		$(this).find('span').html(age.years + " años, " + age.months + " mes(es), " + age.days + " día(s)");
	});
	
</script>
















