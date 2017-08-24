<?php

session_start();

$error = "";

if (array_key_exists("logout", $_GET)) {

    unset($_SESSION);
    setcookie("id", "", time() - 1 * 1);


    $_COOKIE["id"] = "";

} else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])) {

    header("Location: home.php");

}

if (array_key_exists("submit", $_POST)) {


    include("connection.php");

    if (!$_POST['email']) {

        $error .= "An email address is required<br>";

    }

    if (!$_POST['password']) {

        $error .= "A password is required<br>";

    }

    if ($error != "") {

        $error = "<p>There were error(s) in your form:</p>" . $error;

    } else {

        if ($_POST['signUp'] == '1') {

            $query = "SELECT id FROM `users` WHERE email = '" . mysqli_real_escape_string($link, $_POST['email']) . "' LIMIT 1";

            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) > 0) {

                $error = "That email address is taken.";

            } else {

                $query = "INSERT INTO `users` (`email`, `password`) VALUES 
                    ('" . mysqli_real_escape_string($link, $_POST['email']) . "', 
                    '" . mysqli_real_escape_string($link, $_POST['password']) . "')";

                if (!mysqli_query($link, $query)) {

                    $error = "<p>Could not sign you up - please try again later.</p>";

                } else {

                    $query = "UPDATE `users` SET password = '" . md5(md5(mysqli_insert_id($link)) . $_POST['password']) . "' WHERE id = " . mysqli_insert_id($link) . " LIMIT 1";

                    mysqli_query($link, $query);

                    $_SESSION['id'] = mysqli_insert_id($link);

                    if ($_POST['stayLoggedIn'] == '1') {

                        setcookie("id", mysqli_insert_id($link), time() + 60 * 60 * 24 * 365);

                    }

                    header("Location: home.php");

                }

            }

        } else {

            $query = "SELECT * FROM `users` WHERE email = '" . mysqli_real_escape_string($link, $_POST['email']) . "'";

            $result = mysqli_query($link, $query);

            $row = mysqli_fetch_array($result);


            if (isset($row)) {

                $hashedPassword = md5(md5($row['id']) . $_POST['password']);

                if ($hashedPassword == $row['password']) {
                    //          var_dump(3);
                    //    var_dump($row['id']); die ;


                    $_SESSION['id'] = $row['id'];

                    if ($_POST['stayLoggedIn'] == '1') {

                        setcookie("id", $row['id'], time() + 60 * 60 * 24 * 365);

                    }

                    header("Location: loggedin.php");


                } else {

                    $error = "That email/password combination could not be found.";

                }

            } else {

                $error = "That email/password combination could not be found.";

            }

        }

    }


}


?>


<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>
<body>


<!--TABS-->




<div class="container container-fluid" id="homePageContainer">

    <div class="card text-xs-center">
        <div class="card-header">

            <ul class="nav nav-tabs nav-stacked">
                <li class="nav-item">
                    <a href="#signUpForm" class="nav-link active">Rejestracja</a>
                </li>
                <li class="nav-item">
                    <a href="#logInForm" class="nav-link">Logowanie</a>
                </li>

            </ul>
<!--            <ul class="nav nav-tabs card-header-tabs float-xs-left">-->
<!---->
<!--                <li>-->
<!--                    <a class="nav-link active" href="#signUpForm" data-toggle="tab">Rejestracja</a>-->
<!--                </li>-->
<!---->
<!---->
<!--                <li>-->
<!--                    <a class="nav-link" href="#logInForm" data-toggle="tab">Logowanie</a>-->
<!--                </li>-->
<!---->
<!--            </ul>-->
        </div>
    </div>
<br>
    <h1>Zarejestruj się, aby wejsc do sklepu</h1>



    <div id="error"><?php if ($error != "") {
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';

        }; ?> </div>


    <!--                REGISTER-->

    <form method="post" id="signUpForm" class="tab-pane">

        <fieldset class="form-group">
            <p1 class="">Czekamy właśnie na Ciebie!</p1>
            <br>
            <input class="form-control" type="email" name="email" placeholder="Your Email" autocomplete="off">
        </fieldset>

        <fieldset class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="off">
        </fieldset>

        <fieldset class="form-group">
                <input type="hidden" name="signUp" value="1">
                <input class="btn btn-primary" type="submit" name="submit" value="zarejestruj się">
        </fieldset>

    </form>






    <!--  LOGIN FORM  -->


    <form method="post" id="logInForm" class="tab-pane">

        <p>Log in with your login and password</p>

        <fieldset class="form-group">
                      <input class="form-control" type="email" name="email" placeholder="zmienia sie">
        </fieldset>


        <fieldset class="form-group">
                     <input class="form-control" type="password" name="password" placeholder="Password">
        </fieldset>


        <div class="checkbox">
            <label>
                <input type="checkbox" name="stayLoggedIn" value=1>
                zapamiętaj mnie
            </label>
        </div>

        <fieldset class="form-group">
            <input type="hidden" name="signUp" value="0">
            <input class="btn btn-success" type="submit" name="submit" value="Log in!">
        </fieldset>

        <p><a class="toggleForms">Sign up</a></p>
    </form>

</div>

<?php include("footer.php"); ?>

</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="validation.js"></script>
<script>


