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
            <a href="index.php?uc=eleve&action=listEleve" class="nav-link text-white mb-3" ><i class="bi bi-people"></i> Élèves  </a>
          </li>
          <li class="nav-item">
            <a href="index.php?uc=admin&action=deconect" class="nav-link text-white mb-3" ><i class="bi bi-toggle-off"></i>
 Déconection </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-8 col-lg-9">
        <h1 class="mt-3"><i class="bi bi-clipboard2-check-fill"></i> Tableau de bord </h1>
        <br>
        
        <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $nombreProfesseur ?></h3>
                                <p class="fs-5">Professeurs</p>
                            </div>
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $nombreSeances ?></h3>
                                <p class="fs-5">Cours</p>
                            </div>
                            <i class="bi bi-book"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $nombreEleves?></h3>
                                <p class="fs-5">Élèves</p>
                            </div>
                            <i class="bi bi-people"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $nombreInstruments ?></h3>
                                <p class="fs-5">Instruments</p>
                            </div>
                            <i class="bi bi-music-note-list"></i>
                        </div>
                    </div>
                </div>

<h1 class="mt-4 mb-3">Liste des professeurs</h1>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Prenom</th>
      <th scope="col">Nom</th>
      <th scope="col">Instrument</th>
    </tr>
  </thead>
  <tbody>
  <?php
  foreach($lesProfs as $prof)
{
  echo"
  
    <tr>
      <th scope='row'></th>
      <td>".$prof -> getPrenom() ."</td>
      <td>".$prof -> getNom()."</td>
      <td>".$prof-> getRef()."</td>
    </tr>
   ";
}
?>
  </tbody>
</table>



<h1 class="mt-4 mb-3">Liste des Élèves </h1>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Prenom</th>
      <th scope="col">nom</th>
      <th scope="col">niveau</th>
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
    </tr>
   ";
}
?>
  </tbody>
</table>

  </div>
  </div>
</div>