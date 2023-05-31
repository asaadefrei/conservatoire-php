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
    <h1 class="text-center mb-5">Détails élève</h1>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="index.php?uc=prof&action=modifEleve">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="username" class="form-label">Nom </label>
                                <input type="text" class="form-control form-control-lg" name="nom" id="nomInput" value="<?php echo $eleve->getNom() ; ?>">
                                <div id="nomError" class="text-danger"></div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="password" class="form-label">Prenom</label>
                                <input type="text" class="form-control form-control-lg" name="prenom" id="prenomInput" value="<?php echo $eleve->getPrenom(); ?>" >
                                <div id="prenomError" class="text-danger"></div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="email" class="form-label">Tel</label>
                                <input type="text" class="form-control form-control-lg" name="tel" id="telInput" value="<?php echo $eleve->getTel(); ?>">
                                <div id="telError" class="text-danger"></div>

                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="phone" class="form-label">Email</label>
                                <input type="text" class="form-control form-control-lg" name="email" id="emailInput" value="<?php echo $eleve->getMail(); ?>">
                                <div id="emailError" class="text-danger"></div>

                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="phone" class="form-label">Adresse</label>
                                <input type="text" class="form-control form-control-lg" name="adresse" id="adresseInput" value="<?php echo $eleve->getAdresse(); ?>">
                                <div id="adresseError" class="text-danger"></div>

                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="country" class="form-label">Niveau</label>
                                <select class="form-control form-control-lg" name="niveau">
                                <?php foreach($lesNiveaux as $niveau) {
                                        $selected = ($eleve->getNiveau() == $niveau->getNiveau()) ? 'selected' : '';
                                        echo "<option value=".$niveau->getNiveau()." $selected>".$niveau->getNiveau()."</option>";
                                        
                                    } ?>
                                </select>
                            </div>
        
                            <input type="hidden" name="id" value="<?php echo $eleve->getId(); ?>">

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

    <?php include("script1.js"); ?>
</script>