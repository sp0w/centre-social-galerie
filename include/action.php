
<?php 

/* connection DB */

function getDatabaseConnexion() {
    try {
        $user='mathieu';
        $pass='root';
        $dbh = new PDO("mysql:host=localhost;dbname=csm-galerie", $user, $pass);

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;

    } catch (PDOExeption $e) {
        print "Erreur !: " . $e->getmessage() . "<br/>";
        die();

        }
    }

/* get all : secteur adulte */

function getAll_adulte() {
    $con = getDatabaseConnexion();
    $requete = "SELECT * FROM secteur_adulte";
    $rows = $con->prepare($requete);
    $rows->execute();
    return $rows;

}

/* get all : secteur jeune */

function getAll_jeune() {
    $con = getDatabaseConnexion();
    $requete = "SELECT * FROM secteur_jeune";
    $rows = $con->prepare($requete);
    $rows->execute();
    return $rows;

}

/* get all : secteur enfant */

function getAll_enfant() {
    $con = getDatabaseConnexion();
    $requete = "SELECT * FROM secteur_enfant";
    $rows = $con->prepare($requete);
    $rows->execute();
    return $rows;

}

function readImg($id) {
    $con = getDatabaseConnexion();
    $requete = "SELECT * FROM secteur_enfant WHERE id = '$id' ";
    $stmt = $con->prepare($requete);
    $stmt->execute();
    $row = $stmt->fetchAll();

    if ( !empty($row)) {
        return $row[0];
    }
}

function createImg($texte, $image, $mois, $année) {
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO secteur_enfant (texte, image, mois, année)
        VALUES ('$texte', '$image', '$mois', '$année')";
        $con->exec($sql);
    }

    catch(PDOException $e) {
        echo $sql . "<br>". $e->getMessage();
    }
}

function updateImg($id, $texte, $image, $mois, $année) {
    try {
        $con = getDatabaseConnexion();
        $requete = "UPDATE secteur_enfant set 
                    texte = '$texte',
                    image = '$image',
                    mois = '$mois',
                    année = '$année'
                    WHERE id = '$id'";
        $stmt=$con->prepare($requete);
        $stmt->execute();
    }

    catch(PDOException $e) {
        echo $sql . "<br>". $e->getMessage();
    }
}

function deleteimg($id) {
    try {
        $con = getDatabaseConnexion();
        $requete = "DELETE FROM secteur_enfant WHERE id='$id' ";
        $stmt = $con->prepare($requete);
        $stmt->execute();
    }

    catch(PDOException $e) {
        echo $bdh . "<br>". $e->getMessage();
    }
}

?>
