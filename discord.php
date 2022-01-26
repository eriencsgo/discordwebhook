<?php
// Замените YOUR_WEBHOOK_URL на URL который вы получили в процессе создания вебхука
$webhookurl = "https://discord.com/api/webhooks/935809922887720980/RoDlFqve6TmS79oKdq6xGE0lV6Q1Lo6j0Z6FvYThVuS8vhhpjywNujn1Fw2SBbW6oVPZ";

$timestamp = date("c", strtotime("now"));

$json_data = json_encode([
    // Сообщение
    "content" => "Привет Мир! Это текстовое сообщение перед Embed объектом ;)",

    // Ник бота который отправляет сообщение
    "username" => "krasin.space",

    // URL Аватара.
    // Можно использовать аватар загруженный при создании бота, или указанный ниже
    //"avatar_url" => "http://s1.iconbird.com/ico/2013/10/464/w512h5121380984814information.png",

    // Преобразование текста в речь
    "tts" => false,

    // Загрузка файла
    // "file" => "",

    // Массив Embeds
    "embeds" => [
        [
            // Заголовок
            "title" => "Attention BattleCup",

            // Тип Embed Type, не меняем ничего.
            "type" => "rich",

            // Описание
            "description" => "Online CS:GO Championship with $10,000 USD in prize-pool!",

            // Ссылка в заголовке
            "url" => "https://docs.google.com/spreadsheets/d/1Ng9SZMHSkt2FbERUahd2nc6Uqb3rGIRbztZ6cQ92_Bk/edit?usp=sharing",

            // Таймштамп, обязательно в формате ISO8601
            "timestamp" => $timestamp,

            // Цвет границы слева, в HEX
            "color" => hexdec( "3366ff" ),

            // Подпись и аватар в подвале
            "footer" => [
                "text" => "GL & HF",
                "icon_url" => "https://www.clipartmax.com/png/small/87-875850_5-center-of-excellence-icon.png"
            ],

            // Изображение внутри Embed
            "image" => [
                "url" => "https://icon-library.com/images/cd98c766dce843e8a027b0b585b0dbe6_64388.png"
            ],

            // Превью (thumbnail)
            //"thumbnail" => [
            //    "url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=400"
            //],

            // Автор
            "author" => [
                "name" => "Staff",
                "url" => "https://drive.google.com/"
            ],

            // Дополнительные поля
            "fields" => [
                // Field 1
                [
                    "name" => "Поле #1",
                    "value" => "Значение #1",
                    "inline" => false
                ],
                // Field 2
                [
                    "name" => "Поле #2",
                    "value" => "Значение #2",
                    "inline" => true
                ]
                // И т.д...
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
// Если что-то не работает, раскомментируйте строку ниже, и почитайте в чём беда :)
// echo $response;
curl_close( $ch );
