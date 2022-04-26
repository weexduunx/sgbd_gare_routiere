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

// Obtenir la ligne des assurance
function getassurancerow(assurance) {
    var assuranceRow = "";
    if (assurance) {
        const userphoto = assurance.photo ? assurance.photo : "default.png";
        assuranceRow = `<tr>
          <td class="align-middle"><img src="uploads/${userphoto}" class="img-thumbnail rounded float-left"></td>
          <td class="align-middle">${assurance.prenom}</td>
          <td class="align-middle">${assurance.nom}</td>
          <td class="align-middle">${assurance.matricule}</td>
          <td class="align-middle">${assurance.categorie}</td>
          <td class="align-middle">${assurance.marque}</td>
          <td class="align-middle">${assurance.type_assurance}</td>
          <td class="align-middle">${assurance.montant_assurance}</td>
          <td class="align-middle">${assurance.debut_assurance}</td>
          <td class="align-middle">${assurance.fin_assurance}</td>
          <td class="align-middle">${assurance.duree_assurance} Jours</td>
          <td class="align-middle">
            <a href="#" class="btn btn-warning mr-3 editer" data-toggle="modal" data-target="#assuranceModal"
              title="Modifier" data-id="${assurance.id_assurance}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
            <a href="#" class="btn btn-danger supprimer" data-userid="14" title="Supprimer" data-id="${assurance.id_assurance}"><i
                class="fa fa-trash-o fa-lg"></i></a>
          </td>
        </tr>`;
    }
    return assuranceRow;
}
// Obtenir la liste des assurances
function getassurances() {
    var pageno = $("#currentpage").val();
    $.ajax({
        url: "ajax_assurance.php",
        type: "GET",
        dataType: "json",
        data: { page: pageno, action: "getassurances" },
        beforeSend: function() {
            $("#overlay").fadeIn();
        },
        success: function(rows) {
            console.log(rows);
            if (rows.assurances) {
                var assuranceslist = "";
                $.each(rows.assurances, function(index, assurance) {
                    assuranceslist += getassurancerow(assurance);
                });
                $("#assurancetable tbody").html(assuranceslist);
                let totalAssurances = rows.count;
                let totalpages = Math.ceil(parseInt(totalAssurances) / 4);
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
    // Ajouter / Modifier une assurance
    
    $(document).on("submit", "#ajoutform", function(event) {
        event.preventDefault();
        
        var alertmsg =
            $("#id_assurance").val().length > 0 ?
            "Les informations ont été mises à jour avec succès!" :
            "assurance ajouté avec succès!";
        $.ajax({
            url: "ajax_assurance.php",
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
                    $("#assuranceModal").modal("hide");
                    $("#ajoutform")[0].reset();
                    $(".message").html(alertmsg).fadeIn().delay(3000).fadeOut();
                    getassurances();
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
        getassurances();
        $this.parent().siblings().removeClass("active");
        $this.parent().addClass("active");
    });
    // Formulaire de réinitialisation sur le nouveau bouton
    $("#addnewbtn").on("click", function() {
        $("#ajoutform")[0].reset();
        $("#id_assurance").val("");
    });

    //  obtenir une assurance
    $(document).on("click", "a.editer", function() {
        var pid = $(this).data("id");

        $.ajax({
            url: "ajax_assurance.php",
            type: "GET",
            dataType: "json",
            data: { id_assurance: pid, action: "getassurance" },
            beforeSend: function() {
                $("#overlay").fadeIn();
            },
            success: function(assurance) {
                if (assurance) {
                    $("#selMembre").val(assurance.membre);
                    $("#matricule").val(assurance.matricule);
                    $("#categorie").val(assurance.categorie);
                    $("#marque").val(assurance.marque);
                    $("#type").val(assurance.type_assurance);
                    $("#montant").val(assurance.montant_assurance);
                    $("#debut").val(assurance.debut_assurance);
                    $("#fin").val(assurance.fin_assurance);
                    $("#id").val(assurance.id);
                }
                $("#overlay").fadeOut();
            },
            error: function() {
                console.log("Quelque chose a mal tourné");
            },
        });
    });

    // Supprimer une assurance
    $(document).on("click", "a.supprimer", function(e) {
        e.preventDefault();
        var pid = $(this).data("id");
        if (confirm("Êtes-vous sûr de vouloir supprimer l'information?")) {
            $.ajax({
                url: "ajax_assurance.php",
                type: "GET",
                dataType: "json",
                data: { id_assurance: pid, action: "deleteuser" },
                beforeSend: function() {
                    $("#overlay").fadeIn();
                },
                success: function(res) {
                    if (res.deleted == 1) {
                        $(".message")
                            .html("L'assurance a été supprimée avec succès!")
                            .fadeIn()
                            .delay(3000)
                            .fadeOut();
                        getassurances();
                        $("#overlay").fadeOut();
                    }
                },
                error: function() {
                    console.log("Quelque chose a mal tourné");
                },
            });
        }
    });

   // recherche
    $("#searchinput").on("keyup", function() {
        const searchText = $(this).val();
        if (searchText.length > 1) {
            $.ajax({
                url: "ajax_assurance.php",
                type: "GET",
                dataType: "json",
                data: { searchQuery: searchText, action: "search" },
                success: function(assurances) {
                    if (assurances) {
                        var assuranceslist = "";
                        $.each(assurances, function(index, assurance) {
                            assuranceslist += getassurancerow(assurance);
                        });
                        $("#assurancetable tbody").html(assuranceslist);
                        $("#pagination").hide();
                    }
                },
                error: function() {
                    console.log("Quelque chose a mal tourné");
                },
            });
        } else {
            getassurances();
            $("#pagination").show();
        }
    });
    // charger les utilisateurs
    getassurances();
});