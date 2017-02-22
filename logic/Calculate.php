<?php

namespace TIP;

class Calculate{

    private $tipAmount;

    public function __construct()
    {
        //Create an array to map the service quality to tip percentage
        $this->tipAmount = ['excellent' => .2,'good' => .18,'average' => .15,'poor' => .1,'horrible' => 0];
    }

    public function calculateBillWithTip($initialBill, $splitNumber, $tipPercentage)
    {
        //Divide the initial bill amount by the number specified in the form
        //Will only divide if greater than 0 otherwise splitAmount is the initialBill
        if ($splitNumber != 0){
            $splitAmount = $initialBill / $splitNumber;
        }else{
            $splitAmount= $initialBill;
        }

        //calculate the bill with the tip specified in the form.
        $calculateTip = $splitAmount + ($splitAmount * $this->tipAmount[$tipPercentage]);

        //Return value needs to be rounded to 2 decimal places.
        return round($calculateTip,2,PHP_ROUND_HALF_UP);
    }

    public function roundTip($amount, $roundTip)
    {
        //round if indicated
        if ($roundTip == 'roundUp') {
            return $finalBill = ceil($amount);
        } elseif ($roundTip == 'roundDown') {
            return $finalBill = floor($amount);
        }
    }
}