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
            <a href="index.php?uc=prof&action=listCours" class="nav-link text-white mb-3" > <i class="bi bi-book"></i>Cours </a>
          </li>
          <li class="nav-item">
            <a href="index.php?uc=eleve&action=listEleve" class="nav-link text-white mb-3" ><i class="bi bi-people"></i> Eleves </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-white mb-3" ><i class="bi bi-music-note-list"></i>
 Instruments </a>
          </li>
          <li class="nav-item">
            <a href="index.php?uc=admin&action=deconect" class="nav-link text-white mb-3" ><i class="bi bi-toggle-off"></i>
 Déconection </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-8 col-lg-9">


    <h1 class="mt-3 mb-4"><i class="bi bi-book"></i> Liste des cours</h1>
<button class="btn btn-primary mb-4" onclick="window.location.href='https://www.example.com'">Creer un nouveau cours</button>

<div class='row'>
  <?php
  foreach($lesCours as $cours) {
    $nomProf = Prof::getNomProf($cours->getIdProf());
    $instrument = Prof::getInstrumentProf($cours->getIdProf());
    $nombreEleve = Inscription::nombreInscriptionParSeance($cours->getIdProf());
        echo "
    <div class='col-md-4 col-sm-6'>
      <div class='card mb-3 '>
        <div class='card-body bg-dark text-white'>
          <h5 class='card-title'>Cours de " . $nomProf . "</h5>
          <h6 class='card-subtitle mb-2 text-muted'>c'est un cours de ".$instrument ."</h6>
          <p class='card-text'></p>
        </div>
        <ul class='list-group list-group-flush'>
          <li class='list-group-item'>Jour : ".$cours -> getJour()."</li>
          <li class='list-group-item'>Heure : ".$cours -> getTranche()."</li>
          <li class='list-group-item'>Professeurs : ".$nomProf."</li>
          <li class='list-group-item'>Nombre d'eleve : ".$nombreEleve ." / ". $cours ->getCapacite()  ."</li>
        </ul>
        <div class='card-body'>
          <a href='#' class='btn btn-info'>Voir detail/modifier</a>
          <a href='#' class='btn btn-danger'>supprimer</a>

        </div>
        
      </div>
    </div>";
  }
  ?>
</div>




