<?php
$result = [];
$id     = $_POST['id'];
$query  = $pdo->GetWhere('tb_atribut', 'id_atribut', $id);
$row    = $query->fetch(PDO::FETCH_OBJ);

$result = [
    "id_atribut" => $row->id_atribut,
    "atribut"    => $row->atribut,
];

echo json_encode($result);
