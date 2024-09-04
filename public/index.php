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
        <div id="auth" class="flex justify-center items-end h-full bg-secondary">
            <div id="auth-wrapper-signup" class="h-[50rem] w-full bg-primary px-4 py-6 flex justify-center items-center flex-col" style="border-top-right-radius: 20px;border-top-left-radius: 20px; ">
                <h1 class="font-semibold text-3xl font-font1 text-center text-secondary mb-8">SIGN UP</h1>
                <form action="#" class="w-[80%]">
                    <label for="name" class="block mr-2 mt-4 mb-2 text-gray-500">Name:</label>
                    <input type="text" class="block outline-none w-full h-[3rem] p-2 rounded-md" id="name" autocomplete="off">
                    <label for="username" class="block mr-2 mt-4 mb-2 text-gray-500">Username:</label>
                    <input type="text" class="block outline-none w-full h-[3rem] p-2 rounded-md" id="username" autocomplete="off">
                    <label for="id-number" class="block mr-2 mt-4 mb-2 text-gray-500">ID Number:</label>
                    <input type="number" class="block outline-none w-full h-[3rem] p-2 rounded-md" id="id-number" autocomplete="off">
                    <label for="password" class="block outline-none mr-2 mt-4 mb-2 text-gray-500">Password:</label>
                    <input type="password" class="block outline-none w-full h-[3rem] p-2 rounded-md" id="password" autocomplete="off">
                    <input type="submit" value="Submit" name="submit" class="w-full bg-secondary text-primary rounded-md h-[3rem] mt-8 cursor-pointer transmission hover:border hover:border-secondary hover:bg-transparent hover:text-secondary">
                </form>
                <p class="mt-4 text-sm text-gray-500">Already have an account? <button id="login" class="text-secondary underline">Login</button></p>
            </div>

            <div id="auth-wrapper-login" class="h-[50rem] w-full bg-primary px-4 py-6 hidden justify-center items-center flex-col" style="border-top-right-radius: 20px;border-top-left-radius: 20px; ">
                <h1 class="font-semibold text-3xl font-font1 text-center text-secondary mb-8">LOG IN</h1>
                <form action="#" class="w-[80%]">
                    <label for="username" class="block mr-2 mt-4 mb-2 text-gray-500">Username:</label>
                    <input type="text" class="block outline-none w-full h-[3rem] p-2 rounded-md" id="username" autocomplete="off">
                    <label for="password" class="block outline-none mr-2 mt-4 mb-2 text-gray-500">Password:</label>
                    <input type="password" class="block outline-none w-full h-[3rem] p-2 rounded-md" id="password" autocomplete="off">
                    <input type="submit" value="Submit" name="submit" class="w-full bg-secondary text-primary rounded-md h-[3rem] mt-8 cursor-pointer transmission hover:border hover:border-secondary hover:bg-transparent hover:text-secondary">
                </form>
                <p class="mt-4 text-sm text-gray-500">Don't have an account yet? <button id="signup" class="text-secondary underline">Sign Up</button></p>
            </div>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){

            // AUTHENTICATION

            $("#login").on("click", function(){
                showLogin();
            })

            $("#signup").on("click", function(){
                showSignUp();
            })

            function showLogin (){
                $("#auth-wrapper-signup").removeClass("flex");
                $("#auth-wrapper-signup").addClass("hidden");
                $("#auth-wrapper-login").removeClass("hidden");
                $("#auth-wrapper-login").addClass("flex");
            }
            function showSignUp(){
                $("#auth-wrapper-login").removeClass("flex");
                $("#auth-wrapper-login").addClass("hidden");
                $("#auth-wrapper-signup").removeClass("hidden");
                $("#auth-wrapper-signup").addClass("flex");
            }
        })
    </script>
</body>

</html>
