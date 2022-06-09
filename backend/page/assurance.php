<div class="alert alert-success alert-dismissible text-center message fade show " role="alert">
    <button type='button' class='btn-close' data-coreui-dismiss='alert' aria-label='Close'></button>
</div>
<!--Debut Table -->
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
            <div class="mdc-card ">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-0">Liste des Assurés</h4>
                <div>
                    <div>
                        <button type="button" class=" btn btn-primary m-1 float-right " data-toggle="modal" data-target="#addAssuranceModal" id="addnewbtn">
                            <i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>&nbsp;Ajouter  
                        </button>
                        <a href="#" class="btn btn-success m-1 float-right">
                            <i class="fa fa-table fa-lg" aria-hidden="true"></i>&nbsp;Exporter vers Excel
                        </a>
                    </div>
                </div>
            </div>
                
                    <?php
                        include_once 'formassurance.php';
                        include_once 'profile.php';
                    ?>
                        
                    <?php
                        include_once 'tableassurance.php';
                    ?>
                 
            </div>
        </div>
    </div>
</div>
<!--Fin Table -->