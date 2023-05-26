<!DOCTYPE html>
<html>
<head>
    <title>APY Calculator in PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        background-image: url('https://cdn.wealthfront.com/assets/logged_out/investing_guide/intro_bg-561b3588562915dc0e8fefa7ebe229df0924b2d16053afab2b7908f1c3558cc9.svg');	
}
  .text{
    margin-left:11.5em;
    margin-top:2.5em;
    color:white;
  }
  .form-signin {
    border-radius:9px;
  max-width: 460px;
  padding: 10px 30px 40px;
  margin: 0 auto;
  background-color:	#F5F5F5 ;
  border: 1px solid rgba(0,0,0,0.1);}
  .form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 4px;
		@include box-sizing(border-box);}
     .font{
        font-size:18px;
     }
     h3{
      color:rgb(70,130,190);
     }
     .button{
        background-color: rgb(70,130,180); /* Blue */
  border: none;
  color: white;
  padding: 4px 18px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius:3px ;
     }   
</style>
<body>
    <?php
    if (isset($_POST['calculate'])) {
        $principal = $_POST['principal'];
        $rate = $_POST['rate'] / 100;
        $compoundsPerYear = $_POST['compounds_per_year'];
        $years = $_POST['years'];

        if (is_numeric($principal) && is_numeric($rate) && is_numeric($compoundsPerYear) && is_numeric($years)) {
            $apy = pow((1 + $rate / $compoundsPerYear), ($compoundsPerYear * $years)) - 1;
            $apy *= 100;
        } else {
            echo "Please enter valid values.";
        }
    }
    ?>

    <h1 class="text">APY Calculator</h1>
    <form method="post" action="" class="form-signin">
        <label for="principal"class="font"><b>Principal Amount:</b></label>
        <input type="number" name="principal" class="form-control" id="principal" required="required" step="any" value="<?php echo isset($principal) ? $principal : ''; ?>" />
        <br>
        <label for="rate"class="font"><b>Interest Rate (%):</b></label>
        <input type="number" name="rate"class="form-control" id="rate" required="required" step="any" value="<?php echo isset($rate) ? $rate * 100 : ''; ?>" />
        <br>
        <label for="compounds_per_year" class="font"><b>Compounds per Year:</b></label>
        <input type="number" name="compounds_per_year"class="form-control" id="compounds_per_year" required="required" value="<?php echo isset($compoundsPerYear) ? $compoundsPerYear : ''; ?>" />
        <br>
        <label for="years" class="font"><b>Number of Years:</b></label>
        <input type="number" name="years" class="form-control" id="years" required="required" value="<?php echo isset($years) ? $years : ''; ?>" />
        <br>
        <input type="submit" name="calculate" class="button" value="Calculate APY" />
        <?php if (isset($apy)): ?>
        <h3>APY: <?php echo round($apy, 2); ?>%</h3>
    <?php endif; ?>
    </form>


</body>
</html>
