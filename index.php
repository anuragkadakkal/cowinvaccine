<?php
    $d=date('d-m-Y');
    echo "<b><font color='green'><h2>AUTOMATIC REFRESH AFTER EVERY 15 SECONDS :)</h2></font></b><br><h3>Showing results of date : ".$d." + 7 Days Details</h3><hr>";


  header( "refresh:2;url=search.php" );


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByDistrict?district_id=298&date=".$d,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);



  $ar=json_decode($response,true); 

  function display_array_recursive($json_rec)
  { 
    if($json_rec)
    {
      foreach($json_rec as $key=> $value)
      {
        if(is_array($value))
        {
          display_array_recursive($value);

        }
        else
        {
          if($key=='session_id')
          {
            echo "<br>";
          }
          
          if($value=='152899' || $value=='Kummil PHC(Govt HSS)' || $value=='128733' || $value=='Kadakkal TH' || $value=='128743' || $value=='Madathara PHC' 
            || $value=='169318' || $value=='Mancode Chithara FHC' || $value=='128749' || $value=='Ittiva PHC' || $value=='128763' || $value=='Maincentr E CHC Nilamel NilamelP.O')
          {
            echo "<tr><td><h2><font color='red'>".$key."--".$value."</font></h2></td></tr>";
          }
          else if($key=='center_id' || $key=='name' || $key=='available_capacity_dose1' || $key=='available_capacity_dose2' || $key=='date' || $key=='min_age_limit')
          { 
            if( $key=='available_capacity_dose1' || $key=='available_capacity_dose2')
            {
              echo "<tr><td><b><font color='green'>".$key."--".$value."</font></b></td></tr><br>";
            }
            else if($key=='date')
            {
              echo "<tr><td><b><font color='#CA0088'>".$key."--".$value."</font></b></td></tr>";
            }
            else if($key=='min_age_limit')
            {
              echo "<tr><td><b><font color='red'>".$key."--".$value."</font></b></td></tr>";
            }
            else
            {
              echo "<tr><td><b><font color='blue'>".$key."--".$value."</font></b></td></tr>";
            }
          }
          else
          {
            echo '<tr><td>'.$key.'--'.$value.'</td></tr>';
          }
        }
      } 
    } echo "<br>";
  }
  display_array_recursive($ar);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>CoWin Vaccination Checker - Anurag Kadakkal</title>
  </head>
</html>