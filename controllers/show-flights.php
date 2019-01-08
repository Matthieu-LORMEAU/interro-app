<?php

$departure_id = $_POST['departure'];
$destination_id = $_POST['destination'];


$db = mysqli_connect('localhost', 'root', '', 'app2');
$result = mysqli_query($db, "SELECT id, companyName, flightNumber,`date`,`time` FROM flight WHERE idDeparture=$departure_id AND idArrival = $destination_id");
echo(json_encode(mysqli_fetch_all($result,MYSQLI_NUM)));
