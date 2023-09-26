<?php

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

$park = isset($_GET['park']) ? $_GET['park'] : 'off';
$rank = isset($_GET['voto']) ? $_GET['voto'] : 0;


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- aggiungo bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"
        defer></script>
    <title>Document</title>
</head>

<body>

    <div class="container my-5">

        <form action="" method="GET" class="w-50 mx-auto d-flex">
            <button class="btn btn-dark me-3">filtra</button>

            <div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="park" id="check-Parcheggio"
                        <?php if ($park == 'on') { ?> checked <?php } ?>>
                    <label class="form-check-label" for="check-Parcheggio">
                        parcheggio
                    </label>
                </div>
                <select class="form-select" aria-label="voto select " name="voto">
                    <option <?php if($rank == 0):?> selected<?php endif?>value="1">numero di stelle</option>
                    <option <?php if($rank == 1):?> selected<?php endif?> value="1">*</option>
                    <option <?php if($rank == 2):?> selected<?php endif?> value="2">**</option>
                    <option <?php if($rank == 3):?> selected<?php endif?> value="3">***</option>
                    <option <?php if($rank == 4):?> selected<?php endif?> value="4">****</option>
                    <option <?php if($rank == 5):?> selected<?php endif?> value="5">*****</option>
                </select>
            </div>




        </form>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">description</th>
                    <th scope="col">parking</th>
                    <th scope="col">vote</th>
                    <th scope="col">distance_to_center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $key => $hotel) { ?>

                <!-- todo -- non ripetere codice -->
                <!-- con parcheggio -->

                <?php if ($park == 'on' ): ?>
                <?php if ($hotel['parking'] > 0 && $hotel['vote'] >= $rank ): ?>
                <tr>
                    <th scope="row">
                        <?php echo $key + 1; ?>
                    </th>
                    <td>
                        <?php echo $hotel['name']; ?>
                    </td>
                    <td>

                        <?php echo $hotel['description']; ?>
                    </td>
                    <td>

                        <?php echo $hotel['parking']; ?>
                    </td>
                    <td>

                        <?php echo $hotel['vote']; ?>
                    </td>
                    <td>
                        <?php echo $hotel['distance_to_center']; ?>

                    </td>

                </tr>


                <?php endif ?>
                <?php else: ?>

                <?php if ($hotel['vote'] >= $rank ): ?>
                <tr>
                    <th scope="row">
                        <?php echo $key + 1; ?>
                    </th>
                    <td>
                        <?php echo $hotel['name']; ?>
                    </td>
                    <td>

                        <?php echo $hotel['description']; ?>
                    </td>
                    <td>

                        <?php echo $hotel['parking']; ?>
                    </td>
                    <td>

                        <?php echo $hotel['vote']; ?>
                    </td>
                    <td>
                        <?php echo $hotel['distance_to_center']; ?>

                    </td>

                </tr>
                <?php endif ?>
                <?php endif ?>


                <?php } ?>

            </tbody>
        </table>
    </div>


</body>

</html>