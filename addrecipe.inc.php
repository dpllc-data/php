<?php


$title = $_POST['title'];


$poster = $_POST['poster'];


$shortdesc = $_POST['shortdesc'];


$ingredients = htmlspecialchars($_POST['ingredients']);


$directions = htmlspecialchars($_POST['directions']);


if (trim($poster) == "")


{


    echo "<h2>Sorry, each recipe must have a poster</h2>\n";


}else


{


$con = mysqli_connect("localhost:3306", "root", "~Leodis27", "datapandemonium") or die('Sorry, could not connect to the database or server');


    $query = "INSERT INTO recipes (title, shortdesc, poster, ingredients, directions) " .


          " VALUES ('$title', '$shortdesc', '$poster', '$ingredients', '$directions')";


$result = mysqli_query($con, $query);


    if ($result)


       echo "<h2>Recipe posted</h2>\n";


    else


       echo "<h2>Sorry, there was a problem posting your recipe</h2>\n";


}


?>