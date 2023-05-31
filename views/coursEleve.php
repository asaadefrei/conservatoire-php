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

<div class="container mt-5">
<h1 class="text-center mb-3">Ajouter un élève</h1>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
            <form method="post" action="index.php?uc=eleve&action=ajtEleveCours">

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
                foreach($lesElevesPasDansLeCours as $eleve1)
              {
                echo"
                
                  <tr>
                    <th scope='row'></th>
                    <td>".$eleve1 -> getPrenom() ."</td>
                    <td>".$eleve1 -> getNom()."</td>
                    <td>
                      <div class='form-check'>
                        <input type='checkbox' class='form-check-input' name='add[]' value='". $eleve1 -> getId()."'>
                      </div>
                    </td>
                  </tr>
                ";
              }
              ?>
                <input type="hidden" name="numSeance" value="<?php echo $cours->getNumSeance(); ?>">
                <input type="hidden" name="idProf" value="<?php echo $cours->getIdProf(); ?>">
                </tbody>
              </table>
              <button type="submit" class="btn btn-success">Ajouter les élèves sélectionnés dans le cours</button>
                    </form>

                          </div>
                      </div>
                  </div>
              </div>
              </div>





<h1 class="mt-4 mb-3"><i class="bi bi-people me-2"></i>Liste des élèves de ce cours </h1>

<a href='index.php?uc=cours&action=pdf&num=<?php echo $cours -> getNumSeance() ?>' class='btn btn-warning mb-3'>imprimer liste élève</a>


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
  foreach($lesElevesDansLeCours as $eleve1)
{
  echo"
  
    <tr>
      <th scope='row'></th>
      <td>".$eleve1 -> getPrenom() ."</td>
      <td>".$eleve1 -> getNom()."</td>
      <td>
        <div class='form-check'>
          <input type='checkbox' class='form-check-input' name='add[]' value='". $eleve1 -> getId()."'>
        </div>
      </td>
    </tr>
  ";
}
?>
  <input type="hidden" name="numSeance" value="<?php echo $cours->getNumSeance(); ?>">
  </tbody>
</table>
<button type="submit" class="btn btn-danger mb-3">supprimer les élèves sélectionnés du cours</button>
      </form>