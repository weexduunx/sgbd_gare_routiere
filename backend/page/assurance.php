<div id="alert" class="alert alert-success alert-dismissible text-center message fade show " role="alert">
    <button type='button' class='btn-close' data-coreui-dismiss='alert' aria-label='Close'>
        <span aria-hidden="true">&times;</span>
    </button>
    <span id="alert_message"></span>
</div>
<!--Debut Table -->
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
            <div class="mdc-card ">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-0">Liste des Assurés</h4>
                <div class="btn-group mb-3" >
                    <label  id="addnew" class="btn btn-outline-success"> Ajouter
                        <i class="fa fa-plus-circle fa-lg " aria-hidden="true"></i>&nbsp;
                    </label>&nbsp;&nbsp;
                    <label id="bouton" class=""></label>
                </div>                
            </div>
                <!-- include -->
                <?php include_once 'assTable.php';?>
                <?php include('assCrud/modal.php'); ?>
                 
            </div>
        </div>
    </div>
</div>
<!--Fin Table -->