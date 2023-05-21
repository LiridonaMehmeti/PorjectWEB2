<?php
session_start();
include "../Main/database.php";

$sql = "SELECT * FROM actors_theavengers";
$result = mysqli_query($mysqli, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Avengers1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-DH5RjWVovJllFrAPrj0wF0ri20d0fnIcOwsyNXF7uI2re37/i7LXkbVi4KGLhwvqZkGcREr6x0DppADidWzI1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section>
        <header>
            <a href="/PorjectWEB2/Main/main.php"><img src="../Avengers1/img/marvelLogo2.png" alt="logo" class="logo"></a>
            <div class="toggle">
                <div></div>
            </div>
            <ul class="navigation">
                <li><a href="#">Videos</a></li>
                <li><a href="/PorjectWEB2/1Movie/movie.html">Movies</a></li>
                <li><a href="/PorjectWEB2/contactus/contactus1.html">Contact us</a></li>
                <li><a href="/PorjectWEB2/Characters/characters.html">Characters</a></li>
                <li><a href="/PorjectWEB2/Games/main.html">Games</a></li>

            </ul>
        </header>

        <video src="img/backgroundVideo.mp4" autoplay muted loop class="background-video"></video>
        <!-- <img src="img/background1.jpg" alt="">
        <img src="img/background2.jpg" alt="">
        <img src="img/background3.jpg" alt=""> -->



        <div class="content">
            <div class="textBox">
                <h2><span>The Avengers</span></h2>
                <p>Marvel's The Avengers (classified under the name Marvel Avengers Assemble in the United Kingdom
                    and Ireland) or simply The Avengers, is a 2012 American superhero film based on the Marvel
                    Comics superhero team of the same name. Produced by Marvel Studios and distributed by Walt Disney
                    Studios Motion Pictures, it is the sixth film in the Marvel Cinematic Universe (MCU). Written and
                    directed by Joss Whedon, the film features an ensemble cast including Robert Downey Jr., Chris
                    Evans, Mark Ruffalo, Chris Hemsworth, Scarlett Johansson, and Jeremy Renner as the Avengers,
                    alongside Tom Hiddleston, Stellan Skarsgård, and Samuel L. Jackson. In the film, Nick Fury and the
                    spy agency S.H.I.E.L.D. recruit Tony Stark, Steve Rogers, Bruce Banner, Thor, Natasha Romanoff, and
                    Clint Barton to form a team capable of stopping Thor's brother Loki from subjugating Earth.</p>
                <a href="https://www.youtube.com/watch?v=eOrNdBpGMv8">Watch trailer now</a>
                <a href="#section2" class="scroll-down">Cast</a>

            </div>
        </div>
    </section>

    <section id="section2">
    <div class="search-container">
                <input type="text" id="search-input" placeholder="Search actors...">
                <i class="fa fa-search search-icon"></i>
            </div>
        <div class="main">
            
            <div class="cast-container">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    // Iterate over the results and display each actor
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        $emri = $row["emri"];
                        $mbiemri = $row["mbiemri"];
                        $roli = $row["karakteri"];
                        $wikiLink = $row["wikilink"];
                        
                        echo '<div class="cast">
                        <div class="image">
                        <img alt="avatar1" src="data:image/jpeg;base64,'.base64_encode($row['fotoja']).'" style="width: 250px; height: 250px; margin-right: 70px;">
                        </div>
                        <div class="title">
                            <h1 style="color:black">' . $emri . ' ' . $mbiemri . '</h1>
                        </div>
                        <div class="pershkrimi">
                            <p style="color:black">' . $roli . '</p>
                            <button onclick="window.location.href = \'' . $wikiLink . '\'">Read More...</button>';

                        if ($_SESSION["user_id"] == 17) {
                            echo '<form action="delete-actor.php?newid=' . $id . '" method="post">
                                <button name="delete1">Delete</button>
                              </form>';
                        }

                        echo '</div>
                    </div>';
                    }
                } else {
                    echo "<p>No actors found.</p>";
                }
                ?>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $("#search-input").on("input", function() {
                var searchText = $(this).val().toLowerCase();
                $(".cast").each(function() {
                    var articleTitle = $(this).find("h1").text().toLowerCase();
                    if (articleTitle.indexOf(searchText) === -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            });
        });
    </script>
</body>

</html>