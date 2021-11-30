<?php
$cityname = "";
$today = "";
$imgSrc = "";
$windImg = "";
$temp = "";
$wind = "";
$humidity = "";
$visibility = "";
$cloud = "";
$forecast = [];
$windImg = "https://cdn-icons.flaticon.com/png/512/2011/premium/2011448.png?token=exp=1638192567~hmac=a3c3383b5dc1003cb8b13ea670e383c1";
$visibilityImg = "https://cdn-icons-png.flaticon.com/512/159/159604.png";
$humidityImg = "https://cdn-icons.flaticon.com/png/512/4529/premium/4529851.png?token=exp=1638193006~hmac=270f49efaa9cae6d478e51328f4d6507";



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = $_POST['location'];
    $url = "https://api.openweathermap.org/data/2.5/weather?q=" . $location . "&units=metric&appid=8a4a4562e285d51f8df30386e407fcef";

    $contents = file_get_contents($url);
    $data = json_decode($contents);
    $cityname = $data->name;
    $today = date("F j, Y");
    $im = $data->weather[0]->icon;
    $imgSrc = "http://openweathermap.org/img/w/{$im}.png";
   

    $temp = $data->main->temp;
    $wind = $data->wind->speed;
    $humidity = $data->main->humidity;
    $visibility = ($data->visibility) / 1000;
    $cloud = $data->weather[0]->description;

    // 5 Days forcast
    $forcaseUrl = "https://api.openweathermap.org/data/2.5/forecast?q=" . $location . "&units=metric&appid=8a4a4562e285d51f8df30386e407fcef";
    $contents2 = file_get_contents($forcaseUrl);
    $fData = json_decode($contents2);
    $forecast = $fData->list;
}
