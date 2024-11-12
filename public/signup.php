<?php
include "./config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        empty($_POST['name']) ||
        empty($_POST['username']) ||
        empty($_POST['id']) ||
        empty($_POST['password'])
    ) {
        echo json_encode(["status" => "error", "message" => "Fill required fields"]);
        exit;
    }

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $student_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $enc_passwd = password_hash($password, PASSWORD_DEFAULT);
    $role = 'user';

    $qry = $conn->prepare("SELECT * FROM users WHERE student_id = ? OR username = ?");
    $qry->bind_param("is", $student_id, $username);
    $qry->execute();
    $res = $qry->get_result();

    if ($res->num_rows == 0) {
        $qry = $conn->prepare("INSERT INTO `users`(`student_id`, `name`, `username`, `password`, `roles`) VALUES (?, ?, ?, ?, ?)");
        $qry->bind_param("issss", $student_id, $name, $username, $enc_passwd, $role);
        $insert_result = $qry->execute();

        echo $insert_result == 1 ? json_encode(["status" => "success", "message" => "Signup Successful"]) : null;
        exit;
    } else {
        $row = $res->fetch_assoc();
        if ($row['student_id'] == $student_id) {
            echo json_encode(["status" => "error", "message" => "User with this student ID already exists!"]);
        } elseif ($row['username'] == $username) {
            echo json_encode(["status" => "error", "message" => "User with this username already exists!"]);
        }
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASCB FiPo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="font-font2">
    <div class="w-full h-screen">
        <!-- Sign Up -->
        <div class="signup-wrapper bg-secondary w-full h-screen grid items-end md:items-center">
            <div class="auth-form-wrapper grid md:grid-cols-2 bg-primary w-full md:w-[80vw] md:rounded-br-xl md:rounded-bl-xl xl:w-[60vw] mx-auto h-[70vh] rounded-tr-2xl rounded-tl-2xl md:shadow-xl">
                <div class="hero hidden h-full md:block md:w-full bg-center bg-cover rounded-bl-2xl rounded-tl-2xl transmission" style="background-image: url('./image/hero1.jpg')">
                </div>
                <form id="signup-form" class="w-[70vw] md:w-[80%] m-2 mx-auto" style="margin-top: 4rem; ">
                    <h1 class="text-2xl text-secondary font-bold mb-4 font-font1">SIGN UP</h1>
                    <p id="error-msg" class="text-red-500 text-sm hidden"></p>
                    <input type="text" id="su_name" name="name" class="block w-full h-8 border border-secondary bg-transparent rounded-md outline-none p-2 mb-4 placeholder:text-sm" placeholder="Name" required>
                    <input type="text" id="su_username" name="username" class="block w-full h-8 border border-secondary bg-transparent rounded-md outline-none p-2 mb-4 placeholder:text-sm"" placeholder=" Username" required>
                    <input type="text" id="su_id" name="id" class="block w-full h-8 border border-secondary bg-transparent rounded-md outline-none p-2 mb-4 placeholder:text-sm"" placeholder=" Student ID" required>
                    <input type="password" id="su_password" name="password" class="block w-full h-8 border border-secondary bg-transparent rounded-md outline-none p-2 mb-4 placeholder:text-sm"" placeholder=" Password" required>
                    <input type="submit" value="Sign Up" id="signup" name="signup" class="block w-full h-8 text-sm text-primary bg-secondary border rounded-md p-2 mt-8 transmission hover:bg-transparent hover:text-secondary hover:border-secondary cursor-pointer">
                    <p class="text-xs text-center mt-2">Already have an account? <a href="./index.php" class="underline text-secondary cursor-pointer">Login</a></p>
                </form>
            </div>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // AUTHENTICATION HERO IMAGE
            const hero = ["./image/hero1.jpg", "./image/hero2.jpg", "./image/hero3.jpg", "./image/hero4.jpg", "./image/hero5.jpg"];
            let heroIdx = 0;
            let timeID;

            incrementIdx();

            function incrementIdx() {
                if (!timeID) {
                    timeID = setInterval(function() {
                        heroIdx++;
                        changeHero();
                    }, 3000)
                }
            }

            function changeHero() {
                if (heroIdx > hero.length - 1) {
                    heroIdx = 0;
                }
                $('.hero').css('background-image', `url('${hero[heroIdx]}')`);
            }

            // SIGNUP
            $("#signup").on("click", function(e) {
                e.preventDefault();
                let name = $("#su_name").val();
                let username = $("#su_username").val();
                let id = $("#su_id").val();
                let password = $("#su_password").val();

                let data = {
                    name,
                    username,
                    id,
                    password
                }

                var request = $.ajax({
                    url: "signup.php",
                    method: "POST",
                    data: data,
                    dataType: "html"
                });

                request.done(function(res) {
                    let msg = JSON.parse(res);
                    if (msg.status == "error") {
                        showError(msg.message);
                        setTimeout(hideError, 2000);
                    } else {
                        window.location.replace("http://localhost/hustle/financial_portal/public/index.php");
                    }

                });

                request.fail(function(jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            })

            function showError(msg){
                $("#error-msg").html(msg);
                $("#error-msg").removeClass("hidden");
            }

            function hideError(){
                $("#error-msg").addClass("hidden");
            }

        })
    </script>
</body>

</html>
