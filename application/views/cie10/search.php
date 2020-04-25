
<div class="cie10-search-container popup">
	<div class="popup-wrapper">
		<div class="box edit-box">
			<div class="box-name"><span>BUSCAR DIAGNOSTICO</span></div>
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
					<label for="name-control">Resultados / Diagnosticos</label>
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
		jsonData = "";

		//ADD BUTTON, OPENS POPUP
		$('.cie10-search-popup').click(function() {
			$('.cie10-search-container').show();
			$('.cie10-search-container input.terms').focus();
		});

		//When you press enter in terms input made the search automatically
		$('.cie10-search-container input.terms').keydown(function(e){ 
		    var keyCode = (e.keyCode ? e.keyCode : e.which);   
		    if (keyCode == 13) {
		        $('.cie10-search-container button.search').trigger('click');
		    }
		});


		//Search CIE-10
		$('.cie10-search-container button.search').click(function() {
			search_terms = $('.cie10-search-container input.terms').val().trim();

			if( (search_terms != "") ) {
				data = {
					terms: search_terms
				};

				$.ajax({
			  		url: "<?php echo site_url('Cie10/search'); ?>", 
			  		type: "POST",
			  		dataType: "json",
					data: data,
			  		success: function(result){
			  			if(result) {
			  				termIndex = 0;
			  				termsGroup = '';
			  				tableHTML = '';

			  				$.each(result, function (i, item) {  
			  					if (termsGroup != item.term) {
			  						termIndex++;
			  						termsGroup = item.term;

			  						if (termsGroup != '') {
			  							tableHTML += "</tbody></table>";
			  						}

				  					tableHTML += "<table id='term-table-" + termIndex + "'><thead><tr><th>" + termsGroup + "</th></tr></thead>";
				  					tableHTML += "<tbody>";
				  				}

			  					title = "<b>Grupo:</b> " + item.group + "<br><b>SubGrupo:</b> " + item.subgroup + "<br><b>Categoria:</b> " + item.category;

					            tableHTML += "<tr index='" + i + "' data='" + item.diagnosis + "'>";
 								tableHTML += "<td><span class='diagnosis'>" + item.diagnosis + "</span>";
 								tableHTML += "<span class='info-opener icon-info'>info</span>";
 								tableHTML += "<div class='info-content'>" + title + "</div>";
 								tableHTML += "</td>";
					            tableHTML += "</tr>";
					        });
					        tableHTML += "</tbody></table>";

					        $('.cie10-search-container .results-container').html(tableHTML);

					        jsonData = result;
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
				$('.cie10-search-container input.terms').val(""); //clear blank spaces
				alert('Porfavor ingrese un termino de busqueda.');
			}
		});

        //Select results
		$('.cie10-search-container .results-container').on('click', 'tbody tr', function() {
			_current_row = $(this);

			if( _current_row.hasClass('selected') ) {
				_current_row.removeClass('selected');
			}
			else {
				_current_row.addClass('selected');
			}			
		});

		//info link
		$('.cie10-search-container').on('click', '.info-opener', function(e) {
			e.stopPropagation();
			$(this).parent().find('.info-content').toggle('slow');
		});

		//SELECT BUTTON
		$('.cie10-search-container .actions .select').click(function() {
			_diagnosis = $('.cie10-results').val();

			$('.cie10-search-container .results-container tr.selected').each(function() {
				_diagnosis += "\n" + $(this).attr('data');
			});

			$('.cie10-results').val(_diagnosis);

			closeCie10Popup();
		});

		//CLOSE BUTTON
		$('.cie10-search-container .actions .cancel').click(function() {
			closeCie10Popup();
		});

		function closeCie10Popup() {
			$('.cie10-search-container').hide();
			$('.cie10-search-container .results-container').html("");
			$('.cie10-search-container input.terms').val("");
		}

	});
</script>
