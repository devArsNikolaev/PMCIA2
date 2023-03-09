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
            <h2>Список товаров</h2>
            <br>
            <form method="POST">
                <input type="text" name="search"></input>
                <input type="submit" value="Поиск">
            </form>

            <br>

            <form method="GET">
                <input type="submit" value="Все товары">
            </form>
            <content>
                <?php
                    include 'db.php';

                    if(isset($_POST['search'])){
                        $search = $_POST['search'];

                        $result = getItems($search);
                        while ($row = mysqli_fetch_array($result)) {
                            echo '
                            <div class="item">
                                    <h3>' . $row['name'] . '</h3>
                                    <p>' . $row['text'] . '</p>
                                    <p>' . $row['cost'] . ' руб.</p>
                                    <a href="item.php?id='. $row[`id`] .'">Перейти</a>
                            </div>';
                        }
                    }
                    else{
                        if(isset($_GET)){
                            $result = getAllItems();
                            while ($row = mysqli_fetch_array($result)) {
                                echo '
                                <div class="item">
                                        <h3>' . $row['name'] . '</h3>
                                        <p>' . $row['text'] . '</p>
                                        <p>' . $row['cost'] . ' руб</p>
                                        <a href="item.php?id='. $row['id'] .'">Перейти</a>
                                </div>';
                            }
                        }
                    }
                ?>
            </content>
            <form method="POST">
                <p>Введите имя нового товара: <input type="text" name="name"></input></p>
                <p>Введите его описание: <input type="text" name="txt"></input></p>
                <p>Введите его количество: <input type="text" name="count"></input></p>
                <p>Введите цену: <input type="text" name="cost"></input></p>
                <input type="submit" value="Добавить">
            </form>
            <content>
                <?php
                    if(isset($_POST['name']) && isset($_POST['txt']) && isset($_POST['count']) && isset($_POST['cost'])){
                        $name = $_POST['name'];
                        $txt = $_POST['txt'];
                        $count = $_POST['count'];
                        $cost = $_POST['cost'];

                        if(AddNewTovar($name,$txt,$count,$cost)){
                            echo "<script>alert('Добавление прошло успешно')</script>";
                        }
                    }
                ?>
            </content>
            <form method="POST">
                <input type="submit" name="edit" value="Редактирование (увеличить цену товаров в 2 раза)" />
            </form>
            <content>
                <?php
                    if(isset($_POST['edit'])){

                        if(EditTovar()){
                            echo "<script>alert('Редактирование прошло успешно')</script>";
                        }
                    }
                ?>
            </content>
            <form method="POST">
                <input type="submit" name="del" value="Удаление (где цена товара меньше 20)" />
            </form>
            <content>
                <?php
                    if(isset($_POST['del'])){

                        if(DeleteTovar()){
                            echo "<script>alert('Удаление прошло успешно')</script>";
                        }
                    }
                ?>
            </content>
        </div>
    </body>
</html>