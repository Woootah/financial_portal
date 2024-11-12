<?php
include "./config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $convertedAmount = $amount * 100;

    //payment Intent
    $url = "https://api.paymongo.com/v1/payment_intents";
    $data = [
        "data" => [
            "attributes" => [
                "amount" => $convertedAmount,
                "payment_method_allowed" => ["gcash"],
                "currency" => "PHP"
            ]
        ]
    ];

    $headers = [
        "Content-Type: application/json",
        "Authorization: Basic " . base64_encode(PAYMONGO_SECRET_KEY . ":")
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    curl_close($ch);

    $intent_data = json_decode($response, true);
    $payment_intent_id = $intent_data['data']['id'];

    //payment methods
    $url = "https://api.paymongo.com/v1/payment_methods";
    $data = [
        "data" => [
            "attributes" => [
                "type" => "gcash",
                "details" => [
                    "phone_number" => "09959224318"
                ]
            ]
        ]
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    curl_close($ch);

    $payment_method_data = json_decode($response, true);
    $payment_method_id = $payment_method_data['data']['id'];

    // attach payment method to intent
    $url = "https://api.paymongo.com/v1/payment_intents/$payment_intent_id/attach";
    $data = [
        "data" => [
            "attributes" => [
                "payment_method" => $payment_method_id,
                "return_url" => "http://localhost/hustle/financial_portal/public/paid.php"
            ]
        ]
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    curl_close($ch);

    $redirect_data = json_decode($response, true);
    $gcash_url = $redirect_data['data']['attributes']['next_action']['redirect']['url'];
    header("Location: $gcash_url");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Portal</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="font-font2">
    <div class="wrapper h-screen w-screen grid place-content-center">
        <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST" class="bg-primary w-[80vw] md:w-[30vw] h-[80vh] rounded-lg p-4 shadow-md">
            <h1 class="text-2xl font-bold text-secondary mt-4">Payment</h1>
            <div class="wrapper flex items-center justify-center mt-16 px-4 flex-col w-full space-y-4">
                <div class="amount flex flex-col justify-center w-full">
                    <label for="amount" class="text-secondary font-semibold mb-3">Amount</label>
                    <input id="amount" name="amount" type="number" class="border border-secondary outline-none rounded-lg h-8 p-2">
                </div>
                <div class="amount flex flex-col justify-center w-full">
                    <label for="description" class="text-secondary font-semibold mb-3">Description</label>
                    <textarea id="description" name="description" type="text" class="border border-secondary outline-none rounded-lg h-32 resize-none p-2"></textarea>
                </div>
                <input type="submit" value="Submit" class="bg-secondary transmission border border-secondary py-2 w-full text-primary hover:text-secondary hover:bg-primary cursor-pointer rounded-lg">
            </div>
        </form>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
</body>

</html>
