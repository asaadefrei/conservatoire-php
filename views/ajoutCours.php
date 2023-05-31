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

    <div class="container mt-5">
    <h1 class="text-center mb-5">Ajouter un cours</h1>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                <form method="post" action="index.php?uc=prof&action=ajtCours">
                        <div class="row">
                        <div class="col-lg-6 mb-3">
                                <label class="form-label">Professeur</label>
                                <select class="form-control form-control-lg" name="nomProf">
                                    <?php
                                    foreach($lesProfs as $prof){
                                        echo " <option>".$prof -> getNom()." ". $prof -> getPrenom() ."</option>";

                                    }
                                    ?>
                                </select>
                            </div>
                    
                            <div class="col-lg-6 mb-3">
                                <label for="country" class="form-label">Jour</label>
                                <select class="form-control form-control-lg" name="jour">
                                    <?php
                                    foreach($lesJours as $jour){
                                        echo "
                                    <option>".$jour -> getJour()."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="country" class="form-label">Tranche</label>
                                <select class="form-control form-control-lg" name="tranche">
                                    <?php
                                    foreach($lesTranches as $tranche){
                                        echo "
                                    <option>".$tranche -> getHeure()."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="country" class="form-label">Niveau</label>
                                <select class="form-control form-control-lg" name="niveau">
                                    <?php
                                    foreach($lesNiveaux as $niveau){
                                        echo "
                                    <option>".$niveau -> getNiveau()."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="city" class="form-label">Capacite</label>
                                <input type="text" class="form-control form-control-lg" id="capaciteInput" name="capacite" >
                                <div id="capaciteError" class="text-danger"></div>

                            </div>
                           
                            <div class="col-lg-6 mb-3 text-end w-100">
                                <button type="submit" class="btn btn-primary w-100">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>





<script>
    // Validation du formulaire côté client
    document.querySelector('form').addEventListener('submit', function(event) {
        var salaireInput = document.getElementById('capaciteInput');
        var salaireError = document.getElementById('capaciteError');
        
      

        if (salaireInput.value.trim() === '' || isNaN(capaciteInput.value.trim())) {
            salaireError.textContent = 'Veuillez saisir une capacite(chiffre uniquement)';
            salaireError.style.display = 'block';
            event.preventDefault(); // Empêche l'envoi du formulaire
        } else {
            salaireError.textContent = ''; // Efface le message d'erreur
            salaireError.style.display = 'none';
        }
    });
</script>

