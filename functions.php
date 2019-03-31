<?php

function directory($value)
{
    $directories = scandir($value);

    foreach ($directories as $directory) {
        if ($directory != '.' && $directory != '..' && is_dir($value . DIRECTORY_SEPARATOR . $directory)) {
            echo '<li>Directory : ' . $directory .
                ' <a href="index.php?deleteDir='.$value . DIRECTORY_SEPARATOR . $directory .'">Delete</a></li><br>';
            directory($value . DIRECTORY_SEPARATOR . $directory);
        } elseif (!is_dir($value . DIRECTORY_SEPARATOR . $directory)) {
            echo  '<ul><li><p>Files : ' . $directory . '<br></p></li></ul>';
            if(strpos($directory, 'jpg'))
            {
                echo '<a href="index.php?delete='.$value . DIRECTORY_SEPARATOR . $directory .'">Delete</a><br>';
            }else{
                echo '<a href="index.php?edit='. $value . DIRECTORY_SEPARATOR . $directory . '">Edit</a> <a href="index.php?delete='.$value . DIRECTORY_SEPARATOR . $directory .'">Delete</a><br>';
            }        }
    }
}

// vérifier si le dossier est vide avant de supprimer

function emptyDirectory($value)
{
    $filesFind = 0;
    if (is_dir($value)) {
        if ($count = opendir($value)) {
            while (($file = readdir($count)) !== false && $filesFind == 0) {
                if ($file != "." && $file != "..") {
                    $filesFind = 1;
                }
            }
            closedir($count);
        }
    }

    if ($filesFind == 0) {
        rmdir($value);
    } else {
        echo "Le répertoire contient des fichiers";
    }
}
