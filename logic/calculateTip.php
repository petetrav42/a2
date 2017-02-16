<?php
//Require tools for reusable functions
require('tools.php');

//Create an array to map the service quality to tip percentage
$tipPercentages = ['excellent' => .2,'good' => .18,'average' => .15,'poor' => .1];

//Get all the values from the form
$totalBill = (isset($_GET['totalBill'])) ? $_GET['totalBill'] : '';
$tipPercentage = (isset($_GET['tipPercentage'])) ? $_GET['tipPercentage'] : '';
$roundTip = (isset($_GET['roundTip'])) ? $_GET['roundTip'] : '';
$splitBill = (isset($_GET['totalBill'])) ? $_GET['totalBill'] : '';
$splitNumber = (isset($_GET['totalBill'])) ? $_GET['totalBill'] : '';

//
$calculateTip = $totalBill + ($totalBill * $tipPercentages[$tipPercentage]);

//if ($tipPercentage == 'excellent'){
//    $calculateTip = $totalBill + ($totalBill * .2);
//}elseif ($tipPercentage == 'good'){
//    $calculateTip = $totalBill + ($totalBill * .18);
//}elseif ($tipPercentage == 'average'){
//    $calculateTip = $totalBill + ($totalBill * .15);
//}elseif ($tipPercentage == 'poor'){
//    $calculateTip = $totalBill + ($totalBill * .10);
//}else{
//    //Don't need to check for empty value
//    $calculateTip = $totalBill;
//}
//pass bill, percentage, & round
if ($calculateTip !=null){
    $finalBill = roundTip($calculateTip, $roundTip);
}

//dump($totalBill);
//dump($tipPercentage);
//dump($roundTip);
//dump($tipPercentages);
//dump($calculateTip);
//dump($finalBill);

function roundTip($calculateTip, $roundTip)
{
    //round if indicated
    if ($roundTip == 'roundUp') {
        return round($calculateTip,0, PHP_ROUND_HALF_UP);
    } elseif ($roundTip == 'roundDown') {
        return round($calculateTip,0, PHP_ROUND_HALF_DOWN);
    } else {
        //Default is to not round
        return $calculateTip;
    }
}
