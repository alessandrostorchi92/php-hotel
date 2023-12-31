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

// Creo una variabile per ciclare dinamicamente la lista delle chiavi dell'array.
$column_names = array_keys($hotels[0]);

//Creo un array vuoto per gli hotel filtrati.
$filtered_hotels = [];

$filter_vote = isset($_GET['vote']) && trim($_GET['vote']) !== "" ? intval($_GET['vote']) : null;
$filter_parking = isset($_GET['parking']) && trim($_GET['parking']) !== "" ? $_GET['parking'] === 'true' : null;

// Mi assicuro che i valori di queste due variabili siano null 

// var_dump($filter_vote);
// var_dump($filter_parking);

// L'operazione dei filtri la faccio a monte per semplificare e rendere leggibile il codice.
// Se non ci sono filtri, inserisco tutti hotel nell'array filtrato.

if ($filter_vote === null && $filter_parking === null) {
    $filtered_hotels = $hotels;
} else {
    // Se ci sono filtri, invece dobbiamo gestirne i casi.
    foreach ($hotels as $hotel) {
        $add_filter = true;

        // Devo decidere quali hotels devo pushare dentro $filtered_hotels = [] 
        if (isset($filter_vote) && isset($filter_parking)) {
            $add_filter = ($hotel['vote'] >= $filter_vote && $hotel['parking'] == $filter_parking);
        } elseif (isset($filter_vote)) {
            $add_filter = ($hotel['vote'] >= $filter_vote);
        } else if (isset($filter_parking)) {
            $add_filter = ($hotel['parking'] == $filter_parking);
        }

        // Aggiungo l'elemento all'array filtrato solo se rispetta i filtri
        if ($add_filter) {
            $filtered_hotels[] = $hotel;
        }
    }
}

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

        <ul class="hotels-list text-center">

            <?php foreach ($hotels as $hotel) { ?>

                <li> <?php echo $hotel["name"] ?> </li>
                <li> <?php echo $hotel["description"] ?> </li>
                <li> <?php echo ($hotel["parking"] ? "Yes" : "No") ?> </li>
                <li> <?php echo $hotel["vote"] ?> </li>
                <li> <?php echo $hotel["distance_to_center"] ?> </li>
                <br>

            <?php } ?>

        </ul>


        <div class="container mt-3">

            <form action="index.php" method="GET">
                <div class="row align-items-center">

                    <!-- Aggiungo un form, che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio. -->

                    <div class="col-6 text-center">

                        <label for="parking" class="mb-2 w-100">
                            <h2>Parking</h2>
                        </label>

                        <select name="parking" class="form-select" id="parking">
                            <option value="null" hidden></option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>

                    </div>

                    <div class="col-6 text-center">

                        <!-- Aggiungo un altro form che permetta di filtrare gli hotel per voto  -->

                        <label for="vote" class="mb-2 w-100">
                            <h2>Vote</h2>
                        </label>

                        <select name="vote" class="form-select" id="vote">
                            <option value="null" hidden></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

                    </div>
                </div>


                <div class="container text-center">
                    <button type="submit" name="submit" class="btn btn-outline-danger btn-lg mt-5">Filtra</button>
                </div>

            </form>

        </div>

        <div class="container mt-5">

            <table class="table table-dark table-hover">

                <thead>


                    <tr>
                        <?php foreach ($column_names as $column_name) { ?>
                            <th scope="col"><?php echo $column_name ?></th>
                        <?php } ?>
                    </tr>

                </thead>

                <tbody>

                    <?php
                    foreach ($filtered_hotels as $hotel) {
                    ?>

                        <tr>
                            <th scope="row"> <?php echo $hotel["name"] ?></th>
                            <td> <?php echo $hotel["description"] ?> </td>
                            <td> <?php echo ($hotel["parking"] ? "Yes" : "No") ?> </td>
                            <td> <?php echo $hotel["vote"] ?> </td>
                            <td> <?php echo $hotel["distance_to_center"] ?> </td>
                        </tr>

                </tbody>

            <?php } ?>

            </table>


        </div>

</body>

</html>