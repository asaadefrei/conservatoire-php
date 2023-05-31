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
    <h1 class="text-center mb-5">Détails Professeur</h1>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                <form method="post" action="index.php?uc=prof&action=modifProf&id=<?php echo $prof->getId(); ?>">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="username" class="form-label">Nom</label>
                                <input type="text" class="form-control form-control-lg" name="nom" value="<?php echo $prof->getNom(); ?>">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="password" class="form-label">Prenom</label>
                                <input type="text" class="form-control form-control-lg" name="prenom"  value="<?php echo $prof->getPrenom(); ?>">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="email" class="form-label">Tel</label>
                                <input type="text" class="form-control form-control-lg" name="tel"  value="<?php echo $prof->getTel(); ?>">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="phone" class="form-label">Email</label>
                                <input type="text" class="form-control form-control-lg" name="email" value="<?php echo $prof->getMail(); ?>">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="phone" class="form-label">Adresse</label>
                                <input type="text" class="form-control form-control-lg" name="adresse" value="<?php echo $prof->getAdresse(); ?>">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="country" class="form-label">Instrument</label>
                                <select class="form-control form-control-lg" name="instrument">
                                    <?php foreach($lesInstrument as $instrument) {
                                        $selected = ($prof->getRef() == $instrument->getRef()) ? 'selected' : '';
                                        echo "<option value=".$instrument->getRef()." $selected>".$instrument->getRef()."</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="city" class="form-label">Salaire</label>
                                <input type="text" class="form-control form-control-lg" name="salaire" id="salaireInput" value="<?php echo $prof -> getSalaire() ;?>">
                                <div id="salaireError" class="text-danger"></div>
                            </div>
                           
                           
                            <div class="col-lg-6 mb-3 text-end w-100">
                                <button type="submit" class="btn btn-primary w-100">Modifier</button>
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
        var salaireInput = document.getElementById('salaireInput');
        var salaireError = document.getElementById('salaireError');

        var salaire = parseInt(salaireInput.value.trim());

        if (isNaN(salaire) || salaire.toString() !== salaireInput.value.trim()) {
            salaireError.textContent = 'Veuillez saisir un salaire entier.';
            salaireError.style.display = 'block';
            event.preventDefault(); // Empêche l'envoi du formulaire
        } else {
            salaireError.textContent = ''; // Efface le message d'erreur
            salaireError.style.display = 'none';
        }
            });
</script>