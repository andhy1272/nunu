
<div class="quicksearch-container popup">
	<div class="popup-wrapper">
		<div class="box edit-box">
			<div class="box-name"><span>BUSCAR PACIENTE</span></div>
			<div class="box-content">

				<div class="filters">
					<div class="box-element">
						<label for="id-control">ID:</label>
						<input type="text" name="id-control" class="form-control id" value="">
					</div>

					<div class="box-element">
						<label for="name-control">Nombre o Apellido:</label>
						<input type="text" name="name-control" class="form-control name" value="">
					</div>

					<div class="actions">
						<button type="button" class="btn green search">BUSCAR</button>
					</div>

					<div class="clearfix"></div>
				</div>

				<div class="box-element results">
					<label for="name-control">Resultados</label>
					<div class="results-container">
						
					</div>
				</div>

				<div class="actions">
					<button type="button" class="btn red cancel">CANCELAR</button>
					<button type="button" class="btn blue select">SELECCIONAR</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		jsonData = "";

		$('.search-patient-popup').click(function() {
			$('.quicksearch-container').show();
		});


		/*Loads Patient list*/
		$('.quicksearch-container button.search').click(function() {
			patient_id = $('.quicksearch-container input.id').val();
			patient_name = $('.quicksearch-container input.name').val();

			if( (patient_id.trim() != "") || (patient_name.trim() != "") ) {
				data = {
					id: patient_id,
					name: patient_name
				};

				$.ajax({
			  		url: "<?php echo site_url('patients/quick_search'); ?>", 
			  		type: "POST",
			  		dataType: "json",
					data: data,
			  		success: function(result){
			  			if(result) {
			  				tableHTML = "<table>";
			  				tableHTML += "<thead><tr><th></th><th>ID</th><th>Nombre</th></tr></thead>" 
			  				tableHTML += "<tbody>";
			  				$.each(result, function (i, item) {   
					            tableHTML += "<tr index='" + i + "'>";
					            tableHTML += "<td class='check'></td>";
					            tableHTML += "<td>" + item.patient_id_number + "</td>"; 
					            tableHTML += "<td>" + item.patient_name + " " + item.patient_last_name + "</td>"; 
					            tableHTML += "</tr>";            
					        });
					        tableHTML += "</tbody></table>" 
					        $('.results-container').html(tableHTML);

					        jsonData = result;
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
			}
			else {
				alert('Porfavor ingrese un ID o un Nombre.');
			}
		});


		$('.results-container').on('click', 'tbody tr', function() {
			_current_row = $(this);

			$('.results-container tbody tr').removeClass('selected');

			_current_row.addClass('selected');
		});


		$('.actions .select').click(function() {
			index = $('.results-container tbody tr.selected').attr('index');

			patient_name = jsonData[index]['patient_id_number'] + " / " + jsonData[index]['patient_name'] + " " + jsonData[index]['patient_last_name'];

			$('.search-patient-control').val(patient_name);
			$('.patient-id').val(jsonData[index]['patient_id']);

			$('.quicksearch-container').hide();
		});


		$('.actions .cancel').click(function() {
			$('.quicksearch-container').hide();
		});

	});
</script>
