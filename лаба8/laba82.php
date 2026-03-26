<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Календарь</title>
    <style>
        table { border-collapse: collapse; width: 300px; }
        td, th { border: 1px solid #000; padding: 5px; text-align: center; }
        th { background-color: #ddd; }
        .weekend { background-color: #fdd; }
        .holiday { background-color: #dfd; }
    </style>
</head>
<body>
    <h2>Календарь месяца</h2>
    <?php
    function drawCalendar($month = null, $year = null) {
        if (!$month) $month = date('n');
        if (!$year) $year = date('Y');

        $holidays = [
            "$year-01-01", "$year-01-07", "$year-05-01", "$year-05-09", "$year-12-25"
        ];

        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $firstDay = date('N', strtotime("$year-$month-01")); // 1 = Пн ... 7 = Вс

        echo "<table>";
        echo "<tr><th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th>Сб</th><th>Вс</th></tr>";
        echo "<tr>";

        for ($i = 1; $i < $firstDay; $i++) {
            echo "<td></td>";
        }

        for ($day = 1; $day <= $daysInMonth; $day++, $firstDay++) {
            $currentDate = "$year-" . str_pad($month,2,'0',STR_PAD_LEFT) . "-" . str_pad($day,2,'0',STR_PAD_LEFT);
            $class = '';
            if ($firstDay % 7 == 6 || $firstDay % 7 == 0) $class = 'weekend';
            if (in_array($currentDate, $holidays)) $class = 'holiday';
            echo "<td class='$class'>$day</td>";

            if ($firstDay % 7 == 0) echo "</tr><tr>";
        }

        $remaining = 7 - ($firstDay - 1) % 7;
        if ($remaining < 7) {
            for ($i = 0; $i < $remaining; $i++) echo "<td></td>";
        }

        echo "</tr></table>";
    }

    drawCalendar(); 
    ?>
</body>
</html>
