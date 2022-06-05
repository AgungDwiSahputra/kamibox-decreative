<?php
include "../api/connect/connect_api.php";

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
    CURLOPT_POSTFIELDS => "code=$code&grant_type=authorization_code&redirect_uri=http://localhost/kamibox-decreative/admin/api/get_token.php",
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
    include '../../connect_db.php';

    $data = json_decode($response);

    $access_token = $data->access_token;
    $token_type = $data->token_type;
    $refresh_token = $data->refresh_token;
    $expires_in = $data->expires_in;
    $scope = $data->scope;
    $referrer = $data->user->referrer;
    $name = $data->user->name;
    $email = $data->user->email;

    $cek_data = "select * from tb_api_accurate";
    $result = $conn->query($cek_data);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $update_data = mysqli_query($conn, "UPDATE tb_api_accurate SET access_token='$access_token', token_type='$token_type', refresh_token='$refresh_token', expires_in='$expires_in', scope='$scope', referrer='$referrer', name='$name', email='$email'");
            if ($update_data == true) {
                header('Location: https://kamibox.decreativeart.com/admin/api/get_database.php');
            }
        }
    } else {
        $insert_data = mysqli_query($conn, "insert into tb_api_accurate (access_token, token_type, refresh_token, expires_in, scope, referrer, name, email) values ('$access_token', '$token_type', '$refresh_token', '$expires_in', '$scope', '$referrer', '$name', '$email')");
        if ($insert_data == true) {
            header('Location: https://kamibox.decreativeart.com/admin/api/get_database.php');
        }
    }
    // echo $response;
}
