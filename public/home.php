<?php
session_start();

setcookie('username', $_SESSION['username'], time() + 3600, "/");

if(isset($_POST['logout'])){
    session_destroy();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="font-font2 bg-tertiary text-primary">
    <div class="balance-wrapper p-4 h-screen relative">


        <!-- PROFILE -->
        <div class="profile relative flex items-center justify-between md:flex-col md:justify-start md:items-start md:bg-secondary md:p-4 md:rounded-2xl md:shadow-md">
            <div class="header-wrapper flex items-center justify-between">
                <div class="profile-wrapper">
                    <img src="./image/profile.jpg" class="rounded-full cursor-pointer w-8 h-8" alt="profile-img">
                </div>
                <h1 class="greetings hidden text-secondary text-xl font-bold md:block md:text-primary md:ml-4"></h1>
            </div>
            <div class="burger-btn cursor-pointer md:hidden">
                <div class="burger-line w-5 h-[2px] bg-secondary my-[4px]"></div>
                <div class="burger-line w-5 h-[2px] bg-secondary my-[4px]"></div>
                <div class="burger-line w-5 h-[2px] bg-secondary my-[4px]"></div>
            </div>
            <div class="nav-links hidden md:block mt-8">
                <ul class="flex justify-center flex-col">
                    <li class="mb-2"><a href="#" class="text-sm "><i class="fa-solid fa-house mr-4"></i>HOME</a></li>
                    <li class="mb-2"><a href="#" class="text-sm "><i class="fa-regular fa-money-bill-1 mr-4"></i>PAYMENT</a></li>
                    <li class="mb-2"><a href="#" class="text-sm "><i class="fa-solid fa-list mr-4"></i>HISTORY</a></li>
                </ul>
            </div>
            <button class="logout hidden md:block text-sm absolute bottom-6 left-3"><i class="fa-solid fa-right-from-bracket mr-4"></i>LOGOUT</button>
        </div>


        <!-- BALANCE -->
        <div class="balance relative w-full text-primary md:text-secondary bg-secondary md:bg-primary rounded-2xl p-4 shadow-md">
            <p class="text-xs md:text-sm text-gray-400">Total Tuition Balance</p>
            <p class="text-2xl font-bold mt-1 md:text-5xl md:mt-4">$5,000</p>
            <div class="action-btn mt-2 md:mt-8 md:absolute bottom-4">
                <button class="text-xs border border-primary md:border-secondary px-3 py-1 md:px-4 md:py-2 rounded-md transmission hover:bg-primary md:hover:bg-secondary md:hover:text-primary hover:text-secondary mr-2">Pay Now</button>
            </div>
        </div>
        <!-- UPCOMING PAYMENTS -->
        <div class="upcoming bg-primary rounded-2xl p-4 text-secondary w-full text-xs md:text-sm shadow-md overflow-auto">
            <p class="text-xs md:text-sm text-gray-400">Upcoming Payments</p>
            <div class="due mt-4 flex items-center justify-between">
                <div class="amount">
                    <p class="text-green-500 mb-2 text-xs">Amount:</p>
                    <p class="text-md">$200.00</p>
                </div>
                <div class="date text-end">
                    <p class="text-green-500 mb-2 text-xs">Due Date:</p>
                    <p class="text-md">09-09-2024</p>
                </div>
            </div>
            <div class="due mt-4 flex items-center justify-between">
                <div class="amount">
                    <p class="text-green-500 mb-2 text-xs">Amount:</p>
                    <p class="text-md">$350.00</p>
                </div>
                <div class="date text-end">
                    <p class="text-green-500 mb-2 text-xs">Due Date:</p>
                    <p class="text-md">10-09-2024</p>
                </div>
            </div>
            <div class="due mt-4 flex items-center justify-between">
                <div class="amount">
                    <p class="text-green-500 mb-2 text-xs">Amount:</p>
                    <p class="text-md">$350.00</p>
                </div>
                <div class="date text-end">
                    <p class="text-green-500 mb-2 text-xs">Due Date:</p>
                    <p class="text-md">10-09-2024</p>
                </div>
            </div>
            <div class="due mt-4 flex items-center justify-between">
                <div class="amount">
                    <p class="text-green-500 mb-2 text-xs">Amount:</p>
                    <p class="text-md">$350.00</p>
                </div>
                <div class="date text-end">
                    <p class="text-green-500 mb-2 text-xs">Due Date:</p>
                    <p class="text-md">10-09-2024</p>
                </div>
            </div>
        </div>

        <!-- RECENT TRANSACTIONS -->
        <div class="recent bg-primary rounded-2xl p-4 text-secondary w-full text-xs md:text-sm shadow-md overflow-auto">
            <p class="text-xs md:text-sm text-gray-400 ">Recent Transactions</p>
            <div class="due mt-4 flex justify-between">
                <div class="amount">
                    <p class="text-md">Paid Tuition</p>
                    <p class="text-xs text-gray-400 mt-1 cursor-pointer">Print Receipt</p>
                </div>
                <div class="date text-end">
                    <p class="text-red-500 mb-2 text-xs">-$400.00</p>
                    <p class="text-md">07-09-2024 4:30PM</p>
                </div>
            </div>
            <div class="due mt-4 flex justify-between">
                <div class="amount">
                    <p class="text-md">Paid Tuition</p>
                    <p class="text-xs text-gray-400 mt-1 cursor-pointer">Print Receipt</p>
                </div>
                <div class="date text-end">
                    <p class="text-red-500 mb-2 text-xs">-$300.00</p>
                    <p class="text-md">06-09-2024 5:29PM</p>
                </div>
            </div>
            <div class="due mt-4 flex justify-between">
                <div class="amount">
                    <p class="text-md">Paid Tuition</p>
                    <p class="text-xs text-gray-400 mt-1 cursor-pointer">Print Receipt</p>
                </div>
                <div class="date text-end">
                    <p class="text-red-500 mb-2 text-xs">-$420.00</p>
                    <p class="text-md">05-09-2024 8:41AM</p>
                </div>
            </div>
            <div class="due mt-4 flex justify-between">
                <div class="amount">
                    <p class="text-md">Paid Tuition</p>
                    <p class="text-xs text-gray-400 mt-1 cursor-pointer">Print Receipt</p>
                </div>
                <div class="date text-end">
                    <p class="text-red-500 mb-2 text-xs">-$420.00</p>
                    <p class="text-md">05-09-2024 8:41AM</p>
                </div>
            </div>
            <div class="due mt-4 flex justify-between">
                <div class="amount">
                    <p class="text-md">Paid Tuition</p>
                    <p class="text-xs text-gray-400 mt-1 cursor-pointer">Print Receipt</p>
                </div>
                <div class="date text-end">
                    <p class="text-red-500 mb-2 text-xs">-$420.00</p>
                    <p class="text-md">05-09-2024 8:41AM</p>
                </div>
            </div>
            <div class="due mt-4 flex justify-between">
                <div class="amount">
                    <p class="text-md">Paid Tuition</p>
                    <p class="text-xs text-gray-400 mt-1 cursor-pointer">Print Receipt</p>
                </div>
                <div class="date text-end">
                    <p class="text-red-500 mb-2 text-xs">-$420.00</p>
                    <p class="text-md">05-09-2024 8:41AM</p>
                </div>
            </div>
        </div>
    </div>

    <!-- NAV MOBILE -->
    <div class="nav fixed top-0 left-0 w-screen h-screen bg-secondary hidden p-3">
        <button class="exit-btn">
            <div class="w-5 h-[2px] bg-primary m-2 rotate-45 absolute"></div>
            <div class="w-5 h-[2px] bg-primary m-2 -rotate-45 absolute"></div>
        </button>

        <div class="nav-links-wrapper mt-8">
            <div class="nav-links">
                <ul class="h-[80vh] flex justify-center items-center flex-col">
                    <li class="mb-8"><a href="#" class="text-5xl transmission hover:underline hover:text-blue-300">HOME</a></li>
                    <li class="mb-8"><a href="#" class="text-5xl transmission hover:underline hover:text-blue-300">PAYMENT</a></li>
                    <li class="mb-8"><a href="#" class="text-5xl transmission hover:underline hover:text-blue-300">HISTORY</a></li>
                    <li class="mb-8"><button class="logout text-5xl transmission hover:underline hover:text-blue-300">LOGOUT</button></li>
                </ul>
                </ul>
            </div>
        </div>
    </div>





    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {


            // GET USERNAME

            function getCookieValue(name) {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
            }

            const phpSessionId = getCookieValue('PHPSESSID');
            const uname = getCookieValue('username');

            $(".greetings").html(`${uname}`);

            // TOGGLE NAV

            $(".burger-btn").on("click", function() {
                $(".nav").toggleClass("show");
            });

            $(window).resize(function() {
                if ($(window).width() >= 768) {
                    $(".nav").removeClass("show");
                }
            });

            $(".exit-btn").on("click", function() {
                $(".nav").removeClass("show");
            });

            // LOGOUT
            $(".logout").on("click", function(){
                $.ajax({
                        url: "index.php",
                        method: 'POST',
                        data: {logout: true},
                    })
                    .done(function(html) {
                        window.location.replace("http://localhost/hustle/financial_portal/public/index.php");
                    });
            })


        })
    </script>
</body>

</html>
