<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="looks.css">
    <title>zadanie-2</title>
</head>
<body>
    <h1>zadanie-2</h1>
<?php
    
    if(isset($_POST["zatwierdz"])){
        if(!isset($_FILES["file"])){
            exit();
        }

        if(!$fileDescriptor = fopen("./licznik.txt", "a+")){
            exit("Can not ope the file");
        }
            $numberOfvisits = fgets($fileDescriptor);
            $numberOfvisits++;

            fwrite($fileDescriptor, $numberOfvisits);
            rewind($fileDescriptor);
            echo "Visits = ".fgets($fileDescriptor);
    }


?>
</body>
</html>
<!-- http://szuflandia.pjwstk.edu.pl/~s25535/zadania-wprg/zjazd3/zadanie-2.php -->
