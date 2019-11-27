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

    <?php

function imageUploader($file){

    $target_dir = "../csm-admin/img/";
    $target_file = $target_dir . basename($file["image"]["name"]);
    $post_tmp_img = $file["image"]["tmp_name"];

    $imageData = getimagesize($post_tmp_img);

    if ($imageData){

        $mimeType = $imageData['mime'];

        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($mimeType, $allowedMimeTypes))
        {
            if(move_uploaded_file($post_tmp_img,$target_file)){
                return $target_file;
            }else{
                return array('error'=>"Impossible de télécharger l'image");
            }
        }else{
            return array('error'=>"Juste les JPEG, PNG and GIFs sont autorisé");
        }
    }else{
        return array('error'=>"Image invalide");
    }
}

if(isset($_POST['submit'])) {

    if (!isset($_REQUEST['edit']) && !isset($_REQUEST['delete'])) {
        //add

        $texte = trim($_POST['texte']);
        $image = "";
        $mois = trim($_POST['mois']);
        $year = trim($_POST['year']);

        if (!empty($_FILES["image"]["tmp_name"])) {
            $image = imageUploader($_FILES);
        }
        if (gettype($image) == "string") {

            $stmt = $dbh->prepare('INSERT INTO `secteur_jeune` (`texte`, `image`, `mois`, `year`) VALUES (:texte,:image,:mois,:year)');
            $resultat = $stmt->execute([
                'texte' => $texte,
                'image' => $image,
                'mois' => $mois,
                'year' => $year
            ]);

            if ($resultat) {
                $notification_works = "Image créer";
            } else {
                $notify = "ERR0R image non créer";
            }
        } else {
            $notify = $image['error'];
        }
    } else if (isset($_REQUEST['edit'])) {
        // edit

        $texte = trim($_POST['texte']);
        $image = "";
        $mois = trim($_POST['mois']);
        $year = trim($_POST['year']);
        if (!empty($_REQUEST['id'])) {

            $id = $_REQUEST['id'];

            if (empty($_FILES["image"]["tmp_name"])) {
                $image = trim($_REQUEST['editer_image']);
            } else {
                $image = imageUploader($_FILES);
            }
            if (gettype($image) == "string") {

                $stmt = $dbh->prepare('UPDATE `secteur_jeune` SET `texte`=:texte,`image`=:image,`mois`=:mois,`year`=:year WHERE id=:id');

                $resultat = $stmt->execute([
                    'texte' => $texte,
                    'image' => $image,
                    'mois' => $mois,
                    'year' => $year,
                    'id' => $id
                ]);

                if ($resultat) {
                    $notification_works = "Image éditer";
                header("Location: gestion_jeune.php?success");
                } else {
                    $notification_error = "ERROR Image non éditer";
                }
            } else {
                $notify_error = $image['error'];
            }
        } else {
            $notification_error = "ERROR Image non éditer";
        }
    }
}

if(isset($_REQUEST['del'])){
        // delete
        if(!empty($_REQUEST['id'])) {

            $id = $_REQUEST['id'];

            $stmt = $dbh->prepare("DELETE FROM secteur_jeune WHERE id=? ");
            if ($stmt->execute([$id])) {
                $notification_works = "Image Supprimé";
                        } else {
                            $notification_error = "ERROR Image non Supprimé";
                        }
        }else{
            $notification_error = "ERROR Image non Supprimé";
        }
    }
?>

    <div class="container-fluid mx-auto">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="text-center text-dark mt-3 mb-4"> Gestion Administration</h1>
                <hr class="mb-3" />
            </div>

            <div class="col-md-4">
            <h2 class="text-center mb-4 mt-2" style="color:#FF7200;"><?php echo isset($_GET["edit"]) && !empty($_GET["id"]) ? "Éditer l'image" : "Ajouter une image";?></h2>
                <?php
                if(!empty($notification_works) || isset($_GET['success'])){
                    ?>

                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div><i class="fas fa-check mr-2"></i>
                        <?php echo isset($_GET['success']) ? "Image éditer" :  $notification_works;?>
                    </div>
                </div>

                <?php
                }               
                if(!empty($notification_error)){
                    ?>

                <div class="alert alert-danger mt-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div><i class="fas fa-times mr-2"></i><?php echo $notification_error;?></div>
                </div>

                <?php
                }
                ?>
                <?php

                    $action="gestion_jeune.php";

                    if(isset($_GET["edit"]) && !empty($_GET["id"]))
                    {
                        $action="gestion_jeune.php?edit&id=".$_GET["id"];
                        $data=[];

                        $stmt = $dbh->prepare("SELECT * FROM `secteur_jeune` WHERE `id`=? ");
                        $stmt->execute([trim($_GET["id"])]);

                        if($stmt->rowCount() > 0){
                            $data = (object)$stmt->fetch();
                        }
                    }
                ?>

                <form action="<?php echo $action;?>" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Secteur</label>
                        <select id="input" class="form-control" onchange="location = this.value;">
                            <option value="#">-- Jeune --</option>
                            <option value="gestion_enfant.php">Enfant</option>
                            <option value="gestion_adulte.php">Adulte</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Texte</label>
                        <div class="form-group">
                            <input type="text" name="texte" class="form-control" placeholder="Entrer votre texte"
                                maxlength="30" required value="<?php echo !empty($data) ? $data->texte : ""?>">
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
                        <input type="file" name="image" class="mx-auto mt-2 mb-3 file"
                            <?php  echo !empty($data) && !empty($data->year) ? "" : "required";?>>
                        <?php
                            if(!empty($data) && !empty($data->image)) {
                        ?>
                        <input type="hidden" name="editer_image" value="<?php echo $data->image;?>" />
                        <img class="img-fluid mb-2" src="<?php echo $data->image ?>" />
                        <?php
                            }
                        ?>
                    </div>

                    <button type="submit" name="submit" class="btn col-12 mt-2"
                        style="background-color: #FF7200;"><?php echo isset($_GET["edit"]) && !empty($_GET["id"]) ? "Éditer l'image" : "Ajouter l'image";?>
                    </button>
                </form>
            </div>

            <?php
        $sql = "SELECT * FROM secteur_jeune";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        ?>

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
                                <?php
                                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                            ?>
                                <td class="align-middle mx-auto"><?php echo $row->id; ?></td>
                                <td class="align-middle mx-auto texte_img">
                                    <h5><?php echo $row->texte; ?></h5>
                                </td>
                                <td class="align-middle"><img class="img-fluid" alt="Image du centre"
                                        style="max-width:250px;" src="<?php echo $row->image; ?>" /></td>
                                <td class="align-middle mx-auto"><?php echo $row->mois; ?></td>
                                <td class="align-middle mx-auto"><?php echo $row->year; ?></td>
                                <td class="align-middle mx-auto">
                                    <a href="?edit&id=<?php echo $row->id ?>"
                                        class="btn btn-dark col-10 col-lg-5 mb-1 btn_t" title="éditer"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="?del&id=<?php echo $row->id ?>" class="btn col-10 col-lg-5 mb-1 btn_t"
                                        title="supprimer" style="background-color: #FF7200;"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette image :                <?php echo $row->texte ?>');"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
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

    <script type="text/javascript">
        $(document).ready(function () {
            setTimeout(function () {
                $(".alert").alert('close');
            }, 5000);
        });
    </script>

</body>

</html>