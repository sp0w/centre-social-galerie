<?php include('../include/connect.php'); ?>

<!doctype html>
<html lang="FR">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Titre -->
  <title>CSM Secteur jeune</title>

  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/839df3b8b1.js"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">

  <!-- My link -->
  <link rel="stylesheet" href="../assets/css/secteur.css">
  <link rel="stylesheet" href="../assets/css/navbar.css">

</head>

<body>

  <?php include('../include/navbar.php') ?>

  <div class="container">

    <!-- Titre page -->
    <h1 class="font-weight-light text-lg-left mt-4 texte-img">Galerie Secteur jeune</h1>
    <hr class="mt-2 mb-5">
    <!-- Titre page end -->

    <div align="center" class="mb-5">
      <button class="btn btn-secondary filter-button" data-filter="all">All</button>
      <button class="btn btn-secondary filter-button" data-filter="2016">2016</button>
      <button class="btn btn-secondary filter-button" data-filter="2017">2017</button>
      <button class="btn btn-secondary filter-button" data-filter="2018">2018</button>
      <button class="btn btn-secondary filter-button" data-filter="2019">2019</button>
      <button class="btn btn-secondary filter-button" data-filter="2020">2020</button>
      <button class="btn btn-secondary filter-button" data-filter="2021">2021</button>
      <button class="btn btn-secondary filter-button" data-filter="2022">2022</button>
      <button class="btn btn-secondary filter-button" data-filter="2023">2023</button>
      <button class="btn btn-secondary filter-button" data-filter="2024">2024</button>
      <button class="btn btn-secondary filter-button" data-filter="2025">2025</button>
    </div>

    <div class="row">

      <?php
    $requete = "SELECT * FROM secteur_jeune";
    $req = $dbh->prepare($requete);
    $req->execute();
    while ($donnees = $req->fetch()){

    echo  '
    <div class="col-lg-4 mb-5 filter '.$donnees['year'].' ">
    <p class="text-thumbnail ml-1">'.$donnees['texte'].'</p>
          <a class="thumbnail" data-image-id="'.$donnees['id'].'" data-toggle="modal" data-title="'.$donnees['texte'].'"
            data-image="'.$donnees['image'].'"
            data-target="#image-gallery">
            <img class="img-thumbnail img-fluid"
              src="'.$donnees['image'].'">
          </a>
          <div class="date">
                <ul>
            <li class="mx-auto">'.$donnees['mois'].' '.$donnees['year'].'</li>
                </ul>
            </div>
        </div>'
    ;
  }
   $req->closeCursor();
?>

      <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="image-gallery-title"></h4>
              <button class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                  class="sr-only">Close</span>
              </button>
            </div>
            <div class="modal-body">
              <img id="image-gallery-image" class="img-thumb col-md-12" src="">
            </div>
            <div class="modal-footer">
              <a href="" download><button class="btn btn-success"><i class="fas fa-download"></i></button></a>

              <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i
                  class="fa fa-arrow-left"></i>
                <button type="button" class="btn btn-secondary float-right" id="show-next-image"><i
                    class="fa fa-arrow-right"></i>
                </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>.
  <script type="text/javascript" src="../assets/js/image.js"></script>
  <script type="text/javascript" src="../assets/js/filtre.js"></script>


</body>

</html>