<?php

class HTMLPage{

public function head($title){   
    $html= '<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css?">
        <title>'.$title.'</title>
    </head>
    <body>
        <div class="container">
    ';

    return $html;
}

public function foot(){
    return '
    </div>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
    </html>';
}
}