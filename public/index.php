<?php
    include "./config.php";

    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(empty($_POST['username']) || empty($_POST['password'])){
            echo json_encode(["status" => "error" , "message" => "Fill required fields"]);
            exit;
        }

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        $qry = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $qry->bind_param("s", $username);
        $qry->execute();
        $res = $qry->get_result();

        if($res->num_rows > 0){
            $row = $res->fetch_assoc();

            if(password_verify($password, $row['password'])){
                $_SESSION['username'] = $username;
                echo json_encode(["status" => "success" , "message" => "Login successful"]);
            }
            else {
                echo json_encode(["status" => "error", "message" => "Invalid username or password"]);
            }
        }
        else{
            echo json_encode(["status" => "error" , "message" => "Invalid username or password"]);
        }
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASCB FiPo</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./custom.css">
</head>

<body class="font-font2">
    <div class="w-full h-screen bg-primary">

        <!-- Authentication Page -->
        <div class="auth-wrapper">
            <!-- Log In -->
            <div class="login-wrapper bg-secondary w-full h-screen grid items-end md:items-center">
                <div class="auth-form-wrapper grid md:grid-cols-2 bg-primary w-full md:w-[80vw] md:rounded-br-xl md:rounded-bl-xl xl:w-[60vw] mx-auto h-[70vh] rounded-tr-2xl rounded-tl-2xl md:shadow-xl">
                    <div class="hero hidden h-full md:block md:w-full bg-center bg-cover rounded-bl-2xl rounded-tl-2xl" style="background-image: url('./image/hero1.jpg')">
                    </div>
                    <form id ="login-form" action=<?php echo $_SERVER['PHP_SELF']; ?> class="w-[70vw] md:w-[80%] mx-auto" style="margin-top: 5rem;">
                        <h1 class="text-2xl text-secondary font-bold mb-8 font-font1">LOG IN</h1>
                        <p id="error-msg" class="hidden text-red-500 text-sm">hello</p>
                        <input type="text" id="username" name="username" class="block w-full h-8 border border-secondary bg-transparent rounded-md outline-none p-2 mb-4 placeholder:text-sm" placeholder="Username" required>
                        <input type="password" id="password" name="password" class="block w-full h-8 border border-secondary bg-transparent rounded-md outline-none p-2 mb-4 placeholder:text-sm" placeholder="Password" required>
                        <input type="submit" id="login" value="Login" name="login" class="block w-full h-8 text-[12px] text-primary bg-secondary border rounded-md p-2 mt-8 transmission hover:bg-transparent hover:text-secondary hover:border-secondary cursor-pointer">
                        <p class="text-xs text-center text-gray-500 mt-2">Don't have an account yet? <a href="./signup.php" class="underline text-secondary cursor-pointer">Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            let show;

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

            // MESSAGES
            $("#login").on("click", function(e){
                e.preventDefault();

                let username = $("#username").val();
                let password = $("#password").val();

                let data = {
                    username,
                    password
                }

                var request = $.ajax({
                    url: "index.php",
                    method: "POST",
                    data: data,
                    dataType: "html"
                });

                request.done(function(res) {
                    let msg = JSON.parse(res);
                    console.log(msg);
                    if(msg.status == "error"){
                        showError(msg.message);
                        setTimeout(hideError, 2000);
                    }
                    else{
                        window.location.replace("http://localhost/hustle/financial_portal/public/home.php");
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
