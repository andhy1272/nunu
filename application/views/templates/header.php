<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?= $page_title; ?></title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,700" rel="stylesheet">

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/default.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pediatric.css" type="text/css" />
	</head>

	<body>
		<div class="page-wrapper">

			<div class="header">
				<div class="logo-moto">
					<img class="logo" src="<?php echo base_url(); ?>assets/images/logo.png" alt="NuNu" />
					<p class="owner-name">Nataly Barreto C</p>
				</div>
				
				<div class="system-name">NuNu v1.0</div>
			</div>

			<div class="main">

				<?php $this->load->view('templates/sidebar'); ?>

				<div class="content">
					<?php if($this->session->flashdata('user_registered')): ?>
						<div class="notifications">
							<?php echo $this->session->flashdata('user_registered'); ?>
						</div>
					<?php endif; ?>





