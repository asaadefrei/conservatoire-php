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


    <h1 class="mt-3 mb-4"><i class="bi bi-mortarboard-fill me-2"></i>Liste des Professeurs</h1>

    <a href="index.php?uc=prof&action=pageAjoutProf"><button class="btn btn-primary mb-3">Créer Professeur</button></a>

<form method="post" action="index.php?uc=prof&action=deleteProf">



<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Prenom</th>
      <th scope="col">Nom</th>
      <th scope="col">Instrument</th>
      <th scope="col">action</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
  <?php
  foreach($lesProfs as $prof)
{
  echo"
  
    <tr>
      <th scope='row'>1</th>
      <td>".$prof -> getPrenom() ."</td>
      <td>".$prof -> getNom()."</td>
      <td>".$prof-> getRef()."</td>
      <td><a href='index.php?uc=prof&action=pageModifProf&id=".$prof->getId()."' class='btn btn-light'>Modifier</a></td>
      <td>
        <div class='form-check'>
          <input type='checkbox' class='form-check-input' name='delete[]' value='".$prof ->getId()."'>
        </div>
      </td>
    </tr>
   ";
}
?>
  </tbody>
</table>

<button type="submit" class="btn btn-danger">Supprimer les professeurs sélectionnés</button>
      </form>

</div>