<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamen Rider Kaijins</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>

<?php
include ("c:/xampp/htdocs/crudConnectionTest/web/model/kaijin.php");

$kaijin = new Kaijin("", "", ""); // cria um objeto Kaijin vazio

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $name = $_POST['name'];
        $type = $_POST['type'];
        $series = $_POST['series'];

        if ($kaijin->atualizar($id, $name, $type, $series)) {
            echo "<div class='alert alert-success'>Kaijin atualizado com sucesso!</div>";
            echo "<a href='http://localhost/crudConnectionTest/web/view/index.php' class='btn btn-primary'>Voltar para a lista</a>";
            exit;
        } else {
            echo "<div class='alert alert-danger'>Erro ao atualizar Kaijin.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>ID não especificado.</div>";
        exit;
    }
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $resultadoBusca = $kaijin->buscarPeloId($id);

        if ($resultadoBusca && $resultadoBusca->num_rows > 0) {
            $result = mysqli_fetch_assoc($resultadoBusca);
        } else {
            echo "<div class='alert alert-danger'>Kaijin não encontrado.</div>";
            exit;
        }
    } else {
        echo "<div class='alert alert-warning'>ID não especificado.</div>";
        exit;
    }
}
?>

<div class="container mt-5">
    <h1>Editar monstro de Kamen Rider</h1>
    <a href="index.php" class="btn btn-primary">Ver todos</a>
    <form action="edit.php?id=<?= $id ?>" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nome: </label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($result["name"]); ?>" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipo: </label>
            <input type="text" class="form-control" name="type" id="type" value="<?php echo htmlspecialchars($result['type']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="series" class="form-label">Série: </label>
            <input type="text" class="form-control" name="series" id="series" value="<?php echo htmlspecialchars($result['series']); ?>" required> 
        </div>

        <button type="submit" class="btn btn-success">Salvar alterações</button>
    </form>
</div>

</body>
</html>
