<?php
header('Content-Type: application/json');
header('Cache-Control: max-age=60');
header('foo: bar');


    $data = [
        "name" => "Tommy",
        "time" => time()
    ];
    
    echo json_encode($data);
?>


