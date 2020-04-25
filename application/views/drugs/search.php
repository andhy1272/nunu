
<div class="drugs-search-container popup">
	<div class="popup-wrapper">
		<div class="box edit-box">
			<div class="box-name"><span>BUSCAR MEDICAMENTOS</span></div>
			<div class="box-content">

				<div class="filters">
					<div class="box-element">
						<label for="name-control">Terminos de Busqueda:</label>
						<input type="text" name="search-terms" class="form-control terms" value="">
					</div>

					<div class="actions">
						<button type="button" class="btn green search">BUSCAR</button>
					</div>

					<div class="clearfix"></div>
				</div>

				<div class="box-element results">
					<label for="name-control">Resultados / Medicamentos</label>
					<div class="results-container ">
						
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

		//ADD BUTTON, OPENS POPUP
		$('.drugs-search-popup').click(function() {
			$('.drugs-search-container').show();
			$('.drugs-search-container input.terms').focus();
		});

		//When you press enter in terms input made the search automatically
		$('.drugs-search-container input.terms').keydown(function(e){ 
		    var keyCode = (e.keyCode ? e.keyCode : e.which);   
		    if (keyCode == 13) {
		        $('.drugs-search-container button.search').trigger('click');
		    }
		});

		//Search Drugs
		$('.drugs-search-container button.search').click(function() {
			search_terms = $('.drugs-search-container input.terms').val().trim();

			if( (search_terms != "") ) {
				data = {
					terms: search_terms
				};

				$.ajax({
			  		url: "<?php echo site_url('Drug/search'); ?>", 
			  		type: "POST",
			  		dataType: "json",
					data: data,
			  		success: function(result){
			  			if(result) {
			  				tableHTML = "<table>";
			  				tableHTML += "<thead><tr><th>Medicamentos</th><th>Indicaciones</th></tr></thead>";
			  				tableHTML += "<tbody>";

			  				$.each(result, function (i, item) {  
					            tableHTML += "<tr index='" + i + "' data='" + item.drug_id + "'>";
 								tableHTML += "<td>";
 								tableHTML += "<span class='drug-categories'>" + item.drug_categories + "</span>";
 								tableHTML += "<span class='drug-name'>" + item.drug_name + " / " + item.drug_posology + "</span>";
 								tableHTML += "<span class='drug-generic'>" + item.drug_generic + "</span>";
 								tableHTML += "</td>";
 								tableHTML += "<td>";
 								tableHTML += "<span class='drug-indications'>" + item.drug_observations + "</span>";
 								tableHTML += "</td>";
					            tableHTML += "</tr>";
					        });
					        tableHTML += "</tbody></table>";


					        $('.drugs-search-container .results-container').html(tableHTML);
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
				$('.drugs-search-container input.terms').val(""); //clear blank spaces
				alert('Porfavor ingrese un termino de busqueda.');
			}
		});

        //Select results
		$('.drugs-search-container .results-container').on('click', 'tbody tr', function() {
			_current_row = $(this);

			if( _current_row.hasClass('selected') ) {
				_current_row.removeClass('selected');
			}
			else {
				_current_row.addClass('selected');
			}			
		});

		//SELECT BUTTON
		$('.drugs-search-container .actions .select').click(function() {
			_prescription_ids = $('#prescription-ids').val();
			_drug = "";

			$('.drugs-search-container .results-container tr.selected').each(function() {
				_id_aux = $(this).attr('data');
				_name_aux = $(this).find('.drug-name').html();
				_generic_aux = $(this).find('.drug-generic').html();
				_indications_aux = $(this).find('.drug-indications').html();

				_prescription_ids = _id_aux + "," + _prescription_ids;

				_drug += "<tr>";
				_drug += "<td class='name'>";
				_drug += _name_aux + "<br/><span class='generic'>" + _generic_aux + "</span>";
				_drug += "<input type='hidden' name='id-" + _id_aux + "' value='" + _id_aux + "'>";
				_drug += "<input type='hidden' name='name-" + _id_aux + "' value='" + _name_aux + "'>";
				_drug += "<input type='hidden' name='generic-" + _id_aux + "' value='" + _generic_aux + "'>";
				_drug += "</td>";

				_drug += "<td class='qty'><input type='text' class='form-control' name='cant-" + _id_aux + "' value='1'></td>";

				_drug += "<td><textarea class='form-control' name='indic-" + _id_aux + "'>" + _indications_aux + "</textarea></td>";

				_drug += "<td class='actions'>";
				_drug += "<span class='remove icon-cancel-x' data='" + _id_aux + "'>Eliminar</span>";
				_drug += "</td>";
				_drug += "</tr>";
			});

			if(_drug == "") {
				alert("No ha seleccionado ningun medicamento");
			}
			else {
				$('table.drugs-results tbody').prepend(_drug);
				$('#prescription-ids').val(_prescription_ids);

				closeDrugsPopup();
			}
		});

		//CLOSE BUTTON
		$('.drugs-search-container .actions .cancel').click(function() {
			closeDrugsPopup();
		});

		function closeDrugsPopup() {
			$('.drugs-search-container').hide();
			$('.drugs-search-container .results-container').html("");
			$('.drugs-search-container input.terms').val("");
		}

		//REMOVE X ON EACH ROW
		$(".drugs-results").on("click", "td.actions span.remove", function(){
			_id_remove = $(this).attr('data');
			_ids = $('#prescription-ids').val();
			_ids = _ids.split(",");
			_ids_aux = "";

			for (var _id in _ids) {
			  if((_ids[_id] != _id_remove) && (_ids[_id] != "")) {
			  	_ids_aux = _ids[_id] + "," + _ids_aux;
			  }
			}

			$('#prescription-ids').val(_ids_aux);

			$(this).parents('tr').remove();
		});

	});
</script>
