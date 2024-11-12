<?php
include "./config.php";
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$students = $conn->query("SELECT * FROM students")->fetch_all(MYSQLI_ASSOC);
$courses = $conn->query("SELECT * FROM courses")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="bg-gradient-to-b from-secondary to-gray-700 h-screen w-screen grid place-content-center font-font2">

    <div class="h-screen w-screen bg-primary md:grid md:grid-cols-5 md:h-[90vh] md:w-[90vw] md:rounded-xl md:bg-opacity-20 md:shadow-lg">
        <div class="col-span-1 hidden md:block">
            <!-- PROFILE -->
            <div class="profile relative h-full">
                <div class="header-wrapper flex p-3">
                    <div class="profile-wrapper">
                        <img src="./image/profile.jpg" class="rounded-full cursor-pointer w-8 h-8" alt="profile-img">
                    </div>
                    <h1 class="greetings hidden text-secondary text-xl font-bold md:block md:text-primary md:ml-4"></h1>
                </div>
                <ul class="navlinks mt-16 w-full text-primary font-semibold">
                    <li><button id="dashboard-btn" data-section="dashboard" class="py-4 w-full nav-btns active  text-start px-4"><i class="fa-solid fa-house mr-4"></i>Dashboard</button></li>
                    <li><button id="programs-btn" data-section="programs" class="py-4 w-full nav-btns  text-start px-4"><i class="fa-solid fa-book mr-4"></i>Courses</button></li>
                    <li><button id="students-btn" data-section="students" class="py-4 w-full nav-btns  text-start px-4"><i class="fa-solid fa-user mr-4"></i>Students</button></li>
                </ul>
                <button class="logout hidden md:block text-sm text-primary absolute  font-semibold bottom-6 left-4"><i class="fa-solid fa-right-from-bracket mr-4"></i>Logout</button>
            </div>

        </div>
        <div class="col-span-4 m-2 bg-primary rounded-lg md:m-3 md:ml-0 md:shadow-sm relative">
            <!-- BURGER -->
            <div class="burger-btn cursor-pointer md:hidden absolute right-4 top-4">
                <div class="burger-line w-5 h-[2px] bg-secondary my-[4px]"></div>
                <div class="burger-line w-5 h-[2px] bg-secondary my-[4px]"></div>
                <div class="burger-line w-5 h-[2px] bg-secondary my-[4px]"></div>
            </div>
            <div id="dashboard" class="content-sections p-4">
                <p class="font-bold text-2xl text-secondary">Dashboard</p>
                <div class="summary flex items-center space-x-3 mt-3">
                    <div class="sec-1 p-3 bg-secondary text-primary rounded-lg space-y-2 px-4">
                        <p class="font-bold text-xl">₱3,500,000</p>
                        <p class="text-xs">Collected since December</p>
                    </div>
                    <div class="sec-1 p-3 bg-secondary text-primary rounded-lg space-y-2 px-4">
                        <p class="font-bold text-xl">₱500,000</p>
                        <p class="text-xs">Payment in Progress</p>
                    </div>
                </div>

                <div class="barchart mt-3">
                    <canvas id="bar" class="w-full h-[300px] md:h-[200px] p-4"></canvas>
                </div>

                <div class="horizontal mt-3">
                    <canvas id="horizontalBar" class="w-full h-[130px] p-4"></canvas>
                </div>
            </div>

            <div id="programs" class="content-sections hidden p-4">
                <p class="font-bold text-2xl text-secondary">Courses</p>
                <table class="w-full shadow-md mt-8 rounded-lg p-2 overflow-auto">
                    <thead>
                        <tr class="bg-secondary rounded-t-lg text-primary">
                            <th class="text-start p-3">Course</th>
                            <th class="text-start p-3">Department</th>
                        </tr>
                    <tbody>
                        <?php
                        foreach ($courses as $course) {
                            echo "
                                        <tr class='border-t border-secondary'>
                                            <td class='p-3'>" . $course['course_name'] . "</td>
                                            <td class='p-3'>" . $course['department'] . "</td>
                                        </tr>
                                    ";
                        }
                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>

            <div id="students" class="content-sections p-4 hidden">
                <p class="font-bold text-2xl text-secondary">Students</p>
                <table class="w-full shadow-md mt-8 rounded-lg p-2 overflow-auto">
                    <thead>
                        <tr class="bg-secondary rounded-t-lg text-primary">
                            <th class="text-start p-3">Student</th>
                            <th class="text-start p-3">Year</th>
                            <th class="text-start p-3">Course</th>
                            <th class="text-start p-3">Balance</th>
                        </tr>
                    <tbody>
                        <?php
                        foreach ($students as $student) {
                            echo "
                                        <tr class='border-t border-secondary'>
                                            <td class='p-3'>" . $student['name'] . "</td>
                                            <td class='p-3'>" . $student['year'] . "</td>
                                            <td class='p-3'>" . $student['course'] . "</td>
                                            <td class='p-3'>" . $student['balance'] . "</td>
                                        </tr>
                                    ";
                        }
                        ?>
                    </tbody>
                    </thead>
                </table>
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
                <ul class="h-[80vh] flex justify-center items-center flex-col text-primary">
                    <li class="mb-8"><button class="text-5xl transmission hover:underline hover:text-blue-300 nav-btns" data-section="dashboard">Dashboard</button></li>
                    <li class="mb-8"><button class="text-5xl transmission hover:underline hover:text-blue-300 nav-btns" data-section="programs">Courses</button></li>
                    <li class="mb-8"><button class="text-5xl transmission hover:underline hover:text-blue-300 nav-btns" data-section="students">Students</button></li>
                    <li class="mb-8"><button class="logout text-5xl transmission hover:underline hover:text-blue-300">Logout</button></li>
                </ul>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            function getCookieValue(name) {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
            }

            const uname = getCookieValue('username');
            $(".greetings").html(`Admin: ${uname}`);

            // navigation desktop
            const navBtns = document.querySelectorAll('.nav-btns');
            const sections = document.querySelectorAll('.content-sections');

            navBtns.forEach((btn) => {
                btn.addEventListener('click', () => {
                    document.querySelector('.nav').classList.add('hidden');
                    document.querySelector('.nav').classList.remove('show');
                    const id = btn.getAttribute('data-section');
                    showSection(id);
                });
            });

            function showSection(section) {
                sections.forEach((section) => {
                    section.classList.add('hidden');
                });


                document.querySelector(`#${section}`).classList.remove('hidden');
                document.querySelector(`#${section}`).classList.add('block');

                navBtns.forEach((btn) => btn.classList.remove('active'));
                const activeButton = document.querySelector(`#${section}-btn`);
                activeButton.classList.add('active');

            }

            // logout
            $(".logout").on("click", function() {
                $.ajax({
                        url: "index.php",
                        method: 'POST',
                        data: {
                            logout: true
                        },
                    })
                    .done(function(html) {
                        window.location.replace("http://localhost/hustle/financial_portal/public/index.php");
                    });
            })

            // TOGGLE NAV

            $(".burger-btn").on("click", function() {
                document.querySelector('.nav').classList.remove('hidden');
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


        })

        // bar chart
        const data = [{
                month: "January",
                amount: '100,000'
            },
            {
                month: "February",
                amount: '200,000'
            },
            {
                month: "March",
                amount: '100,000'
            },
            {
                month: "April",
                amount: '400,000'
            },
            {
                month: "May",
                amount: '300,000'
            },
            {
                month: "June",
                amount: '200,000'
            },
            {
                month: "July",
                amount: '500,000'
            },
            {
                month: "August",
                amount: '600,000'
            },
            {
                month: "September",
                amount: '400,000'
            },
            {
                month: "October",
                amount: '300,000'
            },
            {
                month: "November",
                amount: '200,000'
            },
            {
                month: "December",
                amount: '200,000'
            },
        ];

        new Chart(
            document.getElementById('bar'), {
                type: 'bar',
                options: {
                    animation: 'ease-in-out',
                    backgroundColor: '#00329F',
                    hoverBackgroundColor: 'transparent',
                    hoverBorderColor: '#00329F',
                    hoverBorderWidth: 1,
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        },
                        title: {
                            display: true,
                            text: 'Monthly Payment History'
                        }
                    }
                },
                data: {
                    labels: data.map(row => row.month),
                    datasets: [{
                        label: 'Monthly Payment History',
                        data: data.map(row => parseInt(row.amount.replace(/,/g, '')))
                    }]
                }
            }
        );

        // horizontal bar chart
        const horizontalData = [{
                method: "Credit Card",
                amount: '80,000'
            },
            {
                method: "Bank Account",
                amount: '10,000'
            },
            {
                method: "Other",
                amount: '1,000,000'
            },

        ];

        new Chart(
            document.getElementById('horizontalBar'), {
                type: 'bar',
                options: {
                    indexAxis: 'y',
                    animation: 'ease-in-out',
                    backgroundColor: '#00329F',
                    hoverBackgroundColor: 'transparent',
                    hoverBorderColor: '#00329F',
                    hoverBorderWidth: 1,
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        },
                        title: {
                            display: true,
                            text: 'Invoice Status by Payment Method'
                        }
                    }
                },
                data: {
                    labels: horizontalData.map(row => row.method),
                    datasets: [{
                        label: 'Invoice Status by Payment Method',
                        data: horizontalData.map(row => parseInt(row.amount.replace(/,/g, '')))
                    }]
                }
            }
        );
    </script>
</body>

</html>
