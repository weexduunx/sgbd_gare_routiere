// Fonction DataTable
$(document).ready(function () {

    afficherAssurance();

    // Fonction pour afficher les assurances
    function afficherAssurance() {
        $.ajax({
            url: "action.php",
            type: "POST",
            data: {action: "viewAssurance"},
            success: function (response){
                $('#showAssurance').html(response);
                $('table').DataTable({
                    order: [0, "desc"],
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json"
                    }
                });
            }
        });
    }
    
    // Fonction pour ajouter une assurance
    $("#addAssurance").click(function (e) {
        if($("#ajoutAssurance")[0].checkValidity()){
            e.preventDefault();
            $.ajax({
                url: "action.php",
                type: "POST",
                data: $("#ajoutAssurance").serialize()+"&action=addAssurance",
                success:function(){
                    Swal.fire({
                        icon: 'success',
                        title: 'Assurance ajoutée avec succès !',
                        confirmButtonText: 'Ok',
                    })
                    afficherAssurance();
                    $('#addModal').modal('hide');
                    $("#ajoutAssurance")[0].reset();
                }
            });
        }
    });

    // Fonction pour modifier une assurance
  
    $("body").on("click", ".editBtn", function(e) {
        e.preventDefault();  
        edit_id = $(this).attr('id');
        $.ajax({
            url: "action.php",
            type: "POST",
            data: { edit_id:edit_id },
            success: function(response) {
                $('#editModal').modal('show');
                $('#editForm').html(response);
                

                    // $("#id_assurance").val(data.id_assurance);
                    // $("#membre").val(data.id_utilisateur);
                    // $("#categorie").val(data.categorie);
                    // $("#matricule").val(data.matricule);
                    // $("#marque").val(data.marque);
                    // $("#assurancetype").val(data.type_assurance);
                    // $("#montant").val(data.montant_assurance);
                    // $("#datedebut").val(data.debut_assurance);
                    // $("#datefin").val(data.fin_assurance);
                    // console.log(data);
            },
        });
    });

        // Fonction pour modifier une assurance
        // $("#modifier").click(function (e) {
        //     if($("#editForm")[0].checkValidity()){
        //         e.preventDefault();
        //         $.ajax({
        //             url: "action.php",
        //             type: "POST",
        //             data: $("#editForm").serialize()+"&action=modifier",
        //             success:function(){
        //                 Swal.fire({
        //                     icon: 'success',
        //                     title: 'Assurance modifiée avec succès !',
        //                     confirmButtonText: 'Ok',
        //                 })
        //                 afficherAssurance();
        //                 $('#editModal').modal('hide');
        //                 $("#editForm")[0].reset();
        //             }
        //         });
        //     }
        // });
});

