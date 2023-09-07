<?php

// HOTEL ARRAY 

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],

    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],

    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],

    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],

    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Stampare tutti i nostri hotel con tutti i dati disponibili.">
    <title>PHP Hotel</title>

    <!-- Framework bootstrap css  -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Framework bootstrap js  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    <!-- Custom css  -->
    
    <link rel="stylesheet" href="./css/style.css">

</head>


<body>

    <div class="text-center">
        <h1 class="mt-5  text-danger">HOTELS</h1>
    </div>

    <div class="container mt-5">

        <ul class="hotels-list">

            <?php foreach ($hotels as $hotel) { ?>

                <li> <?php echo $hotel["name"] ?> </li>
                <li> <?php echo $hotel["description"] ?> </li>
                <li> <?php echo ($hotel["parking"] ? "Yes" : "No") ?> </li>
                <li> <?php echo $hotel["vote"] ?> </li>
                <li> <?php echo $hotel["distance_to_center"] ?> </li>
                <br>
                <br>

            <?php } ?>

        </ul>

    </div>

    <script src="js/main.js"></script>

</body>

</html>