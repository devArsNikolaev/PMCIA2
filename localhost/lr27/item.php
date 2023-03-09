<!DOCTYPE html>
<html>
    <head>
        <title>Store</title>
        <meta charset="utf-8" />
        <link href="index.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="wrapper">
            <header>
                <a href="index.php">Главная</a>
            </header>
            <hr/>
            <content>
                <?php
                    include 'db.php';

                    $result = getItem($_GET['id']);
                    
                    $row = mysqli_fetch_array($result);

                    if(!isset($row)){
                        echo "Ошибка";
                    }
                    else{
                        echo 
                        '<div>
                            <h1>' . $row['name'] . '</h1>
                            <p>Описание товара: ' . $row['text'] . '</p>
                            <p>Количество на складе: '. $row['count'] .'</p>
                            <p>Стоимость: ' . $row['cost'] . ' руб</p>
                        </div>';
                    }
                ?>
            </content>
    </body>
</html>