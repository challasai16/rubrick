<?php

$cname = $_REQUEST['cname'];
$cemail = $_REQUEST['cemail'];

$ccomment = $_REQUEST['ccomment'];
$cmobile = $_REQUEST['cmobile'];

if(isset($cname) && $cname!=" " && $cemail && $cemail !=" " && $ccomment!=" " && $cmobile !=" "){
    
$to = "squareselectestates@gmail.com";
$subject = "Lead rubrick";
$txt ="Name = ". $cname . "\r\n  Email = " . $cemail . "\r\n  Mobile = " . $cmobile . "\r\n Message =" . $ccomment;
$headers = "From: $cemail";


if($cemail!=NULL){
    
    $curl = curl_init();

curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://app.sell.do/api/leads/create?api_key=d741135290d1cd7ee9522a2c5b167c74&sell_do[form][lead][name]=qawert&sell_do[form][lead][phone]=909090*&sell_do[form][lead][email]=&sell_do[form][note][content]=&sell_do[campaign][srd]=*&sell_do[form][lead][project_id]=643400b00ad1ff36f7386fa0
// ',
  
  CURLOPT_URL => 'https://portal-api.clove.build/api/tpi/website/lead',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{ 
        "property": "xxx", 
         "name": "'.$cname.'", 
        "email": "'.$cemail.'", 
        "mobileNo": "'.$cmobile.'", 
        "subSource":"", 
        "isOtpVerified":false, 
        "utmSource":"Google", 
        "utmMedium":"Search", 
        "utmCampaign":"Wd_Lead_Gen_Search_Hyderabad", 
        "utmTerm":"Plots_Hyderabad_New", 
        "utmContent":"Responsive" 
} ',
  CURLOPT_HTTPHEADER => array(
    'x-api-key: 23/rOXxSj5D7ZVHyDbjJSmUG7PHGLQiRPmze06aYTGDstThrO7IsdA==',
    'Content-Type: application/json',
    'Cookie: ARRAffinity=649a585948a9dab7c49ed21ca8b0c483f88112e6b33b4a3c5047bd1d5310a3a8; ARRAffinitySameSite=649a585948a9dab7c49ed21ca8b0c483f88112e6b33b4a3c5047bd1d5310a3a8'
  ),
));

$response = curl_exec($curl);
curl_close($curl);
   mail($to,$subject,$txt,$headers);
   header("Location: https://www.rubrick.in/thankyou");
   die();
}

    
  
}else{
    header("Location: https://www.rubrick.in/golden-tulip");
die();
}



?>