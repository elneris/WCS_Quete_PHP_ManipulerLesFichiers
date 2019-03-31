<?php include('inc/head.php'); ?>
<?php require_once ('functions.php'); ?>
<?php

if (!empty($_POST['submit'])){
    $file = $_GET['edit'];
    $edit = fopen($file, 'w');
    fwrite($edit, $_POST['fileContent']);
    fclose($edit);
}
if(isset($_GET['edit']))
{
    $file = $_GET['edit'];
    $contentFiles = file_get_contents($file);
}
/*Supprimer un fichier*/
if(!empty($_GET['delete']))
{
    unlink($_GET['delete']);
}
/*Supprimer un dossier*/
if(!empty($_GET['deleteDir']))
{
    emptyDirectory($_GET['deleteDir']);
}
?>
    <ul>
<?php directory('files'); ?>
</ul>

    <form method="post" action="">
        <div class="form-group">
            <label for="edit">Edit your files</label>
            <textarea name="fileContent" class="form-control" id="edit" rows="10"><?php if(isset($_GET['edit'])) {echo $contentFiles;} ?></textarea>
        </div>
        <input type="submit" name="submit" value="submit" class="btn btn-primary">
    </form>
<?php include('inc/foot.php'); ?>