
<?php if($this->session->flashdata('message_success')): ?>
	<div class="session-notifications">
		<div class="message success">
			<?php echo $this->session->flashdata('message_success'); ?>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".session-notifications").delay(3000).fadeOut();
			});
		</script>
	</div>					
<?php endif; ?>


<?php if($this->session->flashdata('message_error')): ?>
	<div class="session-notifications">
		<div class="message error">
			<?php echo $this->session->flashdata('message_error'); ?>
		</div>
	</div>					
<?php endif; ?>


<?php if($this->session->flashdata('message_notification')): ?>
	<div class="session-notifications">
		<div class="message notification">
			<?php echo $this->session->flashdata('message_notification'); ?>
		</div>
	</div>				
<?php endif; ?>