<?php
session_start();

function readDirWithBootstrap( $repertoire )
{
    $fichier = array();

    if ( is_dir( $repertoire ) ) {

        $dir = opendir( $repertoire );          //ouvre le repertoire courant désigné par la variable
        while ( false !== ( $file = readdir( $dir ) ) ) {     //on lit tout et on récupère tous les fichiers dans $file

            if ( !in_array( $file, array('.', '..') ) ) {  //on eleve le parent et le courant '. et ..'

                $page = $file;                  //sort l'extension du fichier
                $page = explode( '.', $page );
                $nb = count( $page );
                $nom_fichier = $page[0];
                for ( $i = 1; $i < $nb - 1; $i++ ) {
                    $nom_fichier .= '.' . $page[$i];
                }
                if ( isset( $page[1] ) ) {
                    $ext_fichier = $page[$nb - 1];
                    if ( !is_file( $file ) ) {
                        $file = '/' . $file;
                    }
                } else {
                    if ( !is_file( $file ) ) {
                        $file = '/' . $file;
                    }            //on rajoute un "/" devant les dossiers pour qu'ils soient triés au début
                    $ext_fichier = '';
                }

                //utile pour exclure certains types de fichiers à ne pas lister
                if ( !in_array( $ext_fichier, array('php', 'html') ) ) {
                    $fichier[] = $file;
                }
            }
        }
    }

    natcasesort( $fichier );                                    //la fonction natcasesort( ) est la fonction de tri standard sauf qu'elle ignore la casse

    if ( empty( $fichier ) ) {
        echo '<tr><td colspan="2"> Aucun fichier disponible</td></tr>';
    }

    foreach ( $fichier as $key => $value ) {
        $link = rawurlencode( $repertoire ) . '/' . rawurlencode( str_replace( '/', '', $value ) );
        $message = '
        <tr>
            <td>
                <input type="checkbox" class="file-checkbox" value="' . $link . '">
            </td>
            <td>
                <a class="link " target="_blank" href="' . $link . '"> ' . $value . ' </a>
            </td>
            <td>
                <a class="btn btn-sm btn-secondary mb-2 mb-md-0" href="' . $link . '" target="_blank"> <i class="fas fa-eye"></i></a>
                <a class="btn btn-sm btn-primary mb-2 mb-md-0" download href="' . $link . '"> <i class="fas fa-download"></i></a>
                <button type="button" class="btn btn-sm btn-danger mb-2 mb-md-0" data-bs-toggle="modal" data-bs-target="#exampleModal' . $key . '">
                    <i class="fas fa-trash"></i>
                </button>
                <div class="modal fade" id="exampleModal' . $key . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Supprimer ce fichier</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Suppression du fichier suivant : <br><b>' . $value . '</b>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <a class="btn btn-danger" href="delete.php?id=' . $link . '"> <i class="fas fa-trash"></i> Supprimer</a>
                        </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        
        ';
        echo $message;
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Documents | Lazare Fortune</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>

<div class="container">
    <h1 class="text-center mt-5 mb-2">
        Mes documents
    </h1>
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="d-flex justify-content-start">
                <a href="telecharger_fichier.php" class="btn btn-primary"> <i class="fas fa-file-upload"></i> Téléverser un fichier </a>
                <button id="deleteSelectedBtn" class="btn btn-danger"> <i class="fas fa-trash"></i> Supprimer les fichiers sélectionnés </button>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-12">
            <?php
            if ( isset( $_SESSION['message'] ) ) {
                ?>
                <div class="alert alert-<?= $_SESSION['error'] ?>">
                    <?php
                    echo $_SESSION['message'];
                    unset( $_SESSION['message'] );
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom du fichier</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
            <tbody>
                    <?php
                    readDirWithBootstrap( './upload_files' );
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
        crossorigin="anonymous"></script>

<script>
    document.getElementById('deleteSelectedBtn').addEventListener('click', function () {
        const checkboxes = document.querySelectorAll('.file-checkbox:checked');
        const alertContainer = document.getElementById('alertContainer');

        if (checkboxes.length === 0) {
            const alert = document.createElement('div');
            alert.className = 'alert alert-warning';
            alert.textContent = "Veuillez sélectionner au moins un fichier.";

            alertContainer.appendChild(alert);

            setTimeout(function () {
                alertContainer.removeChild(alert);
            }, 5000);

            return;
        }

        if (!confirm('Voulez-vous vraiment supprimer les fichiers sélectionnés ?')) {
            return;
        }

        checkboxes.forEach(function (checkbox) {
            const fileUrl = checkbox.value;

            // Supprimez le fichier en envoyant une requête à un fichier PHP dédié
            fetch('delete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    fileUrl: fileUrl
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Supprimez la ligne correspondante du tableau
                        const row = checkbox.closest('tr');
                        row.parentNode.removeChild(row);

                        // Affichez le message de succès
                        const alert = document.createElement('div');
                        alert.className = 'alert alert-success';
                        alert.textContent = data.message;

                        alertContainer.appendChild(alert);

                        setTimeout(function () {
                            alertContainer.removeChild(alert);
                        }, 5000);
                    } else {
                        // Affichez le message d'erreur
                        const alert = document.createElement('div');
                        alert.className = 'alert alert-danger';
                        alert.textContent = data.message;

                        alertContainer.appendChild(alert);

                        setTimeout(function () {
                            alertContainer.removeChild(alert);
                        }, 5000);
                    }
                });
        });
    });

</script>

</body>

</html>