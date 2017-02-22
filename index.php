<?php require('logic/calculateBill.php');?>
<!doctype html>
<html lang='en'>
<head>
    <meta charset='utf-8'>

    <title>Assignment 2 - Tip Calculator</title>
    <meta name='description' content='Assignment 2'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='css/style.css'>

</head>
<body>
<div id='mainContainer'>
    <h1 class='text-center'>Tip Calculator</h1>

    <form method='get' action='index.php' class='form-horizontal'>
        <div class='form-group'>
            <label for='initialBill' class='col-sm-5 control-label'>How much is your bill?<span class="required">*</span></label>
            <div class='col-sm-3'>
                <input type='number' name='initialBill' id='initialBill' value='<?=$form->prefill($initialBill)?>' step='.01' class='form-control' required>
            </div>
        </div>
        <div class='form-group'>
            <label for='splitNumber' class='col-sm-5 control-label'>Split how many ways?<span class="required">*</span></label>
            <div class='col-sm-3'>
                <input type='number' name='splitNumber' id='splitNumber' value='<?=$form->prefill($splitNumber)?>' class='form-control'>
            </div>
        </div>
        <div class='form-group'>
            <label for='tipPercentage' class='col-sm-5 control-label'>How was the service?<span class="required">*</span></label>
            <div class='col-sm-3'>
                <select class='form-control' name='tipPercentage' id='tipPercentage'>
                    <option value=''>Choose One</option>
                    <option value='excellent' <?php if($tipPercentage == 'excellent') echo 'SELECTED'?>>Excellent - 20% Tip</option>
                    <option value='good' <?php if($tipPercentage == 'good') echo 'SELECTED'?>>Good - 18% Tip</option>
                    <option value='average' <?php if($tipPercentage == 'average') echo 'SELECTED'?>>Average - 15% Tip</option>
                    <option value='poor' <?php if($tipPercentage == 'poor') echo 'SELECTED'?>>Poor - 10% Tip</option>
                    <option value='horrible' <?php if($tipPercentage == 'horrible') echo 'SELECTED'?>>Horrible - No Tip</option>
                </select>
            </div>
        </div>
        <div class='form-group'>
            <label class='col-sm-5 control-label'>Round Tip?</label>
            <div class='col-sm-3 radio-padding'>
                <p class='radio'><input type='radio' name='roundTip' value='roundUp' <?php if($roundTip == 'roundUp') echo 'CHECKED'?>/>Round Up</p>
                <p class='radio'><input type='radio' name='roundTip' value='roundDown' <?php if($roundTip == 'roundDown') echo 'CHECKED'?>/>Round Down</p>
                <p class='radio'><input type='radio' name='roundTip' value='' <?php if($roundTip == null) echo 'CHECKED'?>/>Don't Round</p>
            </div>
        </div>
        <div class='form-group'>
            <div class='col-sm-offset-5 col-sm-10'>
                <input type='submit' class='btn btn-default'>
            </div>
        </div>
    </form>
    <?php if ($form->isSubmitted()): ?>
        <div class='text-center'>
            <?php if($errors): ?>
                <div class='alert alert-danger'>
                    <?php foreach ($errors as $error): ?>
                        <?=$error?><br />
                    <?php endforeach; ?>
                </div>
            <?php elseif (!$errors): ?>
                <div class='alert alert-success'>
                    <p>Your bill without rounding is: $<?=$billWithTip?></p>
                    <p>Your final bill with rounding is: $<?=$finalBill?></p>
                </div>
            <?php endif; ?>
        </div>
    <? endif; ?>
</div>
</body>
</html>