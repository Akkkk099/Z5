<?php

$curl = curl_init();
$channel =$_GET['c'];

$url="https://spapi.zee5.com/singlePlayback/getDetails/secure?channel_id=$channel&device_id=31dcb07d-dfc4-467a-bf7d-ff4e498bebd0&platform_name=mobile_web&translation=en&user_language=en,hi,mr&country=IN&state=MH&app_version=4.4.4&user_type=premium&check_parental_control=false&gender=Unknown&uid=72bc0dce-3ce3-403d-b492-b3de0e947513&ppid=31dcb07d-dfc4-467a-bf7d-ff4e498bebd0&version=12&os=android";

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "x-access-token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwbGF0Zm9ybV9jb2RlIjoiV2ViQCQhdDM4NzEyIiwiaXNzdWVkQXQiOiIyMDI0LTA1LTA0VDA3OjQzOjExLjY2N1oiLCJwcm9kdWN0X2NvZGUiOiJ6ZWU1QDk3NSIsInR0bCI6ODY0MDAwMDAsImlhdCI6MTcxNDgwODU5MX0.sN1aM-QSkYNyGMypQN9nMOZZXcicgG_8smHd4YZWIXU",  
  "Authorization": "eyJraWQiOiJlNmxfbGYweHpwYVk4VzBNcFQzWlBzN2hyOEZ4Y0trbDhDV0JaekVKT2lBIiwidHlwIjoiSldUIiwiYWxnIjoiUlMyNTYifQ.eyJzdWIiOiI3MkJDMERDRS0zQ0UzLTQwM0QtQjQ5Mi1CM0RFMEU5NDc1MTMiLCJkZXZpY2VfaWQiOiIzMWRjYjA3ZC1kZmM0LTQ2N2EtYmY3ZC1mZjRlNDk4YmViZDAiLCJhbXIiOlsiZGVsZWdhdGlvbiJdLCJpc3MiOiJodHRwczovL3VzZXJhcGkuemVlNS5jb20iLCJ2ZXJzaW9uIjo2LCJjbGllbnRfaWQiOiJyZWZyZXNoX3Rva2VuIiwiYXVkIjpbInVzZXJhcGkiLCJzdWJzY3JpcHRpb25hcGkiLCJwcm9maWxlYXBpIiwiZ2FtZS1wbGF5Il0sInVzZXJfdHlwZSI6IlJlZ2lzdGVyZWQiLCJuYmYiOjE3MTQ4MTUxMTcsInVzZXJfaWQiOiI3MmJjMGRjZS0zY2UzLTQwM2QtYjQ5Mi1iM2RlMGU5NDc1MTMiLCJzY29wZSI6WyJ1c2VyYXBpIiwic3Vic2NyaXB0aW9uYXBpIiwicHJvZmlsZWFwaSJdLCJzZXNzaW9uX3R5cGUiOiJHRU5FUkFMIiwiZXhwIjoxNzE3NDQ1MTE3LCJpYXQiOjE3MTQ4MTUxMTcsImp0aSI6IjhlM2VkMDhjLWYzNWYtNDE5OS04NmU4LTU1ODQwYTY1NDU4YyJ9.dBVlQ8Qr9Zhsh72pgn_ADyonUcnqBheQDBYBuW8FmTU5nlI3RnjXk2TMmjcv7gftb2JLXrHevoUgp76vk6eUIw6qp8ALTan0hE3fSvZIj5hl2B0UvnmBb5pF1CdmUMlAo4DJ8K8G33oe2ZckfFSObba9y6l81ttilm25l1kEqb7ZE44AMWyXcY8P4jQUXtBTFhSxXTxWDacEtzxq3H4CW6EqN__Dk1a_M6uyxtrnR_qek6Q_l_PC0ov-Sn_fJ36L52Rj2_JG5wcZrVAvGC2AqdZYfQETsp3ZV94GS5kBp-CTVA-5-fybwT1KKx3cpLCz13UiuraqRlATyTWa6dVFlw"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));


$response = curl_exec($curl);
curl_close($curl);

$zx = json_decode($response, true);
$image= $zx["assetDetails"]['image_url'];
$img = str_replace('270x152', '1170x658', $image);
$title= $zx["assetDetails"]['title'];
$playit= $zx["keyOsDetails"]['video_token'];


header("Location: $playit");

?>