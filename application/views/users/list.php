<div class="content-header">
	<h1><?= $page_title; ?></h1>

	<div class="page-actions">
		<a href="<?php echo base_url(); ?>users/register/" class="btn green">NUEVO</a>
	</div>
</div>


<table class="users-list grid-list">
	<tr>
		<th>ID</th>
		<th class="text-left">Nombre</th>
		<th>Alias</th>
		<th>Role</th>
		<th>Estatus</th>
		<th>&nbsp;</th>
	</tr>
<?php foreach($users_list as $user): ?>
	<tr class="user-<?php echo $user['user_id']; ?>">
		<td>
			<?php echo $user['user_id']; ?>	
		</td>
		<td class="text-left">
			<?php echo $user['user_name']; ?>	
		</td>
		<td>
			<?php echo $user['user_alias']; ?>	
		</td>
		<td>
			<?php echo $user['user_role']; ?>	
		</td>
		<td>
			<?php echo $user['user_status']; ?>	
		</td>
		<td>
			<a href="<?php echo site_url('users/view/' . $user['user_id']); ?>">Ver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="<?php echo site_url('users/edit/' . $user['user_id']); ?>">Editar</a>
		</td>
	</tr>
<?php endforeach; ?>
</table>

