$(function () {
    $('#comTab').DataTable();


    //Créer une commande
    $('#create').on('click', function (e) {
        let formOrder = $('#formOrder')
        if (formOrder[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: 'process.php',
                type: 'post',
                data: formOrder.serialize() + '&action=create',
                success: function (response) {
                    // console.log(response);
                        Swal.fire({
                            icon: 'success',
                            title: 'Commande enregistré avec succés',
                        });
                    
                        formOrder[0].reset(); 
                        $('#createModal').modal('hide');
                        $('#comTab').DataTable();
                        window.location.reload(true);
                        

                },

            });
        }
    })

    //Recupérer les commandes
    getCommande();

    function getCommande() {
        $.ajax({
            url: 'process.php',
            type: 'post',
            data: {
                action: 'fetch'
            },
            success: function (response) {
                $('#orderTable').html(response);
                $('#comTab').DataTable();

            },
        });
    }


})