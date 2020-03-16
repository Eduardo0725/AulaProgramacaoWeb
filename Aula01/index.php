<?php
include_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <script src="./bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                $conn = open_database();
                $table = "sistema_usuarios";
                $sql = "SELECT * FROM " . $table;
                $result = $conn->query($sql);


                $usuarios = array();
                if($result){
                if ($result->num_rows > 0) {
                    $usuarios = $result->fetch_all();

                ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $linhas = $conn->query($sql)->num_rows;
                            for ($i = 0; $i <= $linhas - 1; $i++) {
                            ?>
                                <tr>
                                    <td><?php echo $i + 1 ?></td>
                                    <td><?php echo $usuarios[$i][1] ?></td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "Nenhum dado encontrado";
                        }
                    }else{
                        echo "Erro ao conectar ao banco de dados.";
                    }
                        ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    <style>
        th,td{
            text-align: center;
        }
    </style>
</body>

</html>