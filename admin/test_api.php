<?php
define("CALLBACK_URL", "http://localhost/kamibox-decreative/admin/login.php");
define("AUTH_URL", "https://account.accurate.id/oauth/authorize");
define("ACCESS_TOKEN_URL", "https://account.accurate.id/oauth/token");
define("CLIENT_ID", "45aa88f1-17e8-4f09-bcbe-ae8c0f317f43");
define("SCOPE", "item_view item_save sales_invoice_view");

$url = AUTH_URL . "?"
    . "client_id=" . urlencode(CLIENT_ID)
    . "&response_type=code"
    . "&redirect_uri=" . urlencode(CALLBACK_URL)
    . "&scope=" . urlencode(SCOPE);

// var_dump($url);
header('Location: ' . $url);

// echo urlencode(CLIENT_ID);
