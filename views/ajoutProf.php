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

    <div class="container mt-5">
    <h1 class="text-center mb-5">Ajouter Professeur</h1>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="index.php?uc=prof&action=ajtProf">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="username" class="form-label">Nom</label>
                                <input type="text" class="form-control form-control-lg" name="nom">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="password" class="form-label">Prenom</label>
                                <input type="text" class="form-control form-control-lg" name="prenom">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="email" class="form-label">Tel</label>
                                <input type="text" class="form-control form-control-lg" name="tel">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="phone" class="form-label">Email</label>
                                <input type="text" class="form-control form-control-lg" name="email">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="phone" class="form-label">Adresse</label>
                                <input type="text" class="form-control form-control-lg" name="adresse">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="country" class="form-label">Instrument</label>
                                <select class="form-control form-control-lg" name="instrument">
                                    <?php
                                    foreach($lesInstrument as $instrument){
                                        echo "
                                    <option>".$instrument -> getRef()."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="city" class="form-label">Salaire</label>
                                <input type="text" class="form-control form-control-lg" name="salaire" value="1">
                            </div>
                           
                            <div class="col-lg-6 mb-3 text-end w-100">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<p> </p>

</div>