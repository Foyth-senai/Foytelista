<?php 
include("conecta.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="icon" href="../img/foytelista.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Foytelista</title>
</head>
<body>


<main id="main">

    <section id="cabecalho" class="w-100">   
        <div class="container-fluid cabecalho w-100">
            <div class="row">
                <div class="col-3">logoaqui</div>
                <div class="col-9"></div>
            </div>
        </div>
    </section>

    <section id="titulo" class="w-100">
        <div id="titulo" class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center mt-5">
                    Foytelista
                </div>
            </div>
        </div>
    </section>

    <section id="cadastro" class="w-100">
        <div id="form" class="container">
            <form action="index.php" method="post">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center mt-3">

                            <input type="text" placeholder="Insira o nome" name="nome">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center mt-3">
                            <input type="email" placeholder="Insira o Email" name="email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center mt-3">
                            <input type="tel" placeholder="Insira o telefone" name="telefone">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center mt-3">
                            <button name="confirma" type="subimt">Confirmar</button>
                    </div>
                </div>
            </form>
            
            <?php


            if(isset($_POST["confirma"]) )
            {
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $telefone = $_POST["telefone"];
                $comando = $pdo->prepare("INSERT INTO `lista` (`nome`, `email`, `telefone`) VALUE('$nome', '$email', '$telefone')");
                $resultado = $comando->execute();
                header("Location: index.php");
            }
            ?>
        </div>
    </section>

    <section id="table" class="w-100 mt-5">
        <div class="conainer">
            <div class="row">
                <div class="col-12 tabela">
                    <?php 
                        $comando = $pdo->prepare("SELECT * FROM lista");
                        $resultado = $comando->execute();
           
                        while ($linhas = $comando->fetch() )
                        {
                            $nome = $linhas["nome"];
                            $email = $linhas["email"];
                            $telefone = $linhas["telefone"];
                            $id = $linhas["id_pessoa"];
                            
                            echo ("
                            <table class='w-100 mb-2'>
                                <tr>
                                    <td>$nome</td>
                                </tr>
                                <tr>
                                    <td>$email</td>
                                </tr>
                                <tr>
                                    <td>$telefone</td>
                                </tr>
                                <tr>
                                    <td><button onclick=\"Deletar($id);\"> Excluir </button> <button>Alterar</button></td>
                                </tr>
                                </form>
                            </table>"
                                 ); 

                        } ?>
                </div>
            </div>
        </div>
    </section>

</main>

</body>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../js/script.js"></script>
</html>
