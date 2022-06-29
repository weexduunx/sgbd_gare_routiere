<div class="alert alert-success alert-dismissible text-center message fade show " role="alert">
    <button type='button' class='btn-close' data-coreui-dismiss='alert' aria-label='Close'></button>
</div>
<!--Debut Table -->
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
            <div class="mdc-card ">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-0">Liste des Membres</h4>
                    <div class="btn-group mb-3" >
                        <label  class="btn btn-outline-success" data-toggle="modal" data-target="#userModal" id="addnewbtn">Ajouter
                            <i class="fa fa-plus-circle fa-lg " aria-hidden="true"></i>
                        </label>&nbsp;&nbsp;&nbsp;
                        <label id="bouton" class=""></label>
                    </div>                
                </div>
                <!-- include -->
                <?php
                include_once 'form.php';
                include_once 'profile.php';
                ?>

                <?php
                include_once 'tableutilisateur.php';
                ?>
                <!-- <nav id="pagination"></nav>
                <input type="hidden" name="currentpage" id="currentpage" value="1"> -->
            </div>
        </div>
    </div>
</div>
<!--Fin Table -->