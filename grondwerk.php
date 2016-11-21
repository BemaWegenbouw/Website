<?php

//Bema Wegenbouw BV Website
//Copyright 2016

require_once("inc/engine.php");
$page = "grondwerk";
include("inc/parts/header.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bema Wegenbouw BV</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/custom.css">

    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        <!-- Container voor diensten (een portolio class)-->
        <br>
        <div class="container"id="Grondwerk">
            <h2 class="text-center">Grondwerk</h2><br>
            <div class="row slideanim">
                <div class="col-sm-4 col-md-4" style="background-color:yellow;">
                    <img src="../assets/img/img3.jpg" alt="grondwerk" width="100%" >
                </div>
                <div class="col-sm-8 col-md-8" style="background-color:pink;">
                    <p><strong>Titel onderdeel</strong></p>
                    <p>blablabla tekst</p>
                </div>
            </div>
        </div>   
		<br>
	<!-- Container (Contact Section) -->
		<?php include ("contact.php") ?>
	<!-- Header -->
		<?php include("footer.php"); ?>
</body>
</html>