<?php
session_start();
include "../Main/database.php";

$sql = "SELECT * FROM actors_ragnarok";
$result = mysqli_query($mysqli, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="thor.css">
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
                <li><a href="/PorjectWEB2/1Movie/movie.html">Movies</a></li>
                <li><a href="/PorjectWEB2/contactus/contactus1.html">Contact us</a></li>
                <li><a href="/PorjectWEB2/Characters/characters.html">Characters</a></li>
                <li><a href="/PorjectWEB2/Games/main.html">Games</a></li>

            </ul>
        </header>

        <video src="img/thorBackground2.mp4" autoplay muted loop class="background-video"></video>
        <!-- <img src="img/background1.jpg" alt="">
        <img src="img/background2.jpg" alt="">
        <img src="img/background3.jpg" alt=""> -->



        <div class="content">
            <div class="textBox">
                <h2><span>Thor</span>Ragnarok</h2>
                <p>Thor: Ragnarok is a 2017 American superhero film based on the Marvel Comics character Thor, produced
                    by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the sequel to Thor
                    (2011) and Thor: The Dark World (2013), and is the 17th film in the Marvel Cinematic Universe (MCU).
                    The film was directed by Taika Waititi from a screenplay by Eric Pearson and the writing team of
                    Craig Kyle and Christopher Yost, and stars Chris Hemsworth as Thor alongside Tom Hiddleston, Cate
                    Blanchett, Idris Elba, Jeff Goldblum, Tessa Thompson, Karl Urban, Mark Ruffalo, and Anthony Hopkins.
                    In Thor: Ragnarok, Thor must escape the alien planet Sakaar in time to save Asgard from Hela
                    (Blanchett) and the impending Ragnarök.</p>
                <a href="https://www.youtube.com/watch?v=v7MGUNV8MxU">Watch trailer now</a>
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