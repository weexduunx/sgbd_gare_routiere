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
                    $("#addAssuranceModal").modal('hide');
                    $("#ajoutAssurance")[0].reset();
  
                }
            });
        }
    });

});

