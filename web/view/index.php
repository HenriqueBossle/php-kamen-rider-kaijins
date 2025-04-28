<?php

include("c:/xampp/htdocs/crudConnectionTest/web/model/kaijin.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $type = $_POST["type"];
    $series = $_POST["series"];

    $novoKaijin = new Kaijin($name, $type, $series);
    $novoKaijin->salvar();

    header("Location: index.php");
    exit();
}
    $kaijinModel = new Kaijin("", "", "");
    $kaijins = $kaijinModel->listar();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de monstros de Kamen Rider</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    
    <h1>Lista de monstros de Kamen Rider</h1>
    <hr>
    <main>
        <?php if(count($kaijins) > 0): ?>
            <?php foreach($kaijins as $kaijin): ?>
                
                <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($kaijin["name"]);?> </h5>
                    <p class="card-text">Tipo: <strong> <?php echo htmlspecialchars($kaijin["type"]);?></strong> </p>
                    <p class="card-text">Serie: <strong> <?php echo htmlspecialchars($kaijin["series"]);?></strong> </p>
                    <a href="edit.php?id=<?= $kaijin['id'] ?>" class="btn btn-primary">Editar</a>
                    <a href="delete.php?=<?= $kaijin['id'] ?>" class="btn btn-danger">Deletar</a>
                </div>
                </div>
        
        <?php endforeach ?>
        <?php else: ?>
            <p>Nenhum monstro encontrado.</p>
        <?php endif; 
        
    
        ?>
    </main>

</body>
</html>