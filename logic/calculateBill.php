<?php

require('tools.php');
require('Form.php');
require ('Calculate.php');

use TIP\Form;
use TIP\Calculate;

$form = new Form($_GET);
$calculateTip = new Calculate();

//Get all the values from the form
$initialBill = $form->get('initialBill','');
$splitNumber = $form->get('splitNumber','');
$tipPercentage = $form->get('tipPercentage','');
$roundTip = $form->get('roundTip','');

if ($form->isSubmitted())
{
    dump($form);
    //Need to validate the form entries prior to submitting
    $errors = $form->validate(['initialBill' => 'required|decimal','splitNumber' => 'required|numeric','tipPercentage' => 'required']);

    //Only calculate tip if there are no form validation errors
    if (!$errors){
        //Only call calculateBillWithTip if the user wants to tip based on selected value from the form.
        //if(!is_null($tipPercentage))
        //{
            $billWithTip = $calculateTip->calculateBillWithTip($initialBill, $splitNumber, $tipPercentage);
        //}


        //Setting the final bill to billWithTip by default and will override only if rounding is selected
        $finalBill =  $billWithTip;

        //Only call roundTip if user selected to round up or down.
        //Default is to not round
        if(!is_null($roundTip))
        {
            $finalBill = $calculateTip->roundTip($billWithTip, $roundTip);
        }
    }
}