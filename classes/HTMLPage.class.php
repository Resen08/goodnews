<?php

class HTMLPage{

public function head($title){   
    $html= '<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css?'.rand().'">
        <title>'.$title.'</title>
    </head>
    <body>
    ';

    return $html;
}

public function foot(){
    return '
    </body>
    </html>';
}
}