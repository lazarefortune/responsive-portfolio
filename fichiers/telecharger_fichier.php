<?php

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Télécharger des fichiers | Lazare Fortune</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- dropzone -->
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
</head>
<body>

    <div class="container">
        <h1 class="text-center mt-5 mb-2">
            <i class="fas fa-file-upload"></i>
            Télécharger des fichiers
        </h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_SESSION['message'])) {
                    ?>
                    <div class="alert alert-<?= $_SESSION['error'] ?>">
                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="d-flex justify-content-start">
                    <div class="p-2">
                        <a href="index.php" class="btn btn-primary">
                            <i class="fas fa-list"></i>
                            Liste des fichiers
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div id="alertContainer" class="container mt-3"></div>

        <div class="row">
            <div class="col-md-12">
                <form action="upload_files.php" method="POST" class="dropzone" id="my-awesome-dropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple/>
                    </div>
                </form>

                <button type="submit" class="btn btn-primary mt-3" id="uploadFilesBtn">
                    <i class="fas fa-upload"></i>
                    Envoyer
                </button>
            </div>
        </div>

        <script>
            Dropzone.options.myAwesomeDropzone = {
                paramName: "file",
                maxFilesize: 10,
                maxFiles: 50,
                addRemoveLinks: true,
                autoProcessQueue: false,
                dictRemoveFile: "Supprimer",
                dictFileTooBig: "Le fichier est trop volumineux ({{filesize}}MB). Taille max: {{maxFilesize}}MB.",
                dictInvalidFileType: "Type de fichier non autorisé",
                dictMaxFilesExceeded: "Vous ne pouvez pas télécharger plus de {{maxFiles}} fichiers.",
                dictDefaultMessage: "Déposez vos fichiers ici pour les télécharger ou cliquez pour les sélectionner",
                init: function () {
                    const alertContainer = document.querySelector('#alertContainer');

                    this.on("success", function (file, response) {
                        const alert = document.createElement('div');
                        alert.className = 'alert alert-success';
                        // afficher le nom du fichier téléchargé
                        alert.textContent = "Le fichier " + file.name + " a été téléchargé avec succès.";

                        alertContainer.appendChild(alert);

                        // Supprimer l'alerte après quelques secondes
                        setTimeout(function () {
                            alertContainer.removeChild(alert);
                        }, 5000);

                        // Vider le Dropzone après le succès du téléchargement
                        this.removeAllFiles();
                    });

                    this.on("error", function (file, errorMessage) {
                        const alert = document.createElement('div');
                        alert.className = 'alert alert-danger';
                        alert.textContent = "Erreur lors du téléchargement du fichier : " + errorMessage;

                        alertContainer.appendChild(alert);

                        // Supprimer l'alerte après quelques secondes
                        setTimeout(function () {
                            alertContainer.removeChild(alert);
                        }, 5000);
                    });
                }
            };

           const submitButton = document.querySelector('#uploadFilesBtn');

          submitButton.addEventListener('click', function (e) {
            e.preventDefault();
            const myDropzone = Dropzone.forElement("#my-awesome-dropzone");
            myDropzone.processQueue();
          });


        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
        crossorigin="anonymous"></script>
</body>
</html>
