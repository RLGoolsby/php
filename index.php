<?php
// phpinfo();
//Report all PHP errors
error_reporting(-1);



$data = file_get_contents('https://www.codeschool.com/users/RGoolsby.json');
$json_data = json_decode($data, true);
// var_dump($json_data);
$courses = $json_data['courses']['completed'];
 ?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,700' rel='stylesheet' type='text/css'>


    <!-- the is the title that appears in the browser tab -->
    <title>"<?php echo $json_data['user']['username']; ?>" 's badges</title>
    <link rel="stylesheet" href="assets/css/styles.css">
  </head>




  <body>


      <header>
        <!-- Trigger/Open The Modal -->
        <h1>M<button id="myBtn"><i class="fa fa-eye fa-5x" aria-hidden="true"></i>
          </button> Badges</h1>




          <!-- The Modal -->
          <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
              <span class="close">&times;</span>
              <p>Adventures in coding are endless.
                <a target="_tab" href="https://www.codeschool.com/">CodeSchool</a></p>
            </div><!-- end of modal-content -->

          </div><!-- end of myModal -->

      </header>





        <ul class= "badges">
          <!--The is the php code that GETS data from the server json and plugs it into my html -->
              <?php
                foreach ($courses as $course) {

                  echo '<li class= "col span12">';
                  echo '<img height= "210px" src= "' .  $course["badge"] . '"/><br>';
                  echo '<a href= "' . $course["url"] . '">' . $course["title"] . '</a>';
                  echo '</li>';
                }

              ?>
        </ul>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="assets/js/scripts.js"></script>
    <body>
</html>
