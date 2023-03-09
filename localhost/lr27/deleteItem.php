<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $contents = file_get_contents("basket.txt");
        $contents = str_replace($id, "", $contents);
        file_put_contents('basket.txt', $contents);

        header('Location: basket.php');
    }
?>