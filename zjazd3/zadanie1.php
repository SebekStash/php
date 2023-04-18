<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="looks.css">
    <title>zadanie-1</title>
</head>
<body>
    <h1>zadanie-1</h1>
    <form name="formularz" method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="zatwierdz" value="Wyślij plik">
</form>
<?php
    function flipFile($file, $fileDescriptor){
        $array = file($file);
        for($i = count($array) -1; $i >= 0; $i--){
            if(!fwrite($fileDescriptor, $array[$i])){
                exit("Cannot write to file");
            }
            echo $array[$i] . '<br>';
        }
    }

    function printFile($fileDescriptor){
        while(!feof($fileDescriptor)){
            echo fgets($fileDescriptor)."<br>";
        }
    }
    
    if(isset($_POST["zatwierdz"])){
        if(!isset($_FILES["file"])){
            exit();
        }
        
        $file = $_FILES["file"]["tmp_name"];
        if(!$fileDescriptor = fopen($file, "r+")){
            exit("Can not ope the file");
        }
            // printFile($fileDescriptor);
            // rewind($fileDescriptor);
            // flipFile($file, $fileDescriptor);
            fwrite($fileDescriptor, "A");
            printFile($fileDescriptor);
    }

?>
</body>
</html>
<!-- http://szuflandia.pjwstk.edu.pl/~s25535/zadania-wprg/zjazd3/zadanie-1.php -->
