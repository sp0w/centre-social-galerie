<?php include('../include/connect.php');?>
<!doctype html>
<html lang="fr">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Titre -->
    <title>CSM Secteur Enfant</title>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/839df3b8b1.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">

    <!-- My link -->
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="assets/css/navbar.css">

</head>

<body>

    <?php include('./include/navbar.php') ?>

    <!--Maps + form-->
    <div id="contact">
        <section class="container mt-6">
            <div class="row" style="height:550px;">
                <div class="col-md-6 mt-4 maps">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6529.686236879358!2d4.6857508287402885!3d49.76301615637527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ea0e2667d18943%3A0x31ae713c4d23186e!2sCentre+Social+Manchester!5e0!3m2!1sfr!2sfr!4v1561030953174!5m2!1sfr!2sfr"
                        frameborder="0" style="border:solid 1px;" allowfullscreen></iframe>
                </div>
                <div class="col-md-6 mt-3">
                    <h3 class="text-uppercase mt-3 font-weight-bold" style="color: #FF7200;">Contactez-Nous</h3>
                    <form method="post" action="mail.php">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Votre Nom</label>
                                        <input type="text" class="form-control" name="nom" id="formGroupExampleInput"
                                            placeholder="Nom" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Votre Prénom</label>
                                        <input type="text" class="form-control" name="prenom"
                                            id="formGroupExampleInput2" placeholder="Prénom" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Votre E-mail</label>
                                        <input type="text" class="form-control" name="email" id="formGroupExampleInput2"
                                            placeholder="exemple@hotmail.fr" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Le Sujet</label>
                                        <input type="text" class="form-control" name="sujet" id="formGroupExampleInput2"
                                            placeholder="Entrez Votre Message" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Votre Message</label>
                                        <textarea class="form-control" name="message" id="exampleFormControlTextarea1"
                                            placeholder="Entrez votre texte ici" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn" style="background-color: #FF7200" type="submit">Envoyé</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    </section>
    <?php include("footer.php")
    ?>


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
    <script type="text/javascript" src="./assets/js/image.js"></script>
    <script type="text/javascript" src="./assets/js/filtre.js"></script>

</body>

</html>