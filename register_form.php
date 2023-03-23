<?php require_once('header.php') ?>
<section class="vh-100" style="background-color: #838996;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center" style="background-color: #BCC6CC;">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
              <?php
                if (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Hiba!</strong>403 error - Not authorized
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                } elseif (isset($_GET['errorures'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Hiba!</strong> Minden adatot tölts ki!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } elseif (isset($_GET['errorlet'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Hiba!</strong> Ez az email cím már létezik.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                elseif (isset($_GET['errornem'])) {
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Hiba!</strong> A jelszavak nem egyeznek meg.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
              }
              elseif (isset($_GET['errormeg'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Hiba!</strong> Az email cím nem megfelelő.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }  elseif (isset($_GET['errorin'])) {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Hiba!</strong> Az inicializálás nem működik.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          }
                ?>
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Regisztráció</p>

                <form class="mx-1 mx-md-4" method="POST" action="controllers/register.php">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="username"><b>Felhasználónév:</b></label>
                      <input type="text" id="username" class="form-control" name="username" placeholder="Felhasználónév" required />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="email"><b>Email cím:</b></label>
                      <input type="email" id="email" class="form-control" name="email" placeholder="email@example.com" required />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="password"><b>Jelszó:</b></label>
                      <input type="password" id="password" class="form-control" name="password" placeholder="Jelszó" required />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="password_confirm"><b>Ismételd meg a jelszavad:</b></label>
                      <input type="password" id="password_confirm" class="form-control" name="password_confirm" placeholder="Jelszó ismétlése" required />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label for="eletkor"><b>Életkor:</b></label>
                      <div id="passwordHelpBlock" class="form-text">
                        18 éven aluliak nem regisztrálhatnak.
                      </div>
                      <input type="number" id="eletkor" class="form-control" name="eletkor" placeholder="18" required min="18" max="90" required>
                    </div>
                  </div>
                  
                  <div class="d-flex flex-row align-items-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="1" id="admin" name="admin"/>
                    <label class="form-check-label" for="admin">
                      Adminként regisztrálok</a>
                    </label>
                  </div>



                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary btn-lg btn-dark">Regisztráció</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="images/foci.jpg" class="img-fluid" alt="Football">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Kész -->
<?php require_once('footer.php') ?>