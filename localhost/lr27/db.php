<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
function getAllItems(){
   /* $server = '127.0.0.1:3306';
    $database = 'store';
    $username = 'root';
    $password = 'root';*/
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'store');

/*
 * Подключаемся к базе данных с помощью функции mysqli_connect()
 */


    $conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    // Проверяем соединение
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `Товары`";
    $result = mysqli_query($conn, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
    }

    mysqli_close($conn);
    return $result;
} 

function getItems($search){
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'store');



    $conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    // Проверяем соединение
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `Товары` WHERE `name` LIKE '$search'";
    $result = mysqli_query($conn, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
    }

    mysqli_close($conn);
    return $result;
}

function AddNewTovar($name,$txt,$count,$cost){
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'store');



    $conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    // Проверяем соединение
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO `Товары`(`name`, `text`, `count`, `cost`) VALUES ('$name','$txt','$count','$cost')";
    $result = mysqli_query($conn, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
    }

    mysqli_close($conn);
    return true;
}

function EditTovar(){
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'store');



    $conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    // Проверяем соединение
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE `Товары` set `cost`=`cost`*2";
    $result = mysqli_query($conn, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
    }

    mysqli_close($conn);
    return true;
}

function DeleteTovar(){
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'store');



    $conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    // Проверяем соединение
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM `Товары` WHERE `cost`<20";
    $result = mysqli_query($conn, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
    }

    mysqli_close($conn);
    return true;
}

function getItemById($id){
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'store');
    
  
    
        $conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    // Проверяем соединение
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `Товары` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
    }

    mysqli_close($conn);
    return $result;
}

function getItem($id){
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'store');
    
  
    
    
        $conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    // Проверяем соединение
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `Товары` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
    }

    mysqli_close($conn);
    return $result;
}

?>