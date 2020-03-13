<div class="content-header">
	<h1><?php echo $agenda_data['patient_fullname']; ?></h1>

	<div class="page-actions">
		<?php
			$back_url = site_url('agenda');
			if (isset($_SERVER['HTTP_REFERER'])) {
				$back_url = $_SERVER['HTTP_REFERER'];
			}
		?>
		<a href="<?php echo $back_url; ?>" class="btn blue">ATRAS</a>

		<a href="<?php echo base_url(); ?>agenda/edit/<?php echo $agenda_data['agenda_id']; ?>" class="btn green">EDITAR</a>
	</div>
</div>

<div class="box-container">
	<div class="box">
		<div class="box-name"><span>Informaci&oacute;n de la cita</span></div>
		<div class="box-content">
			<div class="box-element">
				<label>ID:</label>
				<?php echo $agenda_data['patient_id_number']; ?>	
			</div>

			<div class="box-element">
				<label>Hora:</label>
				<?php echo $agenda_data['agenda_time']; ?>	
			</div>
			<div class="box-element">
				<label>Servicio:</label>
				<?php echo $agenda_data['agenda_service']; ?>	
			</div>
			<div class="box-element">
				<label>Notas:</label>
				<?php echo $agenda_data['agenda_notes']; ?>
			</div>
			<div class="box-element">
				<label>Status:</label>
				<?php echo $agenda_data['agenda_status']; ?>	
			</div>
		</div>
	</div>

</div>



<span style="font-size: 40px;" class="icon-clip"></span>
<span style="font-size: 40px;" class="icon-heart"></span>
<span style="font-size: 40px;" class="icon-chat"></span>
<span style="font-size: 40px;" class="icon-charts"></span>
<span style="font-size: 40px;" class="icon-edit"></span>
<span style="font-size: 40px;" class="icon-home"></span>
<span style="font-size: 40px;" class="icon-settings"></span>
<span style="font-size: 40px;" class="icon-tag"></span>
<span style="font-size: 40px;" class="icon-database"></span>
<span style="font-size: 40px;" class="icon-cup-2"></span>
<span style="font-size: 40px;" class="icon-key"></span>
<span style="font-size: 40px;" class="icon-lab"></span>
<span style="font-size: 40px;" class="icon-mail"></span>
<span style="font-size: 40px;" class="icon-calc"></span>
<span style="font-size: 40px;" class="icon-agenda"></span>
<span style="font-size: 40px;" class="icon-equalizer"></span>
<span style="font-size: 40px;" class="icon-switch"></span>
<span style="font-size: 40px;" class="icon-book"></span>
<span style="font-size: 40px;" class="icon-bulb"></span>
<span style="font-size: 40px;" class="icon-search"></span>
<span style="font-size: 40px;" class="icon-phone"></span>
<span style="font-size: 40px;" class="icon-user"></span>
<span style="font-size: 40px;" class="icon-user-medic"></span>
<span style="font-size: 40px;" class="icon-stethoscope"></span>
<span style="font-size: 40px;" class="icon-arroba"></span>
<span style="font-size: 40px;" class="icon-star"></span>
<span style="font-size: 40px;" class="icon-empty-dash"></span>
<span style="font-size: 40px;" class="icon-plus"></span>
<span style="font-size: 40px;" class="icon-drop"></span>
<span style="font-size: 40px;" class="icon-clock"></span>
<span style="font-size: 40px;" class="icon-trash"></span>
<span style="font-size: 40px;" class="icon-money"></span>
<span style="font-size: 40px;" class="icon-medicine-bag"></span>
<span style="font-size: 40px;" class="icon-document"></span>
<span style="font-size: 40px;" class="icon-question"></span>
<span style="font-size: 40px;" class="icon-info"></span>
<span style="font-size: 40px;" class="icon-cloud"></span>
<span style="font-size: 40px;" class="icon-ambulance"></span>
<span style="font-size: 40px;" class="icon-minus"></span>
<span style="font-size: 40px;" class="icon-menu-vertical"></span>
<span style="font-size: 40px;" class="icon-pill"></span>
<span style="font-size: 40px;" class="icon-map-marker"></span>
<span style="font-size: 40px;" class="icon-scissors"></span>
<span style="font-size: 40px;" class="icon-picture"></span>
<span style="font-size: 40px;" class="icon-calendar"></span>
<span style="font-size: 40px;" class="icon-circle"></span>
<span style="font-size: 40px;" class="icon-circle-filled"></span>
<span style="font-size: 40px;" class="icon-folder"></span>
<span style="font-size: 40px;" class="icon-menu2"></span>
<span style="font-size: 40px;" class="icon-cancel-x"></span>
<span style="font-size: 40px;" class="icon-sort-down"></span>
<span style="font-size: 40px;" class="icon-cancel"></span>
<span style="font-size: 40px;" class="icon-palm-tree"></span>
<span style="font-size: 40px;" class="icon-flame"></span>
<span style="font-size: 40px;" class="icon-coffe-cup"></span>
<span style="font-size: 40px;" class="icon-candle"></span>
<span style="font-size: 40px;" class="icon-canyon"></span>
<span style="font-size: 40px;" class="icon-candy"></span>
<span style="font-size: 40px;" class="icon-cactus"></span>
<span style="font-size: 40px;" class="icon-cross"></span>
<span style="font-size: 40px;" class="icon-game-controller"></span>
<span style="font-size: 40px;" class="icon-flower"></span>
<span style="font-size: 40px;" class="icon-ghost"></span>
<span style="font-size: 40px;" class="icon-castle"></span>
<span style="font-size: 40px;" class="icon-leave"></span>
<span style="font-size: 40px;" class="icon-berry"></span>
<span style="font-size: 40px;" class="icon-rocket"></span>
<span style="font-size: 40px;" class="icon-snowflake"></span>
<span style="font-size: 40px;" class="icon-submarine"></span>
<span style="font-size: 40px;" class="icon-car"></span>
<span style="font-size: 40px;" class="icon-tulip"></span>
<span style="font-size: 40px;" class="icon-game"></span>
<span style="font-size: 40px;" class="icon-moon"></span>
<span style="font-size: 40px;" class="icon-circle-star"></span>
<span style="font-size: 40px;" class="icon-aid"></span>
<span style="font-size: 40px;" class="icon-guitar"></span>
<span style="font-size: 40px;" class="icon-box"></span>
<span style="font-size: 40px;" class="icon-cogs"></span>
<span style="font-size: 40px;" class="icon-bell"></span>
<span style="font-size: 40px;" class="icon-check"></span>
<span style="font-size: 40px;" class="icon-brain"></span>
<span style="font-size: 40px;" class="icon-menu-horizontal"></span>
<span style="font-size: 40px;" class="icon-kidney"></span>
<span style="font-size: 40px;" class="icon-liver"></span>
<span style="font-size: 40px;" class="icon-world"></span>
<span style="font-size: 40px;" class="icon-lungs"></span>
<span style="font-size: 40px;" class="icon-atom"></span>
<span style="font-size: 40px;" class="icon-stomach"></span>


