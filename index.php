<?php
session_start();
$error = "";
if (array_key_exists("logout", $_GET)) {
    unset($_SESSION);
    setcookie("id", "", time() - 12 * 12 );
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
    }
    else {
        if ($_POST['signUp'] == '1') {
//           sprawdza czy dany adres email jest juz w bazie
            $query = "SELECT id FROM `users` WHERE email = '" . mysqli_real_escape_string($link, $_POST['email']) . "' LIMIT 1";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
                $error = "That email address is taken.";
            } else {
//                dodaje email/haslo do bazy
                $query = "INSERT INTO `users` (`email`, `password`) VALUES 
                    ('" . mysqli_real_escape_string($link, $_POST['email']) . "', 
                    '" . mysqli_real_escape_string($link, $_POST['password']) . "')";
                if (!mysqli_query($link, $query)) {
                    $error = "<p>Could not sign you up - please try again later.</p>";
                } else {
//                    haszuje haslo
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
                    header("Location: home.php");
                } else {
                    $error = "That email/password combination could not be found.";
                }
            } else {
                $error = "That email/password combination could not be found.";
            }
        }
    }
}

include "header.php";

?>

<!--        <!--                REGISTER-->
<!---->
<!--        <form method="post" id="signUpForm" class="tab-pane">-->
<!--            <fieldset class="form-group">-->
<!--                <p1 class="">Czekamy właśnie na Ciebie!</p1>-->
<!--                <br>-->
<!--                <input class="form-control" type="email" name="email" placeholder="Your Email" autocomplete="off">-->
<!--            </fieldset>-->
<!--            <fieldset class="form-group">-->
<!--                <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="off">-->
<!--            </fieldset>-->
<!--            <fieldset class="form-group">-->
<!--                <input type="hidden" name="signUp" value="1">-->
<!--                <input class="btn btn-primary" type="submit" name="submit" value="zarejestruj się">-->
<!--            </fieldset>-->
<!--        </form>-->
<!---->
<!--<!--          LOGIN FORM-->-->
<!---->
<!--        <form method="post" id="logInForm" class="tab-pane">-->
<!--            <p>Log in with your login and password</p>-->
<!--            <fieldset class="form-group">-->
<!--                <input class="form-control" type="email" name="email" placeholder="zmienia sie">-->
<!--            </fieldset>-->
<!--            <fieldset class="form-group">-->
<!--                <input class="form-control" type="password" name="password" placeholder="Password">-->
<!--            </fieldset>-->
<!--            <div class="checkbox">-->
<!--                <label><input type="checkbox" name="stayLoggedIn" value=1>zapamiętaj mnie</label>-->
<!--            </div>-->
<!--            <fieldset class="form-group">-->
<!--                <input type="hidden" name="signUp" value="0">-->
<!--                <input class="btn btn-success" type="submit" name="submit" value="Log in!">-->
<!--            </fieldset>-->
<!--            <p><a class="toggleForms">Sign up</a></p>-->
<!--        </form>-->



</div>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-block">

                    <h3 class="card-title">Rejestracja</h3>
                    <p class="card-text">Zarejestruj się aby wejsc do sklepu</p>
                    <form method="post" id="signUpForm">
                        <fieldset class="form-group">
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
                </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="card">
                <div class="card-block">

                    <h3 class="card-title">Logowanie</h3>
                    <p class="card-text">Zaloguj się swoim loginem i hasłem</p>
                    <form method="post" id="logInForm">
                        <fieldset class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="Login">
                        </fieldset>
                        <fieldset class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="Hasło">
                        </fieldset>
                        <div class="checkbox">
                            <label><input type="checkbox" name="stayLoggedIn" value=1>zapamiętaj mnie</label>
                        </div>
                        <input class="btn btn-primary" type="submit" name="submit" value="zaloguj sie">
                    </form>                </div>
            </div>
        </div>
    </div>
    <div id="error"><?php if ($error != "") {
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';

        }; ?>
    </div>
</div>




<?php include("footer.php"); ?>