

$(document).ready(function(){
	fetch();
	//add
	$('#addnew').click(function(){
		$('#add').modal('show');
	});
	$('#addForm').submit(function(e){
		e.preventDefault();
		var addform = $(this).serialize();
		console.log(addform);
		$.ajax({
			method: 'POST',
			url: 'assCrud/add.php',
			data: addform,
			dataType: 'json',
			success: function(response){
				$('#add').modal('hide');
				if(response.error){
					Swal.fire({
						title: 'Erreur!',
						text: response.message,
						icon: 'error',
						confirmButtonText: 'Cool'
					  })
				}
				else{
					$('#add').hide();
                    $("#addForm")[0].reset();
					Swal.fire({
						title: 'Succés!',
						text: response.message,
						icon: 'success',
						confirmButtonText: 'Cool'
					  })

					fetch();
				}
			}
		});


	});
	//

	//edit
	$(document).on('click', '.edit', function(){
		var id = $(this).data('id');
		getDetails(id);
		$('#edit').modal('show');
	});
	$('#editForm').submit(function(e){
		e.preventDefault();
		var editform = $(this).serialize();
		$.ajax({
			method: 'POST',
			url: 'assCrud/edit.php',
			data: editform,
			dataType: 'json',
			success: function(response){
				if(response.error){
					Swal.fire({
						title: 'Erreur!',
						text: response.message,
						icon: 'error',
						confirmButtonText: 'Cool'
					  })
				}
				else{
					Swal.fire({
						title: 'Succés!',
						text: response.message,
						icon: 'success',
						confirmButtonText: 'Cool'
					  })
					fetch();
				}

				$('#edit').modal('hide');
			}
		});
	});
	//

	//delete
	$(document).on('click', '.delete', function(){
		var id = $(this).data('id');
		getDetails(id);
		$('#delete').modal('show');
	});

	$('.id').click(function(){
		var id = $(this).val();
		$.ajax({
			method: 'POST', 
			url: 'assCrud/delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(response.error){
					Swal.fire({
						title: 'Erreur!',
						text: response.message,
						icon: 'error',
						confirmButtonText: 'Cool'
					  })
				}
				else{
					Swal.fire({
						title: 'Succés!',
						text: response.message,
						icon: 'success',
						confirmButtonText: 'Cool'
					  })
					fetch();
				}
				
				$('#delete').modal('hide');
			}
		});
	});
	//

	//hide message
	// $(document).on('click', '.close', function(){
	// 	$('#alert').hide();
	// });

});

	

function fetch(){
	
	$.ajax({
		method: 'POST',
		url: 'assCrud/fetch.php',
		success: function(response){
			$('#tbody').html(response);
			$('#tableId').ready(function () {
				var table = $('#tableId').DataTable( {
					language: { url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json" }
				} );
				
				new $.fn.dataTable.Buttons( table, {
					buttons: [ 
						{
							extend: 'excel',
							text: 'Exporter',
							className: 'btn btn-success',
									
						},
						{
							extend : 'print',
							text: 'Imprimer',
							className: 'btn btn-info',
						},
						{
							extend: 'pdfHtml5',
							className: 'btn btn-danger',
							orientation: 'landscape',
							pageSize: 'A4'
						}	
				 	],
				} );

				table.buttons().container()
				.appendTo( $('#bouton', table.table().container() ) );

			 
            });
		},
	});

}
function getDetails(id){
	$.ajax({
		method: 'POST',
		url: 'assCrud/fetch_row.php',
		data: {id:id},
		dataType: 'json',
		success: function(response){
			if(response.error){
				$('#edit').modal('hide');
				$('#delete').modal('hide');
				$('#alert').show();
				$('#alert_message').html(response.message);
			}
			else{
				$('.id').val(response.data.id_assurance);
				$('.membre').val(response.data.prenom + ' '+ response.data.nom);
				$('.categorie').val(response.data.categorie);
				$('.matricule').val(response.data.matricule);
				$('.marque').val(response.data.marque);
				$('.type').val(response.data.type_assurance);
				$('.montant').val(response.data.montant_assurance);

				$('.fullname').html(response.data.prenom + ' ' + response.data.nom);
			}
		}
	});
}