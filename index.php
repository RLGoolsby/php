<?php
// phpinfo();

	/**
	 * GIT DEPLOYMENT SCRIPT
	 *
	 * Used for automatically deploying websites via github or bitbucket, more deets here:
	 *
	 *		https://gist.github.com/1809044
	 */
	// The commands
	$courses = array(
		'echo $PWD',
		'whoami',
		'git pull',
		'git status',
		'git submodule sync',
		'git submodule update',
		'git submodule status',
	);
  // Run the commands for output
$output = '';
foreach($courses AS $course){
  // Run it
  $tmp = shell_exec($course);
  // Output
  $output .= '<li class= "col">';
  $output .= '</li>';
  
}
// Make it pretty for manual user access (and why not?)




$data = file_get_contents('https://www.codeschool.com/users/RGoolsby.json');
$json_data = json_decode($data, true);
// var_dump($json_data);
$courses = $json_data['courses']['completed'];
 ?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- the is the title that appears in the browser tab -->
    <title>"<?php echo $json_data['user']['username']; ?>" 's badges</title>

  </head>




  <body>


      <header>
        <h1> My Badges</h1>
      </header>

      <div class= "container">
        <ul class= "badges">
          <!--The is the php code that GETS data from the server json and plugs it into my html -->
              <?php
                foreach ($courses as $course) {
                  echo '<li class= "col">';
                  echo '<img height= "210px" src= "' .  $course["badge"] . '"/><br>';
                  echo '<a href= "' . $course["url"] . '">' . $course["title"] . '</a>';
                  echo '</li>';
                }
              ?>
        </ul>
      </div>
    <footer>

    </footer>
    <?php echo $output; ?>
  </body>
</html>
