<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="flights-search.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="flights-search.js"></script>

  </head>
  <body>
    <select id="departure-airport-id" placeholder="select departure airport">
    <?php
    header('Content-Type: text/html; charset=ISO-8859-1');
    $db = mysqli_connect('localhost', 'root', '', 'app2');
    $airports_array = mysqli_query($db, "SELECT * FROM airport ORDER BY country,code ASC");
    $html = "<option disabled selected value > select airport </option>";
    while ($airport_row = mysqli_fetch_row($airports_array)) {
        $id = $airport_row[0];
        $code = $airport_row[1];
        $name = $airport_row[2];
        $country = $airport_row[3];
        $html .= "<option value='$id'>$country - $code - $name</option>";
    }
    echo $html;
     ?>
   </select>
   <select id="destination-airport-id" placeholder="select destination airport">
   <?php
   $db = mysqli_connect('localhost', 'root', '', 'app2');
   $airports_array = mysqli_query($db, "SELECT * FROM airport ORDER BY country,code ASC");
   $html = "<option disabled selected value > select airport </option>";
   while ($airport_row = mysqli_fetch_row($airports_array)) {
       $id = $airport_row[0];
       $code = $airport_row[1];
       $name = $airport_row[2];
       $country = $airport_row[3];
       $html .= "<option value='$id'>$country - $code - $name</option>";
   }
   echo $html;
    ?>
  </select>
  <table id="flights-table" width="100%">
    <colgroup>
      <col width="25%"/>
      <col width="25%"/>
      <col width="25%"/>
      <col width="25%"/>
    </colgroup>
    <thead>
      <tr>
        <th>Company</th>
        <th>Flight number</th>
        <th>Date</th>
        <th>Time</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
  </body>
</html>
