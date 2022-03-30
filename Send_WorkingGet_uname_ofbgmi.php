<?php


// https://airtime.codapayments.com/airtime/new-design-redirect?txnId=6486426607744676200&name=null&email=&phone=

if(isset($_GET['UID'])){
    
$UID = $_GET['UID'];

$url = "https://order-sa.codashop.com/initPayment.action";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "x-amz-apigw-id: PzCPwG4vhcwFsGw=",
   "x-amzn-requestid: 2f80ca76-4c90-48ca-894e-60ba38d2d913",
   "x-amzn-trace-id: Root=1-62444a64-407f42b765092fca346f5078;Sampled=0",
   "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "voucherPricePoint.id=211893&voucherPricePoint.price=380.0&voucherPricePoint.variablePrice=0&n=3%252F30%252F2022-1747&email=&userVariablePrice=0&order.data.profile=eyJuYW1lIjoiICIsImRhdGVvZmJpcnRoIjoiIiwiaWRfbm8iOiIifQ%253D%253D&user.userId=$UID&user.zoneId=&msisdn=&voucherTypeName=BATTLE_GROUND&shopLang=en_IN&checkoutId=56116c12-83f6-4631-9325-a837e4c921bd&affiliateTrackingId=&impactClickId=&anonymousId=11c9d648-1e0e-4053-8095-0ec002747ae8";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);

// echo $resp;

$json = json_decode($resp);

$Uname = $json->confirmationFields->username;

$ErrorMsg = $json->errorMsg;

if($ErrorMsg == "Cannot find openId."){
    
    echo "Please Enter A Valid UID";
    
}

}

?>

