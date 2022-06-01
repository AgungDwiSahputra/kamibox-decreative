<?php
// function cUrl()
// {
$client_id = "45aa88f1-17e8-4f09-bcbe-ae8c0f317f4";
$client_secret = "a71903ab96e790511816b93508a4f363";
$code = $_GET['code'];


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://account.accurate.id/oauth/token",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "code=$code&grant_type=authorization_code&redirect_uri=https://example.com/aol-oauth-callback",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "Authorization: Basic " . base64_encode("$client_id:$client_secret")
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
// }

// echo cUrl();
