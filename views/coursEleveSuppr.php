<div class="container-fluid">
  <div class="row">
    
    <div class="bg-dark col-md-3 col-lg-3 min-vh-100">
      <div class="bg-dark mt-4 ">
      <a class="d-flex text-decoration-none mt-1 align-items-center text-white fs-4"><i class="bi bi-music-note me-2"></i>
Conservatoire </a>
        <ul class="nav nav-pills flex-column mt-5">
          <li class="nav-item">
            <a href="index.php?uc=accueil&action=dashboard" class="nav-link text-white mb-3" > <i class="bi bi-clipboard"></i> dashboard </a>
          </li>
          <li class="nav-item">
            <a href="index.php?uc=prof&action=listProf" class="nav-link text-white mb-3" ><i class="bi bi-mortarboard-fill"></i> Prof </a>
          </li>
          <li class="nav-item">
            <a href="index.php?uc=prof&action=listCours" class="nav-link text-white mb-3" > <i class="bi bi-book"></i> Cours </a>
          </li>
          <li class="nav-item">
            <a href="index.php?uc=eleve&action=listEleve" class="nav-link text-white mb-3" ><i class="bi bi-people"></i> Eleves </a>
          </li>
          <li class="nav-item">
            <a href="index.php?uc=admin&action=deconect" class="nav-link text-white mb-3" ><i class="bi bi-toggle-off"></i>
 Déconection </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-8 col-lg-9">

<h1 class="mt-4 mb-3"><i class="bi bi-people me-2"></i>Liste des élèves de ce cours </h1>


<form method="post" action="index.php?uc=eleve&action=deleteEleveCours">

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Prenom</th>
      <th scope="col">nom</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
  foreach($lesElevesDansLeCours as $eleve)
{
  echo"
  
    <tr>
      <th scope='row'></th>
      <td>".$eleve -> getPrenom() ."</td>
      <td>".$eleve -> getNom()."</td>
      <td>
        <div class='form-check'>
          <input type='checkbox' class='form-check-input' name='add[]' value='". $eleve -> getId()."'>
        </div>
      </td>
    </tr>
   ";
}
?>
                <input type="hidden" name="numSeance" value="<?php echo $cours->getNumSeance(); ?>">

  </tbody>
</table>
<button type="submit" class="btn btn-danger">Supprimer les élèves sélectionnés</button>
      </form>

</div>