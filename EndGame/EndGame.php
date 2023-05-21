<?php
session_start();
include "../Main/database.php";

$sql = "SELECT * FROM actors_endgame";
$result = mysqli_query($mysqli, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="EndGame.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-DH5RjWVovJllFrAPrj0wF0ri20d0fnIcOwsyNXF7uI2re37/i7LXkbVi4KGLhwvqZkGcREr6x0DppADidWzI1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <section>
        <header>
            <a href="/PorjectWEB2/Main/main.php"><img src="img/marvelLogo2.png" alt="logo" class="logo"></a>
            <div class="toggle">

            </div>
            <ul class="navigation">
                <li><a href="#">Videos</a></li>
                <li><a href="../1Movie/movie.html">Movies</a></li>
                <li><a href="../Comics/comic.php">Comics</a></li>
                <li><a href="../Main/movies.php">Shop</a></li>
                <li><a href="../Characters/characters.html">Characters</a></li>
                <li><a href="../Games/main.html">Games</a></li>
                <li><a href="../Main/show-faq.php">FAQ</a></li>

            </ul>
        </header>

        <video src="img/backgroundVideo1.mp4" autoplay muted loop class="background-video"></video>
        <!-- <img src="img/background1.jpg" alt="">
        <img src="img/background2.jpg" alt="">
        <img src="img/background3.jpg" alt=""> -->



        <div class="content">
            <div class="textBox">
                <h2><span>Avengers</span>Endgame</h2>
                <p>Avengers: Endgame is a 2019 American superhero film based on the Marvel Comics superhero team the
                    Avengers. Produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures, it is
                    the direct sequel to Avengers: Infinity War (2018) and the 22nd film in the Marvel Cinematic
                    Universe (MCU). Directed by Anthony and Joe Russo and written by Christopher Markus and Stephen
                    McFeely, the film features an ensemble cast including Robert Downey Jr., Chris Evans, Mark Ruffalo,
                    Chris Hemsworth, Scarlett Johansson, Jeremy Renner, Don Cheadle, Paul Rudd, Brie Larson, Karen
                    Gillan, Danai Gurira, Benedict Wong, Jon Favreau, Bradley Cooper, Gwyneth Paltrow, and Josh Brolin.
                    In the film, the surviving members of the Avengers and their allies attempt to reverse Thanos's
                    actions in Infinity War.</p>
                <a href="https://www.youtube.com/watch?v=TcMBFSGVi1c">Watch trailer now</a>
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
