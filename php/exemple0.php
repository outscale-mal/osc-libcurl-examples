<?php

//
// REQUIRE PHP 8.2 OR SUPERRIOR
// This message been writed in 2022. Most likelly you need to recompille it.
// it's like ./buildroor; ./configure --with-curl; make -jNUMBER_OF_CORE_FLEX; ./sapi/cli/php PATH/TO/THIS/FILE
//

define("AK_SIZE", 20);
define("SK_SIZE", 40);

$ak = getenv("OSC_ACCESS_KEY");
$sk = getenv("OSC_SECRET_KEY");

$ak_sk = $ak.":".$sk;

$c = curl_init();

$hs[] = "Content-Type: application/json";

curl_setopt($c, CURLOPT_HTTPHEADER, $hs);
curl_setopt($c, CURLOPT_URL, "https://api.eu-west-2.outscale.com/api/v1/ReadImages");
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($c, CURLOPT_POSTFIELDS, "");
curl_setopt($c, CURLOPT_AWS_SIGV4, "osc");
curl_setopt($c, CURLOPT_USERPWD, $ak_sk);
curl_setopt($c, CURLOPT_POSTFIELDS, '{"Filters": { "ImageNames":["*Arch*"]}}');

$res = curl_exec($c);

echo $res . PHP_EOL;

curl_close($c);

?>
