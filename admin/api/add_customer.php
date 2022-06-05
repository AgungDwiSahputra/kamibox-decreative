<?php
include '../../connect_db.php';
$query2 =  mysqli_query($conn, "SELECT * FROM tb_database_response_api");
$access_token = "";
$session_db = "";
$host = "";
while ($row = mysqli_fetch_object($query2)) {
    $access_token .= $row->access_token;
    $session_db .= $row->session_db;
    $host .= $row->host;
}

$curl = curl_init();
$date = date("d/m/Y");

curl_setopt_array($curl, array(
    CURLOPT_URL => "$host/accurate/api/customer/save.do",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "name=Hanafi&transDate=$date&email=coba@mail.com",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "Authorization: Bearer $access_token",
        "X-Session-ID: $session_db"
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
