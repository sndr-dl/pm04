<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список водителей</title>
</head>
<body>
    <h1>Список водителей</h1>
    <ul>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "taxi";

        // Подключение к базе данных
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Проверка соединения
        if ($conn->connect_error) {
            die("Ошибка подключения к базе данных: " . $conn->connect_error);
        }

        // Выборка данных из таблицы drivers
        $sql = "SELECT * FROM drivers";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Вывод данных каждого водителя в виде списка
            while($row = $result->fetch_assoc()) {
                echo "<li>ID: " . $row["id"]. " - Имя водителя: " . $row["name"]. "</li>";
            }
        } else {
            echo "<li>Нет данных о водителях</li>";
        }

        // Закрытие соединения с базой данных
        $conn->close();
        ?>
    </ul>
</body>
</html>