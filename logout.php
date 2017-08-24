<?php session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="logoutstyle.css">

</head>
<body>


    <div class="container" id="popup">
    <div class="alert alert-success" role="alert" >
        <h4 class="alert-heading">Zostałeś poprawnie wylogowany!</h4>
        <a href="index.php">Wróć do strony głównej</a>
    </div>
    </div>

<!--ciekawostka-->
    <div id="clue">
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                ciekawostka
            </a>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-block">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>O Ty Chuju bobrze</h2>
                            <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/qpqmvCvmEh8?t=35s" frameborder="0" allowfullscreen></iframe>                        </div>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div>
         </div>
        </div>
    </div>







<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>