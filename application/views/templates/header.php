<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

	<?php $this->load->view('templates/head'); ?>

	<body>
		<div class="page-wrapper">

			<div class="header">
				<div class="logo-moto">
					<img class="logo" src="<?php echo base_url(); ?>assets/images/logo.png" alt="NuNu" />
					<p class="owner-name">Nataly Barreto C</p>
				</div>
				
				<div class="system-name icon-cogs">
					NuNu v1.0 / <?php echo $this->session->userdata('user_alias'); ?>
				</div>
			</div>

			<div class="main">

				<?php $this->load->view('templates/sidebar'); ?>

				<div class="content">

					<?php $this->load->view('templates/session-notifications'); ?>
					
					
					




