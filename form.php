<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Je vérifie si le formulaire est soumis comme d'habitude
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        // Securité en php
        // chemin vers un dossier sur le serveur qui va recevoir les fichiers uploadés (attention ce dossier doit être accessible en écriture)
        $uploadDir = 'public/uploads/';
        // le nom de fichier sur le serveur est ici généré à partir du nom de fichier sur le poste du client (mais d'autre stratégies de nommage sont possibles)
        $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
        // Je récupère l'extension du fichier
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        // Les extensions autorisées
        $authorizedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        // Le poids max géré par PHP par défaut est de 2M
        $maxFileSize = 1000000;

        // Je sécurise et effectue mes tests

        /****** Si l'extension est autorisée *************/
        if ((!in_array($extension, $authorizedExtensions))) {
            $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png ou gif, webp !';
        }

        /****** On vérifie si l'image existe et si le poids est autorisé en octets *************/
        if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
            $errors[] = "Votre fichier doit faire moins de 2M !";
        }

        /****** Si je n'ai pas d"erreur alors j'upload *************/
        /**
        TON SCRIPT D'UPLOAD
         */
    }


    // Je sécurise et effectue mes tests


    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        // Je vérifie si le formulaire est soumis comme d'habitude

        echo '<pre>';
        var_dump($_FILES);
        echo '</pre>';

        $uploadDir = 'public/uploads/';
        // le nom de fichier sur le serveur est ici généré à partir du nom de fichier sur le poste du client (mais d'autre stratégies de nommage sont possibles)
        $uploadFile = $uploadDir . uniqid() . basename($_FILES['avatar']['name']);
        // Je récupère l'extension du fichier
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

        // Les extensions autorisées
        $authorizedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        // Le poids max géré par PHP par défaut est de 2M
        $maxFileSize = 1000000;
        // Securité en php
        // chemin vers un dossier sur le serveur qui va recevoir les fichiers uploadés (attention ce dossier doit être accessible en écriture)
        if ((!in_array($extension, $authorizedExtensions))) {
            $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png ou gif, webp !';
        }

        /****** On vérifie si l'image existe et si le poids est autorisé en octets *************/
        if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
            $errors[] = "Votre fichier doit faire moins de 2M !";
        }

        /****** Si je n'ai pas d"erreur alors j'upload *************/
        /**
            TON SCRIPT D'UPLOAD
         */
        if (empty($errors)) {
            echo "Le tableau est vide";
            move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
        } else {
            echo "Le tableau n'est pas vide";
            echo '<pre>';
            var_dump($uploadFile, $extension, $errors, strtolower($extension));
            echo '</pre>';
        }
    }
    ?>

    <form method="post" enctype="multipart/form-data">
        <label for="imageUpload">Upload an profile image</label>
        <input type="file" name="avatar" id="imageUpload" />
        <button name="send">Send</button>
    </form>
</body>

</html>