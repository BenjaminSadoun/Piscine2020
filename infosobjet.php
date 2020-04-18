<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Feraille ou Trésor</title>

</head>

<body>
    <div id="header">
        <h1 id="h1">Ebay ECE</h1>
        <h2 id="h2">La vente en ligne pour la communauté ECE Paris</h2>
    </div>

    <?php include("config/navig.php"); ?>

    <?php
        ?>
        <div class="container features">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($_SESSION['nom']); ?></h6>
                        <div><?php echo htmlspecialchars($_SESSION['description']); ?></div>
                        <div><?php echo "<div id='img_div'>";
                                echo "<img  class='img-fluid' src='img/imgitem/" . $_SESSION['vignette'] . "' >";
                                echo "</div>";
                                ?>
                        </div>
                        <div><?php echo htmlspecialchars($_SESSION['prixInitial']); ?></div>
                    </div>
                    <div class="card-action right-align"></div>
                </div>
            </div>
        </div>

        <?php
                // }
        ?>
    </div>


</body>

<?php include("config/footer.php"); ?>

</html>