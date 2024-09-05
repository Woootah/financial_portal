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

            <!-- Sign Up -->
            <div class="signup-wrapper bg-secondary w-full h-screen grid items-end md:items-center">
                <div class="auth-form-wrapper grid md:grid-cols-2 bg-primary w-full md:w-[80vw] md:rounded-br-xl md:rounded-bl-xl xl:w-[60vw] mx-auto h-[70vh] rounded-tr-2xl rounded-tl-2xl md:shadow-xl">
                    <div class="hero hidden h-full md:block md:w-full bg-center bg-cover rounded-bl-2xl rounded-tl-2xl">
                    </div>
                    <form action="#" class="w-[70vw] md:w-[80%] m-2 mx-auto mt-[3rem]">
                        <h1 class="text-2xl text-secondary font-bold mb-8">SIGN UP</h1>
                        <label for="su_name" class="block text-gray-500 mr-2 mb-2">Name:</label>
                        <input type="text" id="su_name" class="block w-full h-12 border border-secondary bg-transparent rounded-md outline-none p-2 mb-4">
                        <label for="su_username" class="block text-gray-500 mr-2 mb-2">Username:</label>
                        <input type="text" id="su_username" class="block w-full h-12 border border-secondary bg-transparent rounded-md outline-none p-2 mb-4">
                        <label for="su_id" class="block text-gray-500 mr-2 mb-2">Student ID:</label>
                        <input type="text" id="su_id" class="block w-full h-12 border border-secondary bg-transparent rounded-md outline-none p-2 mb-4">
                        <label for="su_password" class="block text-gray-500 mr-2 mb-2">Password:</label>
                        <input type="password" id="su_password" class="block w-full h-12 border border-secondary bg-transparent rounded-md outline-none p-2 mb-4">
                        <input type="submit" value="Sign Up" class="block w-full h-12 text-primary bg-secondary border rounded-md p-2 mt-8 transmission hover:bg-transparent hover:text-secondary hover:border-secondary cursor-pointer">
                        <p class="text-sm text-center mt-2">Already have an account? <span id="login" class="underline text-secondary cursor-pointer">Login</span></p>
                    </form>
                </div>
            </div>

            <!-- Log In -->
            <div class="login-wrapper bg-secondary w-full h-screen hidden items-end md:items-center">
                <div class="auth-form-wrapper grid md:grid-cols-2 bg-primary w-full md:w-[80vw] md:rounded-br-xl md:rounded-bl-xl xl:w-[60vw] mx-auto h-[70vh] rounded-tr-2xl rounded-tl-2xl md:shadow-xl">
                    <div class="hero hidden h-full md:block md:w-full bg-center bg-cover rounded-bl-2xl rounded-tl-2xl">
                    </div>
                    <form action="#" class="w-[70vw] md:w-[80%] m-2 mx-auto mt-[8rem]">
                        <h1 class="text-2xl text-secondary font-bold mb-8">LOG IN</h1>
                        <label for="li_username" class="block text-gray-500 mr-2 mb-2">Username:</label>
                        <input type="text" id="li_username" class="block w-full h-12 border border-secondary bg-transparent rounded-md outline-none p-2 mb-4">
                        <label for="li_password" class="block text-gray-500 mr-2 mb-2">Password:</label>
                        <input type="password" id="li_password" class="block w-full h-12 border border-secondary bg-transparent rounded-md outline-none p-2 mb-4">
                        <input type="submit" value="Login" class="block w-full h-12 text-primary bg-secondary border rounded-md p-2 mt-8 transmission hover:bg-transparent hover:text-secondary hover:border-secondary cursor-pointer">
                        <p class="text-sm text-center mt-2">Don't have an account yet? <span id="signup" class="underline text-secondary cursor-pointer">Sign Up</span></p>
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

            // AUTHENTICATION

            $("#login").on("click", function() {
                showLogin();
            })

            $("#signup").on("click", function() {
                showSignUp();
            })

            function showLogin() {
                $(".signup-wrapper").removeClass("grid");
                $(".signup-wrapper").addClass("hidden");
                $(".login-wrapper").removeClass("hidden");
                $(".login-wrapper").addClass("grid");
            }

            function showSignUp() {
                $(".login-wrapper").removeClass("grid");
                $(".login-wrapper").addClass("hidden");
                $(".signup-wrapper").removeClass("hidden");
                $(".signup-wrapper").addClass("grid");
            }
        })
    </script>
</body>

</html>
