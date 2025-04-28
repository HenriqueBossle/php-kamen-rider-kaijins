<?php

class Kaijin{
    public ?string $name;
    public ?string $type;
    public ?string $series;

    public function __construct($name, $type, $series){
        $this->name = $name;
        $this->type = $type;
        $this->series = $series;
    }

    public function createDatabankConnection(){
    $hostname = "127.0.0.1";
    $username = "root";
    $password = "12345";
    $databank = "kaijin";

    $mysqli = new mysqli($hostname, $username, $password, $databank);
    if ($mysqli->connect_errno) {
        echo "Falha: " . $mysqli -> connect_error;
        exit();
        }
        return $mysqli;
    }

    public function salvar()
    {
        $sql = "INSERT into kaijinTable (name, type, series) values ('{$this->name}', '{$this->type}', '{$this->series}')";

        $conn = $this->createDatabankConnection();
        if($conn->query($sql) === TRUE) {
            echo "Registro salvo com sucesso";
        } else {
            echo "Erro ao salvar no banco de dados";
        }
    }

   public function listar(){
        $conn = $this->createDatabankConnection();

        $result = mysqli_query($conn, "SELECT * FROM kaijinTable");

        $arrayKaijins = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $kaijin = [];
            $kaijin["id"] = $row["id"]; 
            $kaijin["name"] = $row["name"];
            $kaijin["type"] = $row["type"];
            $kaijin["series"] = $row["series"];
            $arrayKaijins[] = $kaijin;
        }

        return $arrayKaijins;
    }


    public function buscarPeloId(int $id)
    {
        
        $conn = $this->createDatabankConnection();
        $result = mysqli_query($conn, "SELECT * FROM kaijinTable where id = {$id}");

        return $result;
    }

    public function atualizar($id, $name, $type, $series){
    $conn = $this->createDatabankConnection();
    $sql = "UPDATE kaijinTable SET name = '{$name}', type = '{$type}', series = '{$series}' WHERE id = '{$id}'";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

    public function deletar(int $id)
    {
        $conn = $this->createDatabankConnection();
        $result = mysqli_query($conn, "DELETE FROM kaijinTable where id = {$id}");

    }

}

