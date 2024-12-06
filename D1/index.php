<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Calendar</title>
</head>
<body>
    <h2><?php echo date('F Y'); ?></h2>
    <table>
        <?php
        $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        foreach ($days as $day) {
            echo "<th>$day</th>";
        }

        $firstDay = date('w', strtotime(date('Y-m-01')));
        $totalDays = date('t');
        $today = date('j');

        echo '<tr>';
        for ($i = 0; $i < $firstDay; $i++) {
            echo '<td></td>';
        }

        for ($day = 1; $day <= $totalDays; $day++) {
            if (($day + $firstDay - 1) % 7 == 0) {
                echo '</tr><tr>';
            }
            echo $day == $today ? "<td><strong>$day</strong></td>" : "<td>$day</td>";
        }
        echo '</tr>';
        ?>
    </table>
</body>
</html>
