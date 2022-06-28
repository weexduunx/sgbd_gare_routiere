// obtenir la pagination
function pagination(totalpages, currentpage) {
    var pagelist = "";
    if (totalpages > 1) {
        currentpage = parseInt(currentpage);
        pagelist += `<ul class="pagination justify-content-center">`;
        const prevClass = currentpage == 1 ? " disabled" : "";
        pagelist += `<li class="page-item${prevClass}"><a class="page-link" href="#" data-page="${
      currentpage - 1
    }">Précédent</a></li>`;
        for (let p = 1; p <= totalpages; p++) {
            const activeClass = currentpage == p ? " active" : "";
            pagelist += `<li class="page-item${activeClass}"><a class="page-link" href="#" data-page="${p}">${p}</a></li>`;
        }
        const nextClass = currentpage == totalpages ? " disabled" : "";
        pagelist += `<li class="page-item${nextClass}"><a class="page-link" href="#" data-page="${
      currentpage + 1
    }">Suivant</a></li>`;
        pagelist += `</ul>`;
    }

    $("#pagination").html(pagelist);
}

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
    var pageno = $("#currentpage").val();
    $.ajax({
        url: "ajax.php",
        type: "GET",
        dataType: "json",
        data: { page: pageno, action: "getusers" },
        beforeSend: function() {
            $("#overlay").fadeIn();
        },
        success: function(rows) {
            console.log(rows);
            if (rows.players) {
                var playerslist = "";
                $.each(rows.players, function(index, player) {
                    playerslist += getplayerrow(player);
                });
                $("#userstable tbody").html(playerslist);
                let totalPlayers = rows.count;
                let totalpages = Math.ceil(parseInt(totalPlayers) / 4);
                const currentpage = $("#currentpage").val();
                pagination(totalpages, currentpage);
                $("#overlay").fadeOut();
            }
        },
        error: function() {
            console.log("Quelque chose a mal tourné");
        },
    });
}

$(document).ready(function() {
    // Ajouter / Modifier l'utilisateur
    $(document).on("submit", "#ajoutModif", function(event) {
        event.preventDefault();
        var alertmsg =
            $("#id").val().length > 0 ?
            "Les informations ont été mises à jour avec succès!" :
            "Le nouveau membre ajouté avec succès!";
        $.ajax({
            url: "ajax.php",
            type: "POST",
            dataType: "json",
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function() {
                $("#overlay").fadeIn();
            },
            success: function(response) {
                console.log(response);
                if (response) {
                    $("#userModal").modal("hide");
                    $("#ajoutModif")[0].reset();
                    $(".message").html(alertmsg).fadeIn().delay(3000).fadeOut();
                    getplayers();
                    $("#overlay").fadeOut();
                }
            },
            error: function() {
                console.log("Oops! Quelque chose a mal tourné!");
            },
        });
    });
    // pagination
    $(document).on("click", "ul.pagination li a", function(e) {
        e.preventDefault();
        var $this = $(this);
        const pagenum = $this.data("page");
        $("#currentpage").val(pagenum);
        getplayers();
        $this.parent().siblings().removeClass("active");
        $this.parent().addClass("active");
    });
    // Formulaire de réinitialisation sur le nouveau bouton
    $("#addnewbtn").on("click", function() {
        $("#addform")[0].reset();
        $("#id").val("");
    });

    //  obtenir un utilisateur
    $(document).on("click", "a.edituser", function() {
        var pid = $(this).data("id");

        $.ajax({
            url: "ajax.php",
            type: "GET",
            dataType: "json",
            data: { id: pid, action: "getuser" },
            beforeSend: function() {
                $("#overlay").fadeIn();
            },
            success: function(player) {
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
            error: function() {
                console.log("Quelque chose a mal tourné");
            },
        });
    });

    // Supprimer l'utilisateur
    $(document).on("click", "a.deleteuser", function(e) {
        e.preventDefault();
        var pid = $(this).data("id");
        if (confirm("Êtes-vous sûr de vouloir supprimer l'information?")) {
            $.ajax({
                url: "ajax.php",
                type: "GET",
                dataType: "json",
                data: { id: pid, action: "deleteuser" },
                beforeSend: function() {
                    $("#overlay").fadeIn();
                },
                success: function(res) {
                    if (res.deleted == 1) {
                        $(".message")
                            .html("Le Membre a été supprimé avec succès!")
                            .fadeIn()
                            .delay(3000)
                            .fadeOut();
                        getplayers();
                        $("#overlay").fadeOut();
                    }
                },
                error: function() {
                    console.log("Quelque chose a mal tourné");
                },
            });
        }
    });

    // Recevoir le profil
    $(document).on("click", "a.profile", function() {
        var pid = $(this).data("id");
        $.ajax({
            url: "ajax.php",
            type: "GET",
            dataType: "json",
            data: { id: pid, action: "getuser" },
            success: function(player) {
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
                    <i class="fa fa-map-marker" aria-hidden="true"></i> ${player.adresse}
                    <br />
                    <i class="fa fa-map-marker" aria-hidden="true"></i> ${player.cin}
                    <br />
                    <i class="fa fa-map-marker" aria-hidden="true"></i> ${player.numpermis}
                  </p>
                </div>
              </div>`;
                    $("#profile").html(profile);
                }
            },
            error: function() {
                console.log("Quelque chose a mal tourné");
            },
        });
    });

   // recherche
    $("#searchinput").on("keyup", function() {
        const searchText = $(this).val();
        if (searchText.length > 1) {
            $.ajax({
                url: "ajax.php",
                type: "GET",
                dataType: "json",
                data: { searchQuery: searchText, action: "search" },
                success: function(players) {
                    if (players) {
                        var playerslist = "";
                        $.each(players, function(index, player) {
                            playerslist += getplayerrow(player);
                        });
                        $("#userstable tbody").html(playerslist);
                        $("#pagination").hide();
                    }
                },
                error: function() {
                    console.log("Quelque chose a mal tourné");
                },
            });
        } else {
            getplayers();
            $("#pagination").show();
        }
    });
    // charger les utilisateurs
    getplayers();
});