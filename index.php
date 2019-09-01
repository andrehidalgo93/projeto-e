<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/style/style.css">

    <title>Projeto-E</title>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand logo" href="index.php">PROJETO-E</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?op=opcao&pg=cadastrar">Cadastrar Pessoas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?op=opcao&pg=listar">Listar Pessoas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <?php
                $op = $pg = "";

                if ( isset( $_GET["op"] ) ) {
                    $op = trim ( $_GET["op"] );
                }
                if ( isset( $_GET["pg"] ) ) {
                    $pg = trim ( $_GET["pg"] );
                }
                
                if ( empty ( $pg ) ) {
                    $pagina = "home.php";
                } else {
                    $pagina = $op."/".$pg.".php";
                }

                if ( file_exists ( $pagina ) ) {
                    include $pagina;
                } else {
                    include "notFound.php";
                }
            ?>
        </div>
    </main>

    <footer>
        
    </footer>


    <!-- SCRIPTS-JS -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/bootstrap-4.3.1/js/popper.min.js"></script>
    <script src="assets/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.mask.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script>
    <script src="assets/js/messages_pt_BR.min.js"></script>
    <script src="assets/js/buscaCep.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="assets/js/validacao.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

</body>
</html>