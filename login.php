<?php

require('./functions.php');

    $credentials = fileToArray('./credentials.txt');

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Challenge 11 PHP forms</title>
    <style>
        .row-100vh {
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row row-100vh d-flex justify-content-center align-items-center">
            <div class="col-4 text-center">
                <h1 class="display-3 font-weight-bold pb-5">Log in</h1>
                <form action="login.php" method="POST">
                <div class="form-group">
                        <input id="email" name="email" type="text" class="form-control <?php if (if_POST()) {
                                                                                                if (fieldRequired('email', 'POST') && validateEmail($_POST['email'])) {
                                                                                                    echo 'is-valid';
                                                                                                } else {
                                                                                                    echo 'is-invalid';
                                                                                                } 
                                                                                                } ?>" placeholder="Your email (required)" value="<?php if (fieldRequired('email', 'POST')) {
                                                                                                                                                            echo $_POST['email'];
                                                                                                                                                        } ?>">

                        <?php if (fieldRequired('email', 'POST')) {
                                if (validateEmail($_POST['email'])) {
                                    // if (!emailExistsIn($_POST['email'], $credentials)) {
                                            echo '<div class="valid-feedback text-left">Valid email.</div>';
                                        // } else {
                                        //     if (usernameExistsIn($_POST['username'], $credentials)) {
                                        //         echo '<div class="invalid-feedback text-left text-warning">You are already registered. Your password is: ' . returnPass($_POST['email'], $_POST['username'], $credentials) . '</div>';
                                        //     } else {
                                        //         echo '<div class="invalid-feedback text-left">You are already registered with diferent username.</div>';
                                        //     }
                                        // }
                                } else {
                                    echo '<div class="invalid-feedback text-left">Not a valid email!!!</div>';
                                }
                        } else {
                            echo '<div id="email" class="invalid-feedback text-left">Email is required!!!</div>';
                        }
                        ?>

                    </div>
                    <div class="form-group">
                        <input id="username" name="username" type="text" class="form-control <?php if (if_POST()) { 
                                                                                                if (fieldRequired('username', 'POST') && validateUsername($_POST['username'])) {
                                                                                                    echo 'is-valid';
                                                                                                } else {
                                                                                                    echo 'is-invalid';
                                                                                                }
                                                                                             } ?>" placeholder="Choose username (required)" value="<?php if (fieldRequired('username', 'POST')) {
                                                                                                                                                            echo $_POST['username'];
                                                                                                                                                        } ?>">
                        <?php if (fieldRequired('username', 'POST')) {
                                if (validateUsername($_POST['username'])) {
                                    // if (!usernameExistsIn($_POST['username'], $credentials)) {
                                        echo '<div class="valid-feedback text-left">Valid username.</div>';
                                    // } else {
                                    //     echo '<div class="invalid-feedback text-left">User with that username already exists.</div>';
                                    // }

                                } else {
                                    echo '<div class="invalid-feedback text-left">Username can contain only letters and numbers!!!</div>';
                                }
                        } else {
                            echo '<div id="email" class="invalid-feedback text-left">Username is required!!!</div>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <input id="password" name="password" type="password" class="form-control  <?php if (if_POST()) {
                                                                                                    if (fieldRequired('password', 'POST') && validatePassword($_POST['password']) && loginCheck($_POST['email'], $_POST['username'], $_POST['password'], $credentials))  {
                                                                                                        echo 'is-valid';
                                                                                                    } else {
                                                                                                        echo 'is-invalid';
                                                                                                    } 
                                                                                                }?>" placeholder="Enter password (required)" value="<?php if (fieldRequired('password', 'POST')) {
                                                                                                                                                                echo $_POST['password'];
                                                                                                                                                            } ?>">
                        <?php if (fieldRequired('password', 'POST')) {
                                if (validatePassword($_POST['password'])) {
                                    if (if_POST()) {
                                        if (loginCheck($_POST['email'], $_POST['username'], $_POST['password'], $credentials)) {

                                            // ispolneti uslovi da odi natamu

                                            $message = $_POST['username'];
                                            $message=urlencode($message);
                                            header("Location:welcome.php?message=".$message);
                                            exit();

                                        } else {
                                            
                                            echo '<div class="invalid-feedback text-left">Username and password do not match.</div>';
                                        }
                                    } 
                                        
                                    




                                    
                                } else {
                                    echo '<div class="invalid-feedback text-left">Password Must be at least 8 characters, minimum one capitall letter and minimum one special sign!!!</div>';
                                }
                        } else {
                            echo '<div id="email" class="invalid-feedback text-left">Password is required!!!</div>';
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">Submit</button>
                </form>
                <a type="button" href="./index.html" class="btn btn-secondary text-light btn-block mt-2">Back</a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>