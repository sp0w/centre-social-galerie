
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
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">

    <!-- My link -->
    <link rel="stylesheet" href="../assets/css/log.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">

</head>

<body>
<?php include('../include/navbar.php');?>


<div class="container-fluid mx-auto">
        <div class="row justify-content-center">
            <form action="test.php" method="POST" enctype="multipart/form-data">
                <div id="logo" class="mx-auto text-center">
                    <img src="../csm-admin/img/Logo_CSM.png" class="mt-3" width="200px" alt="logo centre">
                </div>
                <h1 class=" mb-3 mt-4 text-center">Espace Administrateur</h1>
                <hr class="mb-3"/>
                <div class="form-group">
                    <label for="username">Pseudo</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Votre pseudo"
                        required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Votre mot de passe" required>
                </div>
                <button type="submit" value="register" name="register" class="btn col-12 mt-2 mb-2"
                    style="background-color: #FF7200;">Connexion
                </button>
                <a href="#" class="text-decoration-none text-dark">Retour à l'Accueil</a>

                <p class="mt-5 text-center">&copy; Centre Social Manchester 2019</p>
            </form>
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