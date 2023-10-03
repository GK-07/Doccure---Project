<?php
require('./instamojo.php');
const API_KEY ="ca0fc5891f0edf21582ed9dad1423bba";
const AUTH_TOKEN = "a75a39e9ceee8330fc39e68cc7559871";

$api = new Instamojo\Instamojo(API_KEY,AUTH_TOKEN,'https://www.instamojo.com/api/1.1/');
if(isset($_POST['purpose']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['amount']))
{
    
    
     try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $_POST['purpose'],
            "buyer_name" => $_POST['name'],
            "amount" => $_POST['amount'],
            "send_email" => true,
            "phone"=>'9427967800',
            "send_sms"=>true,
            "email" => $_POST['email'],
            "redirect_url" => "http://localhost/instamojopayment/success.html"
            ));
        echo "<pre>";
        print_r($response);
        header('Location:'. $response['longurl']);
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());

    }
    
}
echo "<pre>";
print_r($api->paymentRequestStatus('a21ba2882f8e4ebd8c9b5001a278ad7c'));
?>