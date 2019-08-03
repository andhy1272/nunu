<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?= $page_title; ?></title>

		<!--FONTS-->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,700" rel="stylesheet">

		<!--STYLES-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/default.css" type="text/css" media="print" onload="this.media='all'">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontsize-s.css" type="text/css" media="print" onload="this.media='all'">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pediatric.css" type="text/css" media="print" onload="this.media='all'"> 

		<!--SCRIPTS-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

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





