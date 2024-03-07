<?php

$name = $_POST['name'];
if (empty($name)) {
    echo 'Hãy nhập tên';
    die;
}

function getPrize() {
    $prizes = [
        '500k' => 6,
        '200k' => 30,
        '100k' => 50,
        '150k' => 24
    ];

    $result = '';
    $rand = rand(1, 100);

    $cumulative = 0;
    foreach ($prizes as $prize => $probability) {
        $cumulative += $probability;
        if ($rand <= $cumulative) {
            $result = $prize;
            break;
        }
    }

    return $result;
}

// Trả về kết quả
$price = getPrize();

file_put_contents('result.txt', date("d/m/Y H:i:s").': '. $name . ' - ' . $price . PHP_EOL, FILE_APPEND);
echo $price;
