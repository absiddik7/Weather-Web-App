<?php
include 'weather.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Weather Forcast</title>
</head>

<body class="container " style="background-color: rgb(4, 0, 65);">

    <div class="card p-3 mt-3" style="height:380px">
        <p></p>
        <div class="d-flex align-items-start">
            <div class="row container">
                <div class="col-lg-3 col-md-6 col-12">
                    <h3>Weather Forcast</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <form method="POST">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group input-rounded">
                                    <input type="text" class="form-control" placeholder="Search for city" name="location" required />
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="form-group input-rounded">
                                    <button type="submit" class="btn btn-primary btn-block"> Search </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <!---Current Temp--->
            <div class="col-sm-6">
                <div class="card" style="height:230px">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $cityname; ?></h4>
                        <h5><?php echo $today; ?></h5>
                        <h6><?php echo ucwords($cloud); ?></h6>
                        <div class="d-flex ">
                            <img class="" style="width: 100px; height: 100px;" src="<?php echo $imgSrc; ?>" />
                            <h1 class="display-3"><?php echo $temp, "&deg;C"; ?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <!---Today's Highlights--->
            <div class="col-sm-6">
                <div class="card" style="height:230px">
                    <div class="card-body">
                        <h5 class="card-title">Today's Highlights</h5>
                        <div class="card-deck">
                            <div class="card" style="border-radius: 25px;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Winds</h5>
                                    <img class="" style="width: 30px; height: 30px;" src="<?php echo $windImg; ?>" />
                                    <h5><?php echo $wind, " km/h"; ?></h5>
                                </div>
                            </div>
                            <div class="card" style="border-radius: 25px;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Humidity</h5>
                                    <img class="" style="width: 30px; height: 30px;" src="<?php echo $humidityImg; ?>" />
                                    <h5><?php echo $humidity, "%"; ?></h5>
                                </div>
                            </div>
                            <div class="card" style="border-radius: 25px;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Visibility</h5>
                                    <img class="" style="width: 30px; height: 30px;" src="<?php echo $visibilityImg; ?>" />
                                    <h5><?php echo $visibility, " km/h"; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---5 day forcast--->
    <div class="card p-3 mt-3 mb-3" style="height:300px">
        <h5 class="card-title">5 Days Forcast</h5>
        <div class="card-deck">
            <?php $i = 0;
            $j = 0;

            foreach ($forecast as $f) :
                if ($i++ > 4) break;
            ?>
                <div class="card" style="border-radius: 25px;">
                    <div class="card-body text-center">
                        <h6 class="card-title"><?php echo date("l", $forecast[$j]->dt); ?></h6>
                        <p class="card-title">
                            <?php echo date("g:i a", $forecast[$j]->dt);
                            $j = $j + 8; ?>
                        </p>
                        <img class="card-img-top " style="width: 70px; height: 70px;" src="http://openweathermap.org/img/w/<?php echo $f->weather[0]->icon; ?>.png" alt="Weather Icon">
                        <p></p>
                        <strong><?php echo $f->main->temp, "&deg;C"; ?></strong>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>