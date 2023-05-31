<div class="container-fluid">
  <div class="row">
    
    <div class="bg-dark col-md-3 col-lg-3 min-vh-100">
      <div class="bg-dark mt-4 ">
      <a class="d-flex text-decoration-none mt-1 align-items-center text-white fs-4"><i class="bi bi-music-note me-2"></i>
Conservatoire </a>
        <ul class="nav nav-pills flex-column mt-5">
          <li class="nav-item">
            <a href="index.php?uc=accueil&action=dashboard" class="nav-link text-white mb-3" > <i class="bi bi-clipboard"></i> Dashboard </a>
          </li>
          <li class="nav-item">
            <a href="index.php?uc=prof&action=listProf" class="nav-link text-white mb-3" ><i class="bi bi-mortarboard-fill"></i> Professeurs </a>
          </li>
          <li class="nav-item">
            <a href="index.php?uc=prof&action=listCours" class="nav-link text-white mb-3" > <i class="bi bi-book"></i> Cours </a>
          </li>
          <li class="nav-item">
            <a href="index.php?uc=eleve&action=listEleve" class="nav-link text-white mb-3" ><i class="bi bi-people"></i> Élèves </a>
          </li>
          <li class="nav-item">
            <a href="index.php?uc=admin&action=deconect" class="nav-link text-white mb-3" ><i class="bi bi-toggle-off"></i>
 Déconection </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-8 col-lg-9">


<h1 class="mt-4 mb-3"><i class="bi bi-people me-2"></i>Liste des élèves </h1>

<a href="index.php?uc=prof&action=pageAjoutEleve"><button class="btn btn-primary mb-3">Créer élève</button></a>

<form method="post" action="index.php?uc=eleve&action=deleteEleve">

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Prenom</th>
      <th scope="col">nom</th>
      <th scope="col">niveau</th>
      <th scope="col">action</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
    <?php
  foreach($lesEleves as $eleve)
{
  echo"
  
    <tr>
      <th scope='row'></th>
      <td>".$eleve -> getPrenom() ."</td>
      <td>".$eleve -> getNom()."</td>
      <td>".$eleve-> getNiveau()."</td>
      <td><a href='index.php?uc=prof&action=pageModifEleve&id=".$eleve-> getId()."' class='btn btn-light'>Modifier</a></td>
      <td>
        <div class='form-check'>
          <input type='checkbox' class='form-check-input' name='delete[]' value='". $eleve -> getId()."'>
        </div>
      </td>
    </tr>
   ";
}
?>
  </tbody>
</table>
<button type="submit" class="btn btn-danger">Supprimer les élèves sélectionnés</button>
      </form>

</div>