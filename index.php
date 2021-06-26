<?php
    $d=date('d-m-Y');
    echo "<center><br><b><font color='green'><h3>CoWin Vaccination Availability<br></h3><h4>Kollam District</h4></font></b><br><a href='index.php'><button class='btn btn-primary btn-block'>Reload</button></a><br><br><h4>Showing results of date : ".$d." + 7 Days Details</h4><hr></center>";


  //header( "refresh:10;url=index.php" );


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByDistrict?district_id=296&date=".$d,
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>CoWin Vaccination Checker - Anurag Kadakkal</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60d175137f4b000ac038d6f9/1f8p32lkn';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
  <body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
