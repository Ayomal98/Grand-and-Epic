<?php include("../../config/connection.php");
$select = mysqli_query($con, "SELECT * FROM meals WHERE Meal_Type='Breakfast'");
$mealsName = array();
$mealsPrice = array();
if (mysqli_num_rows($select) > 0) {
    while ($row = mysqli_fetch_assoc($select)) {
        array_push($mealsName, $row['Meals_Name']); //pushing the values to the array
        array_push($mealsPrice, (int)$row['Price']);
    }
}
$data = json_encode($mealsName); //encode the value into json format
$dataPrice = json_encode($mealsPrice); //encode the value into json format
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal-Price Analysis</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        let myChart = document.getElementById('myChart').getContext('2d');
        let massChart = new Chart(myChart, {
            type: 'bar',
            data: {
                labels: <?php echo $data ?>,
                datasets: [{
                    label: 'Meal Price',
                    data: <?php echo $dataPrice ?>
                }]
            },
            options: {
                backgroundColor: 'Green'
            }

        })
    </script>
</body>

</html>