<?php
include "../../connect_db.php";

$curl = curl_init();
$date = date("d/m/Y");

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://zeus.accurate.id/accurate/api/customer/bulk-save.do",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "name=Hanafi&transDate=$date&email=coba@mail.com",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "Authorization: Bearer c7ab556c-c7f0-4e63-93f8-577784e869bc",
        "X-Session-ID: a94ba35b-c92a-4174-b870-03a11fd8702b"
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
