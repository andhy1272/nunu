
<div class="agenda-search-container popup">
	<div class="popup-wrapper">
		<div class="box edit-box">
			<div class="box-name"><span>BUSCAR CONSULTAS</span></div>
			<div class="box-content">

				<div class="filters">
					<div class="box-element">
						<label for="name-control">Fecha:</label>
						<input type="text" name="search-date" class="form-control search-date calendar-control" value="<?php echo date("Y-m-d"); ?>" readonly>
					</div>

					<div class="actions">
						<button type="button" class="btn green search">BUSCAR</button>
					</div>

					<div class="clearfix"></div>
				</div>

				<div class="box-element results">
					<label for="name-control">Consultas Programadas</label>
					<div class="results-container results-container-agenda">
        		<!-- RESULTS -->
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

		//OPENS POPUP
		$('.agenda-search-popup').click(function() {
			$('.agenda-search-container').show();
			$('.agenda-search-container button.search').trigger('click');
		});

		//Search Agenda
		$('.agenda-search-container button.search').click(function() {
			//clear the search results container
			$('.agenda-search-container .results-container-agenda').html("");

			search_date = $('.agenda-search-container input.search-date').val().trim();

			if( (search_date != "") ) {
				data = {
					date: search_date
				};

				$.ajax({
			  		url: "<?php echo site_url('agenda/search'); ?>",
			  		type: "POST",
			  		dataType: "json",
					data: data,
			  		success: function(result){
			  			if(result && result.length > 0) {
			  				tableHTML = "<table><tbody>";
			  				$.each(result, function (i, item) {
					            tableHTML += "<tr index='" + i + "' data=''>";
 								tableHTML += "<td>";
 								tableHTML += "<span class='patient'>" + item.patient_fullname + " / " + item.patient_id_number + "</span>";
 								tableHTML += "<span class='service'>" + item.agenda_service + "</span>";
 								tableHTML += "<span class='time'>" + item.agenda_time + "</span>";
 								tableHTML += "</td>";
 								tableHTML += "<td>";
 								tableHTML += "<span class='notes'>" + item.agenda_notes + "</span>";
 								tableHTML += "</td>";
					            tableHTML += "</tr>";
					        });
					        tableHTML += "</tbody></table>";

					        $('.agenda-search-container .results-container-agenda').html(tableHTML);

					        jsonData = result;
			  			}
			  			else {
			  				_html = "<div class='agenda-item disabled'>";
							_html += "<label>No hay citas programadas para esta fecha</label>";
							_html += "</div>";

			  				$('.agenda-search-container .results-container-agenda').html(_html);
			  			}

			  			//alert(result);
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
				$('.agenda-search-container input.terms').val(""); //clear blank spaces
				alert('Porfavor ingrese una fecha de busqueda.');
			}
		});


		$('.agenda-search-container input.calendar-control').on('click', function() {
			$('.agenda-search-container .results-container-agenda').html("");
		});


    //Choose results
		$('.agenda-search-container .results-container-agenda').on('click', 'tbody tr', function() {
			_current_row = $(this);

			$('.agenda-search-container .results-container-agenda tbody tr').removeClass('selected');

			_current_row.addClass('selected');
		});

		//SELECT BUTTON
		$('.agenda-search-container .actions .select').click(function() {
			_appointment = $('.agenda-results').val();

			$('.agenda-search-container .results-container-agenda tr.selected').each(function() {
				_appointment += "\n" + $(this).attr('data');
			});

			$('.agenda-results').val(_appointment);

			closeAgendaPopup();
		});

		//CLOSE BUTTON
		$('.agenda-search-container .actions .cancel').click(function() {
			closeAgendaPopup();
		});

		function closeAgendaPopup() {
			$('.agenda-search-container').hide();
			//$('.agenda-search-container .results-container-agenda').html("");
			//$('.agenda-search-container input.search-date').val("");
		}

	});
</script>
