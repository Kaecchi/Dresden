<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>sprawdzacz</title>
</head>

<body>


  <a>Thanks for add your recipe!  &nbsp; ^^</a>
    <a> there are already </a>

<?php
//ob_start();
   
$upload_folder = ''; 
$filename = pathinfo($_FILES['pic']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION));
 
 

$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
 
 
if(function_exists('exif_imagetype')) {
 $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
 $detected_type = exif_imagetype($_FILES['pic']['tmp_name']);
}
 
$new_path = $upload_folder.$filename.'.'.$extension;
 
if(file_exists($new_path)) { 
 $id = 1;
 do {
 $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
 $id++;
 } while(file_exists($new_path));
}

move_uploaded_file($_FILES['pic']['tmp_name'], $new_path);





   $plik='licz.txt';
   $file=fopen($plik, "r");
   flock($file, 1);
   $liczba=fgets($file, 16);
   flock($file, 3);
   fclose($file);
 

   $liczba++;

   $file=fopen($plik, "w");
   flock($file, 2);
   fwrite($file, $liczba++);
   flock($file, 3);
   fclose($file);
$liczba--;
  echo $liczba;
  


$file = 'recipe';
$file .= $liczba;
$file .= '.html';
$current = file_get_contents($file);


$pic = $_POST['pic'];   
$name = $_POST['name'];   
$recipe = $_POST['recipe'];   
$title = $_POST['title'];   
  


$current .= '<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Bootstrap CSS --> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="fontello-aa345661/css/fontello.css">
	<link rel="stylesheet" type="text/css" href="css/model.css">  
    <link rel="stylesheet" href="css/menufooter.css">
    
    <!--fonts-->
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">



</head>
<body>

    <nav>
		<ul class="me">
            <li class="firstt"><a href="index.html">Home</a></li>
			<li><a href="galleryshop.php">shop</a></li>
			<li><a href="contactus.html">contact us</a></li>
			<li><a href="aboutus.html">about us</a></li>
		</ul>
    </nav>





        <div class="tekst">';
    $current .= 'recipe number: ';
$current .= $liczba;
$current .= '<br>';
$current .= 'autor: ';
$current .= $name;
$current .= '<br>';
$current .= '</div>';
  $current .= '<div class="pic">';

    $current .= '<img src=">';
$current .= $_FILES['pic']['name'];
$current .= '">';
  $current .= '</div>';

    $current .= '<div class="recipe">';
$current .= $recipe;
$current .= '</div>';


    $current .= '<footer>
		<div class="socdiv" >
			<a class="icon-youtube-squared  , soc" href="https://www.youtube.com/"></a>
			<a class="icon-twitter-squared  , soc" href="https://www.twitter.com/"></a>
			<a class="icon-facebook-squared , soc" href="https://www.facebook.com/"></a>
			<a class="icon-linkedin-squared , soc" href="https://www.linkedin.com/"></a>
		</div>
		<a href="contactus.html"><div class="fot1">Contact us!</div></a>
        <a href="aboutus.html"><div class="fot1">About us!</div></a>
		<div class="fot2">
			<a>email:ihaha@unicorn.help</a><br>
			<a>phone:666999696</a><br>
			<a>adress:Louisenstraße 20, 01099 Dresden</a><br>
		</div>


	</footer>
	<p class="copyright">&copy; Kamila Wilczynska, Kamil Kowalczyk</p>
</body>

</html>';
    
file_put_contents($file, $current);
    
$filee = 'added.html';
$currentt = file_get_contents($filee);

$currentt .= '<div class="box"><img src="';
$currentt .=$_FILES['pic']['name'];
$currentt .= '"> <div class="overlay ovrl-left"> <br> <br> <br> autor:';
$currentt .=$name; 
$currentt .= '</div><a class="overlay2 oleft" href="';
$currentt .= 'recipe';
$currentt .= $liczba;
$currentt .= '.html';   
$currentt .= '"><br><br>DETAILS</a><div class="overlay ovrl-right"> <br>';   
 
$currentt .=$title;
$currentt .= '</div>
      <a class="overlay2 oright" href="index.html"> <br> <br> BUY </a>
     
    </div>';  
    
    
file_put_contents($filee, $currentt);
  
      //  header('Location: index.php');
?>
<a>   recipes on the site </a>
</body>
</html>
