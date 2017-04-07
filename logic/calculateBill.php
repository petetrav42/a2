<?php

require('Form.php');
require ('Calculate.php');

use TIP\Form;
use TIP\Calculate;

$form = new Form($_GET);
$calculateTip = new Calculate();

//Get all the values from the form
$initialBill = $form->get('initialBill','');
$splitNumber = $form->get('splitNumber','');
$service = $form->get('service','');
$roundTip = $form->get('roundTip','');

if ($form->isSubmitted())
{
    //Need to validate the form entries prior to submitting
    $errors = $form->validate(['initialBill' => 'required|decimal',
                               'splitNumber' => 'required|numeric',
                               'service' => 'required']);

    //Only calculate tip if there are no form validation errors
    if (!$errors)
    {
        //Calculate the bill based on service
        $billWithTip = $calculateTip->calculateBillWithTip($initialBill, $splitNumber, $service);

        //Setting the final bill to billWithTip by default to be used in html
        //Only call roundTip and override only if rounding is selected
        //Default is to not round
        $finalBill =  $billWithTip;
        if(!is_null($roundTip))
        {
            $finalBill = $calculateTip->roundTip($billWithTip, $roundTip);
        }
    }
}