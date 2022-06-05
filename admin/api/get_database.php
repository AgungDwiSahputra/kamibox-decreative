<?php
include '../../connect_db.php';

$query2 = mysqli_query($conn, "SELECT * FROM tb_api_accurate");
$access_token = "";
while ($row = mysqli_fetch_object($query2)) {
    $access_token .= $row->access_token;
}

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://account.accurate.id/api/open-db.do?id=561984",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "Authorization: Bearer $access_token"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    // echo $response;
    $data = json_decode($response);

    $dataVersion = $data->dataVersion;
    $licenseEnd = $data->licenseEnd;
    $session = $data->session;
    $host = $data->host;
    $accessibleUntil = $data->accessibleUntil;

    $cek_data = "SELECT * FROM tb_database_response_api";
    $result = $conn->query($cek_data);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $update_data = mysqli_query($conn, "UPDATE tb_database_response_api SET access_token='$access_token',dataVersion='$dataVersion', licenseEnd='$licenseEnd', session_db='$session', host='$host', accessibleUntil='$accessibleUntil'");
            if ($update_data == true) {
                echo 'data berhasil di update';
            }
        }
    } else {
        $insert_data = mysqli_query($conn, "INSERT INTO tb_database_response_api (access_token, dataVersion, licenseEnd, session_db, host, accessibleUntil) values ('$access_token','$dataVersion', '$licenseEnd', '$session', '$host', '$accessibleUntil')");
        if ($insert_data == true) {
            echo 'data berhasil di input';
        } else {
            echo "terjadi kesalahan";
        }
    }
    // var_dump($dataVersion);
}
