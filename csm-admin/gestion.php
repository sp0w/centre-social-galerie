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
    <title>CSM Administration</title>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/839df3b8b1.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">

    <!-- My link -->
    <link rel="stylesheet" href="../assets/css/gestion.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">

</head>

<body>


<?php include('../include/navbar.php'); ?>

    <div class="container-fluid mx-auto">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="text-center text-dark mt-3 mb-4"> Gestion Administration</h1>
                <hr class="mb-3"/>
            </div>

            <div class="col-md-4">
            <h2 class="text-center mb-4 mt-2" style="color:#FF7200;">Ajouter l'image</h2>

                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Secteur</label>
                        <select id="input" class="form-control" onchange="location = this.value;">
                            <option value="#">-- Secteur --</option>
                            <option value="gestion_adulte.php">Adulte</option>
                            <option value="gestion_jeune.php">Jeune</option>
                            <option value="gestion_enfant.php">Enfant</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Texte</label>
                        <div class="form-group">
                            <input type="text" name="texte" class="form-control" placeholder="Entrer votre texte"
                                maxlength="30" required value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Mois</label>
                        <select id="input" name="mois" class="form-control">
                            <option value="">-- Mois --</option>
                            <option <?php echo !empty($data) && $data->mois=="Janvier" ? "selected" : ""?>
                                value="Janvier">Janvier</option>
                            <option <?php echo !empty($data) && $data->mois=="Février" ? "selected" : ""?>
                                value="Février">Février</option>
                            <option <?php echo !empty($data) && $data->mois=="Mars" ? "selected" : ""?> value="Mars">
                                Mars</option>
                            <option <?php echo !empty($data) && $data->mois=="Avril" ? "selected" : ""?> value="Avril">
                                Avril</option>
                            <option <?php echo !empty($data) && $data->mois=="Mai" ? "selected" : ""?> value="Mai">Mai
                            </option>
                            <option <?php echo !empty($data) && $data->mois=="Juin" ? "selected" : ""?> value="Juin">
                                Juin</option>
                            <option <?php echo !empty($data) && $data->mois=="Juillet" ? "selected" : ""?>
                                value="Juillet">Juillet</option>
                            <option <?php echo !empty($data) && $data->mois=="Août" ? "selected" : ""?> value="Août">
                                Août</option>
                            <option <?php echo !empty($data) && $data->mois=="Septembre" ? "selected" : ""?>
                                value="Septembre">Septembre</option>
                            <option <?php echo !empty($data) && $data->mois=="Octobre" ? "selected" : ""?>
                                value="Octobre">Octobre</option>
                            <option <?php echo !empty($data) && $data->mois=="Novembre" ? "selected" : ""?>
                                value="Novembre">Novembre</option>
                            <option <?php echo !empty($data) && $data->mois=="Décembre" ? "selected" : ""?>
                                value="Décembre">Décembre</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Année</label>
                        <select id="input" name="year" class="form-control">
                            <option value="">-- Année --</option>
                            <option <?php echo !empty($data) && $data->year=="2016" ? "selected" : ""?> value="2016">
                                2016</option>
                            <option <?php echo !empty($data) && $data->year=="2017" ? "selected" : ""?> value="2017">
                                2017</option>
                            <option <?php echo !empty($data) && $data->year=="2018" ? "selected" : ""?> value="2018">
                                2018</option>
                            <option <?php echo !empty($data) && $data->year=="2019" ? "selected" : ""?> value="2019">
                                2019</option>
                            <option <?php echo !empty($data) && $data->year=="2020" ? "selected" : ""?> value="2020">
                                2020</option>
                            <option <?php echo !empty($data) && $data->year=="2021" ? "selected" : ""?> value="2021">
                                2021</option>
                            <option <?php echo !empty($data) && $data->year=="2022" ? "selected" : ""?> value="2022">
                                2022</option>
                            <option <?php echo !empty($data) && $data->year=="2023" ? "selected" : ""?> value="2023">
                                2023</option>
                            <option <?php echo !empty($data) && $data->year=="2024" ? "selected" : ""?> value="2024">
                                2024</option>
                            <option <?php echo !empty($data) && $data->year=="2025" ? "selected" : ""?> value="2025">
                                2025</option>
                        </select>
                    </div>

                    <div>
                        <p class="mb-1 mx-auto">Ajouter l'image</p>
                        <input type="file" name="image" class="mx-auto mt-2 mb-3 file" required>
                        <input type="hidden" name="editer_image" value="" />
                    </div>

                    <button type="submit" name="submit" class="btn col-12 mt-2"
                        style="background-color: #FF7200;">Ajouter l'image</button>
                </form>
            </div>

            <div class="col-md-7">
                <h2 class="text-center mb-5 mt-3" style="color:#FF7200;">Modifier | Supprimer images </h2>
                <div class="table-responsive-md mx-auto">
                    <table class="table dark table-bordered table-hover">
                        <thead>
                            <tr class="col-6">
                                <th>#</th>
                                <th>Texte</th>
                                <th>Image</th>
                                <th>Mois</th>
                                <th>Année</th>
                                <th>Gestion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#"
                                        class="btn btn-dark col-10 col-lg-5 mb-1 btn_t" title="éditer"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="#" class="btn col-10 col-lg-5 mb-1 btn_t"
                                        title="supprimer" style="background-color: #FF7200;"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
    </script>

</body>

</html>