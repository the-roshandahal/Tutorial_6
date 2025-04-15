<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill Calculator</title>
</head>
<body>
<div id="page-wrap">
    <h1>Php - Calculate Electricity Bill</h1>
    <form action="" method="post" id="quiz-form">
        <input type="number" name="units" id="units" placeholder="Please enter Units" />
        <input type="submit" name="unit-submit" id="unit-submit" value="Submit" />
    </form>

    <?php
    $result_str = "";

    if (isset($_POST['unit-submit'])) {
        $units = $_POST['units'];
        if (!empty($units)) {
            if(is_numeric($units)){
                $result = calculate_bill($units);
                $result_str = "Total bill for $units units is: " . number_format($result, 2);
            }
            else{
                $result_str = "Please enter the number only.";

            }
        } else {
            $result_str = "Please enter the units.";
        }
    }

    function calculate_bill($units) {
        $unit_first = 3.50;
        $unit_second = 4.00;
        $unit_third = 5.20;
        $unit_forth = 6.50;

        $bill = 0;

        if ($units <= 50) {
            $bill = $units * $unit_first;
        } elseif ($units <= 150) {
            $bill = (50 * $unit_first) + (($units - 50) * $unit_second);
        } elseif ($units <= 250) {
            $bill = (50 * $unit_first) + (100 * $unit_second) + (($units - 150) * $unit_third);
        } else {
            $bill = (50 * $unit_first) + (100 * $unit_second) + (100 * $unit_third) + (($units - 250) * $unit_forth);
        }

        return $bill;
    }

    if ($result_str != "") {
        echo "<h3>$result_str</h3>";
    }
    ?>
</div>
</body>
</html>
