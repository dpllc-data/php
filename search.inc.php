<?php


$con = mysqli_connect("localhost:3306", "root", "~Leodis27", "datapandemonium") or die('Sorry, could not connect to the database or server');




    $search = $_GET['searchFor'];


    $words = explode(" ", $search);


    $phrase = implode("%' AND title LIKE '%", $words);


    $query = "SELECT recipeid,title,shortdesc from recipes where title like '%$phrase%'";


    $result = mysqli_query($con, $query);


    echo "<h1>Search Results</h1><br><br>\n";


    if (mysqli_num_rows($result) == 0)


    {


        echo "<h2>Sorry, no recipes were found with '$search' in them.</h2>";


    } else


    {


        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))



        {


            $recipeid = $row['recipeid'];


            $title = $row['title'];


            $shortdesc = $row['shortdesc'];


            echo "<a href=\"index.php?content=showrecipe&id=$recipeid\">$title</a><br>\n";


            echo "$shortdesc<br><br>\n";


        }


    }


?>

