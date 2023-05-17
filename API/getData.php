<?php

### ABRE O ARQUIVO CSV EM MODO DE LEITURA ###
$fp = fopen("users.csv", "r");

### CRIA UM ARRAY VAZIO ###
$data = [];

### LÊ O ARQUIVO CSV E ARMAZENA EM UM ARRAY ASSOCIATIVO ###
while (($row = fgetcsv($fp)) !== false) {
    $data[] = [
        'username' => $row[0],
        'password' => $row[1],
        'name' => $row[2],
    ];
}

### TRANSFORMA O ARRAY ASSOCIATIVO EM JSON ###
echo json_encode($data);
