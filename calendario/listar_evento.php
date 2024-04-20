<?php

// Incluir o arquivo com a conexão com banco de dados
include_once './conexao.php';

// QUERY para recuperar os eventos
$query_events = "SELECT id, id_usuario, title, color, start, end, lab, turma, materia, material
                FROM events";

// Prepara a QUERY
$result_events = $conn->prepare($query_events);

// Executar a QUERY
$result_events->execute();

// Criar o array que recebe os eventos
$eventos = [];

// Percorrer a lista de registros retornado do banco de dados
while($row_events = $result_events->fetch(PDO::FETCH_ASSOC)){

    // Extrair o array
    extract($row_events);

    $eventos[] = [
        'id' => $id,
        'id_usuario' => $id_usuario,
        'title' => $title,
        'color' => $color,
        'start' => $start,
        'end' => $end,
        'lab' => $lab,
        'turma' => $turma,
        'materia' => $materia,
        'material' => $material,
    ];
}

echo json_encode($eventos);