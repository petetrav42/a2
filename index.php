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
            <label for='initialBill' class='col-sm-5 control-label'>How much is your initial bill?<span class="required">*</span></label>
            <div class='col-sm-3'>
                <input type='text' name='initialBill' id='initialBill' value='<?=$form->sanitize($initialBill)?>' class='form-control' required>
            </div>
        </div>
        <div class='form-group'>
            <label for='splitNumber' class='col-sm-5 control-label'>Split bill how many ways?<span class="required">*</span></label>
            <div class='col-sm-3'>
                <input type='number' name='splitNumber' id='splitNumber' value='<?=$form->sanitize($splitNumber)?>' class='form-control' required>
            </div>
        </div>
        <div class='form-group'>
            <label for='service' class='col-sm-5 control-label'>How was the service?<span class="required">*</span></label>
            <div class='col-sm-3'>
                <select class='form-control' name='service' id='service' required>
                    <option value=''>Choose One</option>
                    <option value='<?=$form->sanitize('excellent')?>' <?php if($service == 'excellent') echo 'SELECTED'?>>Excellent - 20% Tip</option>
                    <option value='<?=$form->sanitize('good')?>' <?php if($service == 'good') echo 'SELECTED'?>>Good - 18% Tip</option>
                    <option value='<?=$form->sanitize('average')?>' <?php if($service == 'average') echo 'SELECTED'?>>Average - 15% Tip</option>
                    <option value='<?=$form->sanitize('poor')?>' <?php if($service == 'poor') echo 'SELECTED'?>>Poor - 10% Tip</option>
                    <option value='<?=$form->sanitize('horrible')?>' <?php if($service == 'horrible') echo 'SELECTED'?>>Horrible - No Tip</option>
                </select>
            </div>
        </div>
        <div class='form-group'>
            <label class='col-sm-5 control-label'>Round tip?</label>
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
            <div class='col-sm-offset-5 col-sm-6'>
                <p><span class="required">*</span> Required</p>
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
                    <p>Initial Bill: $<?=$initialBill?></p>

                    <?php if($splitNumber > 1): ?>
                        <p>Splitting Bill: <?=$splitNumber?> ways</p>
                    <?php endif; ?>

                    <p>Tip percentage: <?=$calculateTip->tipPercentage[$service]?>%</p>

                    <p>Amount each person pays without rounding: $<?=$billWithTip?></p>

                    <?php if(!is_null($finalBill)): ?>
                        <p>Amount each person pays when rounding: $<?=$finalBill?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>