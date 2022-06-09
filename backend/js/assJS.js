// Fonction DataTable
$(document).ready(function () {
    $('table').DataTable();

    afficherAssurance();

    // Fonction pour afficher les assurances
    function afficherAssurance() {
    $.ajax({
        url: "action.php",
        type: "POST",
        data: {action: "viewAssurance"},
        success: function (response){
                console.log(response);
            }
    });

    }   

});

