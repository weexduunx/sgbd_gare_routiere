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
                        <button type="button" class="mdc-button " data-toggle="modal" data-target="#assuranceModal" id="addnewbtn">
                            Ajouter 
                            <i class="fa fa-plus-circle " aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
                
                    <?php
                    ?>
                        
                    <?php
                        include_once 'tableassurance.php';
                    ?>
                        <nav id="pagination"></nav>
                        <input type="hidden" name="currentpage" id="currentpage" value="1">
                 
            </div>
        </div>
    </div>
</div>
<!--Fin Table -->