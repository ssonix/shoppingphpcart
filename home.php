<?php


include "connection.php";


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="homecss.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>
<body>
<!--navbar/logout button-->
<nav class="navbar navbar-toggleable-md navbar-light bg-faded" id="navbar">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a name="" id="" class="btn btn-primary" href="logout.php" role="button">wyloguj</a>
        </form>
    </div>
</nav>



    <div class="container table-bordered">
        <h1 class="header">Wybierz produkt:</h1>
        <p></p>
        <div class="row">
                    <?php
                    $query = "SELECT * FROM `products` ORDER BY id ASC";
                    $result = mysqli_query($link, $query);
                    if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
            <div class="col-md-4 col-sm-6">
                <form method="post" >
                    <div>
                        <img src="<?php echo $row["photo"]; ?>" class="photos">
                        <h5 class="text-info"><?php echo $row["name"] ?></h5>
                        <h5 class="text-danger"><?php echo $row["price"] ?></h5>
                        <input type="text" name="quantity" class="form-control" value="1">
                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"] ?>">
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"] ?>">
                        <input type="hidden" name="hidden_id" value="<?php echo $row["id"] ?>">
                        <input type="submit" name="add" class="btn btn-default" value="Dodaj do koszyka">
                    </div>
                </form>
            </div>
                    <?php
                        }
                     }
                     ?>
         </div>

        <?php

        if(isset($_POST['add'])){
            $sql = "INSERT INTO `cart_products` (`product_id`, `quantity`, `price`)
      VALUES(" . intval($_POST["hidden_id"]) . ", " . intval($_POST["quantity"]) . ", " . intval($_POST["hidden_price"]) . ")";
            $result = mysqli_query($link, $sql);
        };
        var_dump($_POST)


        ?>


<!--koszyk-->
<a name="cart" id="" class="btn btn-primary" href="#home.php" role="button">koszyk</a>

<!-- zamawiam/pytam -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kontakt" id="przycisk">
    Kontakt z nami
</button>

<!-- Modal -->
<div class="modal fade" id="kontakt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModal">Kontakt z Nami</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="container">
                    <form id="contact-form" method="get" novalidate="novalidate" action="#">
                        <fieldset>
                            <legend>Formularz kontaktowy</legend>
                            <p>
                                <label for="cname">Imię</label>
                                <input id="cname" name="name" align="center" class="form-control" >
                            </p>
                            <p>
                                <label for="clastname">Nazwisko</label>
                                <input id="clastname" name="lastname" align="center" class="form-control">
                            </p>

                            <p>
                                <label for="cemail">E-Mail</label>
                                <input id="cemail" name="cemail" align="center" class="form-control">
                            </p>

                            <div class="form-group">
                                <label for="message">Wiadomość</label>
                                <textarea class="form-control" id="message" rows="3" class="form-control"
                                ></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                                <button type="submit" class="btn btn-primary" id="submit">Wyślij</button>
                            </div>

                        </fieldset>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<!--<script src="validation.js"></script>-->
<script type="text/javascript">


</script>
</body>
</html>