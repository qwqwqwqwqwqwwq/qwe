<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Таблица умножения</title>
    <style>
        table { border-collapse: collapse; }
        td, th { border: 1px solid #000; padding: 5px; text-align: center; }
        th { background-color: #ddd; }
    </style>
</head>
<body>
    <h2>Таблица умножения от 0 до 10</h2>
    <table>
        <tr>
            <th>x</th>
            <?php
            for ($i = 0; $i <= 10; $i++) {
                echo "<th>$i</th>";
            }
            ?>
        </tr>
        <?php
        for ($i = 0; $i <= 10; $i++) {
            echo "<tr><th>$i</th>";
            for ($j = 0; $j <= 10; $j++) {
                echo "<td>" . ($i * $j) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
