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

?>   
<div class="container mt-5">
    <h1>Adicionar monstros de Kamen Rider</h1>
    <a href="index.php" class="btn btn-primary">Ver todos</a>
 
    <form action="index.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nome: </label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        
        <div class="mb-3">      
            <label for="type" class="form-label">Tipo: </label>
            <input type="text" class="form-control" name="type" id="type">
        </div>
 
        <div class="mb-3">
            <label for="series" class="form-label">Serie: </label>
            <input type="text" class="form-control" name=series id="series"> 
        </div>
       
        
        <button type="submit" class="btn btn-success">Adicionar monstro</button>
    </form>
    </div>
</body>
</html>
