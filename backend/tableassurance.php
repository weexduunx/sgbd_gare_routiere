<!-- table -->
<div class="table-responsive" id="showAssurance">
<table id="table" class="table table-striped table-sm table-bordered" >
  <thead>
    <tr class="text-center">
      <th>Photo</th>
      <th>Prenom</th>
      <th>Nom</th>
      <th>Matricule</th>
      <th>Catégorie</th>
      <th>Marque</th>
      <th>Type Assurance</th>
      <th>Montant Assurance</th>
      <th>Debut Assurance</th>
      <th>Fin Assurance</th>
      <th>Durée Assurance</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=1; $i<=100;$i++): ?>
    <tr class="text-center text-secondary">
      <td><?= $i ?></td>
      <td>prenom <?= $i ?></td>
      <td>nom <?= $i ?></td>
      <td>mat <?= $i ?></td>
      <td>cat <?= $i ?></td>
      <td>marque <?= $i ?></td>
      <td>type <?= $i ?></td>
      <td>montant <?= $i ?></td>
      <td>debut <?= $i ?></td>
      <td>fin <?= $i ?></td>
      <td>durée <?= $i ?></td>
      <td>
        <a href="#" title="Voir les détails" class="text-success">
          <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
        </a>&nbsp;&nbsp;
        <a href="#" title="Editer" class="text-primary">
          <i class="fa fa-edit fa-lg" aria-hidden="true"></i>
        </a>&nbsp;&nbsp;
        <a href="#" title="Supprimer" class="text-danger">
          <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
        </a>&nbsp;&nbsp;
      </td>
    </tr>
    <?php endfor; ?>

  </tbody>
</table>
</div>
<!-- table -->