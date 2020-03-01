<div class="content-header">
	<h1><?php echo $agenda_data['patient_fullname']; ?></h1>

	<div class="page-actions">
		<a href="<?php echo base_url(); ?>agenda/" class="btn blue">ATRAS</a>
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
				<button type="button" action="edit" data-type="text" data-label="Hora:" data-control-name="agenda_time" data-value="<?php echo $agenda_data['agenda_time']; ?>">Editar</button>
			</div>
			<div class="box-element">
				<label>Servicio:</label>
				<?php echo $agenda_data['agenda_service']; ?>	
			</div>
			<div class="box-element">
				<label>Notas:</label>
				<span id="agenda_notes"><?php echo $agenda_data['agenda_notes']; ?></span>
				<button type="button" action="edit" data-type="text" data-label="Notas:" data-control-name="agenda_notes" data-value="<?php echo $agenda_data['agenda_notes']; ?>">Editar</button>
			</div>
			<div class="box-element">
				<label>Status:</label>
				<?php echo $agenda_data['agenda_status']; ?>	
			</div>
		</div>
	</div>

</div>





<!--EDIT CONTROL-->
<div class="edit-container">
	<div class="edit-wrapper">
		<div class="box edit-box">
			<div class="box-name"><span>EDITAR</span></div>
			<div class="box-content">
				<div class="box-element">
					<label class="edit-label" for="edit-control">Edit Label</label>
					<div id="edit-ajax-control">
						<input type="text" name="edit-control" class="form-control edit-control" value="">
					</div>
					<input type="hidden" name="edit-data" class="edit-hidden" value="">
				</div>

				<div class="actions">
					<button type="button" class="btn red cancel">CANCELAR</button>
					<button type="button" class="btn green save">GUARDAR</button>
				</div>
			</div>
		</div>

		<div class="box confirmation-box">
			<div class="box-name"><span>EXITO</span></div>
			<div class="box-content">
				<div class="box-element">
					<label>Informacion actualizada con exito.</label>
				</div>

				<div class="actions">
					<button type="button" class="btn blue cancel">OK</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var edit_button_clicked = "";
		var edit_action = "";

		$("button[action*=edit]").click(function(){
			edit_label = $(this).attr('data-label');
			edit_value = $(this).attr('data-value');
			edit_type = $(this).attr('data-type');
			edit_hidden = $(this).attr('data-control-name');
			edit_action = $(this).attr('action');
			edit_button_clicked = $(this);


			$.ajax({
		  		url: "<?php echo site_url('agenda/load_control_type'); ?>", 
		  		type: "POST",
				data: "type=" + edit_type + "&value=" + edit_value.toString(),
		  		success: function(result){
		  			if(result) {
		  				$('#edit-ajax-control').html(result);
		  			}

		    		console.log(result);
		    		console.log("AJAX SUCCESS");
		  		},
		  		error: function (request, status, error) {
		  			console.log("---------AJAX ERROR BEGIN---------");
		  			console.log(error);
			        console.log(request.status);
			        console.log(request.responseText);
			        console.log("---------AJAX ERROR ENDS----------");
			    }
		  	});

			$('.edit-container .edit-label').html(edit_label);
			$('.edit-container .edit-control').val(edit_value);
			$('.edit-container .edit-hidden').val(edit_hidden);

			$('.edit-container').fadeIn('fast'); 			  	
		});

		$('.edit-container .actions .cancel').click(function() {
			$('.edit-container').fadeOut('fast'); 
			$('.edit-container').removeClass('show-message');
		});

		$('.edit-container .actions .save').click(function() {
			 save_edited_data();
		});


		function save_edited_data() {
			ajax_url = "<?php echo site_url('agenda/edit_specific_attribute'); ?>";

			data = {
				agenda_id: <?php echo $agenda_data['agenda_id']; ?>,
				object_name: 'agenda',
				control_name: $('.edit-container .edit-hidden').val(),
				new_value: $('.edit-container .edit-control').val()
			};

			console.log(data);

			$.ajax({
		  		url: ajax_url, 
		  		type: "POST",
		  		dataType: 'json',
				data: data,
		  		success: function(result){
		  			if(result) {
		  				$("#" + data.control_name).html(data.new_value);
		  				edit_button_clicked.attr('data-value', data.new_value);
		  			}

		  			$('.edit-container').addClass('show-message'); 

		    		console.log(result);
		    		console.log("AJAX SUCCESS");
		  		},
		  		error: function (request, status, error) {
		  			console.log("---------AJAX ERROR BEGIN---------");
		  			console.log(error);
			        console.log(request.status);
			        console.log(request.responseText);
			        console.log("---------AJAX ERROR ENDS----------");
			    }
		  	});
		}
	});
</script>


