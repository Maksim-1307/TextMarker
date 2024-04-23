<?php

sleep(5);

session_start();

$response = [
    'content' => "",
    'found' => [],
    'download_link' => "https://info-marker.ru/user_cash_1/Тест 3.docx"
];

foreach ($_FILES as $file) {
    $response['content'] .= ("file name is: " . $file['name'] . "<br>");
}
$response['content'] .= "<a href='https://google.com'>some link</a><p style='color: green'>some paragraph</p>";
$response['found'] = [
    [
        "name" => "Штеванов Александр Андреевич",
        "count" => 3,
        "color" => "#c2f970"
    ],
    [
        "name" => "Фонд Борьбы с Коррупцией (ФБК)",
        "count" => 12,
        "color" => "#EDFF21"
    ],
    [
        "name" => "Free Buryatia Foundation (Фонд «Свободная бурятия»). США",
        "count" => 6,
        "color" => "#EFA94A"
    ],
    [
        "name" => "Бортник Егор михаилович",
        "count" => 12,
        "color" => "#98a6d4"
    ],
    [
        "name" => "Фонд развития книжнои культуры «Иркутский СОЮЗ БОИОЛИОФИЛОВ»",
        "count" => 8,
        "color" => "#d3fcd5"
    ]
];

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

echo json_encode($response);

