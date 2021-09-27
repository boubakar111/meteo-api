<?php
if (array_key_exists('submit', $_GET)) {
    if (!$_GET['city']) {
        $error = " Désole , votre  recherche est vide ";
    }
    if ($_GET['city']) {
        $api_data = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=" . $_GET['city'] . "&appid=337ef7ff5417c810aa7594ee88982d38");
        $meteoArray = json_decode($api_data, true);
        //print_r($meteoArray);
        $tempCelsius = $meteoArray['main']['temp'] -273;

        $weather = "<b> Ville   : </b>". $meteoArray['name'].";" .$meteoArray['sys']['country']."</br>";
        $weather .= "<b> tempurateur  : </b>" . round( $tempCelsius ) ."&deg;C</br>" ;
        $weather .= "<b> Condition meteo : </b>" .$meteoArray ['weather']['0']['description'] ;
    }
}

?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Weather App in PHP !</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            background: url(image/tag-Weather.jpg);
            color: white;
            font-family: popen, 'Times New Roman', Times, serif;
            font-size: large;
            background-size: cover;
            background-attachment: fixed;
        }

        .container {
            text-align: center;
            justify-content: center;
            align-items: center;
            width: 440px;
        }

        h1 {
            font-weight: 700px;
            margin-top: 150px;
            color: red;
        }

        input {
            width: 350px;
            padding: 5px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>HELLO EVRY BODY </h1>
        <form action="" method="GET">
            <p> <label for="City "> Entre votre Localisation </label> </p>
            <p> <input type="text" name="city" id="city " placeholder="Localisation name "> </p>
            <button type="submit" name="submit" class="btn btn-success"> Recherche Ici</button>
            <div class="output">

                <?php

                if ($weather) {
                    echo   '<div class="alert alert-success" role="alert">' . $weather . '</div>';
                }
               else if ($error) {
                    echo   '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                }


                ?>

            </div>
        </form>


    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

</body>

</html>