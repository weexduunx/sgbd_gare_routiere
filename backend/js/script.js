
// Obtenir la ligne des utilisateurs
function getplayerrow(player) {
  var playerRow = "";
  if (player) {
    const userphoto = player.photo ? player.photo : "default.png";
    playerRow = `<tr>
          <td class="align-middle"><img src="uploads/${userphoto}" class="img-thumbnail rounded float-left"></td>
          <td class="align-middle">${player.prenom}</td>
          <td class="align-middle">${player.nom}</td>
          <td class="align-middle">${player.email}</td>
          <td class="align-middle">${player.tel}</td>
          <td class="align-middle">${player.numpermis}</td>
          <td class="align-middle">${player.cin}</td>
          <td class="align-middle">${player.adresse}</td>
          <td class="align-middle">
            <a href="#" class="btn btn-success mr-3 profile" data-toggle="modal" data-target="#userViewModal"
              title="Profile" data-id="${player.id}"><i class="fa fa-address-card-o" aria-hidden="true"></i></a>
            <a href="#" class="btn btn-warning mr-3 edituser" data-toggle="modal" data-target="#userModal"
              title="Edit" data-id="${player.id}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
            <a href="#" class="btn btn-danger deleteuser" data-userid="14" title="delete" data-id="${player.id}"><i
                class="fa fa-trash-o fa-lg"></i></a>
          </td>
        </tr>`;
  }
  return playerRow;
}
// Obtenir la liste des membres
function getplayers() {
  var pageno = $(document).val();
  $.ajax({
    url: "ajax.php",
    type: "GET",
    dataType: "json",
    data: { page: pageno, action: "getusers" },
    beforeSend: function () {
      $("#overlay").fadeIn();
    },
    success: function (rows) {
      console.log(rows);
      if (rows.players) {
        var playerslist = "";

        $.each(rows.players, function (index, player) {
          playerslist += getplayerrow(player);
        });
        $("#userstable tbody").html(playerslist);
        if ( $.fn.dataTable.isDataTable( 'table' ) ) {
            table = $('table').DataTable();
        }
        else {
            table = $("table").DataTable({
                retrieve: true,
                language: {
                url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json",
              },
              dom: "Bfrtip",
    
              buttons: [
                {
                  extend: "excel",
                  text: "Exporter",
                  className: "btn btn-success",
                },
                {
                  extend: "print",
                  text: "Imprimer",
                  className: "btn btn-info",
                  customize: function (win) {
                    $(win.document.body)
                      .css("font-size", "10pt")
                      .prepend(
                        '<img src="http://localhost/sgbd_gare_routiere-1/backend/assets/images/logo-app-1.png" style="position:relative; top:0; left:0;" />'
                      );
    
                    $(win.document.body)
                      .find("table")
                      .addClass("compact")
                      .css("font-size", "inherit");
                  },
                },
                {
                  extend: "pdfHtml5",
                  className: "btn btn-danger",
                  orientation: "landscape",
                  pageSize: "A4",
                },
              ],
           
            });
        }

        $("#overlay").fadeOut();
      }
    },
    error: function () {
      console.log("Quelque chose a mal tourné");
    },
  });
}

$(document).ready(function () {
  // Ajouter / Modifier l'utilisateur
  $(document).on("submit", "#ajoutModif", function (event) {
    event.preventDefault();
    var alertmsg =
      $("#id").val().length > 0
        ? "Les informations ont été mises à jour avec succès!"
        : "Le nouveau membre ajouté avec succès!";
    $.ajax({
      url: "ajax.php",
      type: "POST",
      dataType: "json",
      data: new FormData(this),
      processData: false,
      contentType: false,
      beforeSend: function () {
        $("#overlay").fadeIn();
      },
      success: function (response) {
        console.log(response);
        if (response) {
            Swal.fire({
                icon: "success",
                title: "Succès",
                text: alertmsg,
              });
          $("#userModal").modal("hide");
          $("#ajoutModif")[0].reset();
          getplayers();
          $("#overlay").fadeOut();
        }
      },
      error: function () {
        console.log("Oops! Quelque chose a mal tourné!");
      },
    });
  });

  //Formulaire de réinitialisation sur le nouveau bouton
  $("#addnewbtn").on("click", function() {
      $("#ajoutModif")[0].reset();
      $("#id").val("");
  });

  //  obtenir un utilisateur
  $(document).on("click", "a.edituser", function () {
    var pid = $(this).data("id");

    $.ajax({
      url: "ajax.php",
      type: "GET",
      dataType: "json",
      data: { id: pid, action: "getuser" },
      beforeSend: function () {
        $("#overlay").fadeIn();
      },
      success: function (player) {
        if (player) {
          $("#prenom").val(player.prenom);
          $("#nom").val(player.nom);
          $("#email").val(player.email);
          $("#tel").val(player.tel);
          $("#numpermis").val(player.numpermis);
          $("#cin").val(player.cin);
          $("#adresse").val(player.adresse);
          $("#id").val(player.id);
        }
        $("#overlay").fadeOut();
      },
      error: function () {
        console.log("Quelque chose a mal tourné");
      },
    });
  });

  // Supprimer l'utilisateur
  $(document).on("click", "a.deleteuser", function (e) {
    e.preventDefault();
    var pid = $(this).data("id");
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger",
      },
      buttonsStyling: false,
    });

    swalWithBootstrapButtons
      .fire({
        title: "Etes-vous sûr?",
        text: "Vous voulez vraiment le supprimer!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Oui, supprimé le!",
        cancelButtonText: "No, annulé!",
        reverseButtons: true,
      })
      .then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "ajax.php",
            type: "GET",
            dataType: "json",
            data: { id: pid, action: "deleteuser" },
            beforeSend: function () {
              $("#overlay").fadeIn();
            },
            success: function (res) {
              if (res.deleted == 1) {
                swalWithBootstrapButtons.fire(
                  "Supprimé!",
                  "Le membre a été supprimé avec succés.",
                  "success"
                );
                getplayers();
                $("#overlay").fadeOut();
              }
            },
            error: function () {
              console.log("Quelque chose a mal tourné");
            },
          });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            "Annulé",
            "Le membre n'a pas été supprimé :)",
            "info"
          );
        }
      });
 
  });

  // Recevoir le profil
  $(document).on("click", "a.profile", function () {
    var pid = $(this).data("id");
    $.ajax({
      url: "ajax.php",
      type: "GET",
      dataType: "json",
      data: { id: pid, action: "getuser" },
      success: function (player) {
        if (player) {
          const userphoto = player.photo ? player.photo : "default.png";
          const profile = `<div class="row">
                <div class="col-sm-6 col-md-4">
                  <img src="uploads/${userphoto}" class="rounded responsive" />
                </div>
                <div class="col-sm-6 col-md-8">
                  <h4 class="text-primary">${player.prenom}</h4>
                  <h4 class="text-primary">${player.nom}</h4>
                  <p class="text">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i> ${player.email}
                    <br />
                    <i class="fa fa-phone" aria-hidden="true"></i> ${player.tel}
                    <br />
                    <i class="fa fa-address-book-o" aria-hidden="true"></i> ${player.adresse}
                    <br />
                    <i class="fa fa-address-card-o" aria-hidden="true"></i> ${player.cin}
                    <br />
                    <i class="fa fa-id-card" aria-hidden="true"></i> ${player.numpermis}
                  </p>
                </div>
              </div>`;
          $("#profile").html(profile);
        }
      },
      error: function () {
        console.log("Quelque chose a mal tourné");
      },
    });
  });

  // charger les utilisateurs
  getplayers();
});
