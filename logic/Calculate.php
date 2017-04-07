<?php

namespace TIP;

class Calculate{

    public $tipPercentage;

    /**
     * Default Construct
     */
    public function __construct()
    {
        //Create an array to map the service quality to tip percentage
        $this->tipPercentage = ['excellent' => 20,'good' => 18,'average' => 15,'poor' => 10,'horrible' => 0];
    }

    /**
     * Returns the calculated bill depending on the tip amount
     */
    public function calculateBillWithTip($initialBill, $splitNumber, $service)
    {
        //Divide the initial bill amount by the number specified in the form
        //Will only divide if greater than 0 otherwise splitAmount is the initialBill
        if ($splitNumber != 0){
            $splitAmount = $initialBill / $splitNumber;
        }else{
            $splitAmount= $initialBill;
        }

        //calculate the bill with the tip specified in the form.
        //divide tipPercentage by 100 to get percentage in decimal
        $calculateTip = $splitAmount + ($splitAmount * ($this->tipPercentage[$service]/100));

        //Return value needs to be rounded to 2 decimal places.
        return round($calculateTip,2,PHP_ROUND_HALF_UP);
    }

    /**
     * Returns a rounded final bill if rounding is selected
     */
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