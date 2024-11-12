<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succes</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body class="font-font2">
    <div class="wrapper grid place-content-center h-screen w-screen">
        <div class="success w-[80vw] h-[40vh] md:w-[30vw] md:h-[40vh]  rounded-lg shadow-md flex flex-col justify-center items-center p-2">
            <div class="check border bg-green-400 flex items-center justify-center w-fit rounded-full p-3">
                <i class="fa-solid fa-check text-3xl text-green-700"></i>
            </div>
            <div class="text-center mt-4">
                <h1 class="font-bold text-xl">Payment Successful</h1>
                <p class="text-xs mt-2">Thank you for paying ✨</p>
            </div>
            <button id="backHome" class="bg-secondary transmission border border-secondary p-2 text-primary hover:text-secondary hover:bg-primary cursor-pointer rounded-lg mt-8 text-sm">Back to Home</button>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script>
        $("#backHome").on('click', function(){
            window.location.replace("http://localhost/hustle/financial_portal/public/home.php");
        })
    </script>
</body>
</html>
