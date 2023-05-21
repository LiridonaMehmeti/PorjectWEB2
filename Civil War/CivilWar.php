<?php
session_start();
include "../Main/database.php";

$sql = "SELECT * FROM actors_civilwar";
$result = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CivilWar.css">
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

        <video src="img/civilWarBackground.mp4" autoplay muted loop class="background-video"></video>
        <!-- <img src="img/background1.jpg" alt="">
        <img src="img/background2.jpg" alt="">
        <img src="img/background3.jpg" alt=""> -->



        <div class="content">
            <div class="textBox">
                <h2><span>Captain America</span>Civil War</h2>
                <p>Captain America: Civil War is a 2016 American superhero film based on the Marvel Comics character
                    Captain America, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures.
                    It is the sequel to Captain America: The First Avenger (2011) and Captain America: The Winter
                    Soldier (2014), and the 13th film in the Marvel Cinematic Universe (MCU). The film was directed by
                    Anthony and Joe Russo from a screenplay by the writing team of Christopher Markus and Stephen
                    McFeely, and stars Chris Evans as Steve Rogers / Captain America alongside an ensemble cast
                    including Robert Downey Jr., Scarlett Johansson, Sebastian Stan, Anthony Mackie, Don Cheadle, Jeremy
                    Renner, Chadwick Boseman, Paul Bettany, Elizabeth Olsen, Paul Rudd, Emily VanCamp, Marisa Tomei, Tom
                    Holland, Frank Grillo, Martin Freeman, William Hurt, and Daniel Brühl. In Captain America: Civil
                    War, disagreement over international oversight of the Avengers fractures the team into two opposing
                    factions—one led by Steve Rogers and the other by Tony Stark (Downey)..</p>
                <a href="https://www.youtube.com/watch?v=dKrVegVI0Us">Watch trailer now</a>
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