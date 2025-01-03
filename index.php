<?php

$year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');
$month = isset($_GET['month']) ? intval($_GET['month']) : date('m');




$days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);


$month_name = date('F', mktime(0, 0, 0, $month, 1, $year));
$start_day_of_week = date('w', mktime(0, 0, 0, $month, 1, $year));


$departments = [
    "Account" => ["Cillian Harvey", "Dylan Bradley"],
    "Admin" => ["Cameron Richards", "Hamish Lee", "Mateo Burns", "Reginald Lowe", "Charles Stewart"]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Roster</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Roster for <?php echo $month_name . " " . $year; ?></h1>


<form method="get">
    <label for="year">Year:</label>
    <input type="number" id="year" name="year" value="<?php echo $year; ?>" required>
    <label for="month">Month:</label>
    <input type="number" id="month" name="month" min="1" max="12" value="<?php echo $month; ?>" required>
    <button type="submit">Generate Roster</button>
</form>


<table>
    <thead>
        <tr>
            <th>Staff</th>
            <?php for ($day = 1; $day <= $days_in_month; $day++): ?>
                <th><?php echo $day; ?><br><?php echo date('D', mktime(0, 0, 0, $month, $day, $year)); ?></th>
            <?php endfor; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($departments as $department => $staff): ?>
            -
            <tr>
                <td colspan="<?php echo $days_in_month + 1; ?>" style="background-color: #ddd; text-align: left;">
                    <?php echo $department; ?>
                </td>
            </tr>
            
            <?php foreach ($staff as $member): ?>
                <tr>
                    <td><?php echo $member; ?></td>
                    <?php for ($day = 1; $day <= $days_in_month; $day++): ?>
                        <td></td> 
                    <?php endfor; ?>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
