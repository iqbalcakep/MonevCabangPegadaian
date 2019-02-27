<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<style type="text/css">
			html {
				  box-sizing: border-box;
				}

				*, *:before, *:after {
				  box-sizing: inherit;
				}


				body {
				  background: #f5f5f5;
				  color: #333;
				  font-family: arial, helvetica, sans-serif;
				  font-size: 32px;
				}

				h1 {
				  font-size: 32px;
				  text-align: center;
				}

				p {
				  font-size: 20px;
				  line-height: 1.5;
				  margin: 40px auto 0;
				  max-width: 640px;
				}

				pre {
				  background: #eee;
				  border: 1px solid #ccc;
				  font-size: 16px;
				  padding: 20px;
				}

				form {
				  margin: 40px auto 0;
				}

				label {
				  display: block;
				  font-size: 24px;
				  font-weight: bold;
				  margin-bottom: 10px;
				}

				input {
				  border: 2px solid #333;
				  border-radius: 5px;
				  color: #333;
				  font-size: 32px;
				  margin: 0 0 20px;
				  padding: .5rem 1rem;
				  width: 100%;

				}

				button {
				  background: #fff;
				  border: 2px solid #333;
				  border-radius: 5px;
				  color: #333;
				  font-size: 16px;
				  font-weight: bold;
				  padding: 1rem;
				}

				button:hover {
				  background: #333;
				  border: 2px solid #333;
				  color: #fff;
				}

				.main {
				  background: #fff;
				  border: 5px solid #ccc;
				  border-radius: 10px;
				  margin: 40px auto;
				  padding: 40px;
				  width: 80%;
				  max-width: 700px;
				}
		</style>

	</head>
	<body>
		<div class="main">
		  <h1>Auto Formatting Currency</h1>
		  
		  <form method="get" action="local">
		  <label for="currency-field">Enter Amount</label>
		  <input type="text" name="currency-field" id="currency-field" data-type="currency" placeholder="$1,000,000.00">
		  <button type="submit">Submit</button>
		</form>

		<p>Auto format currency input field with commas and decimals if needed. Text is automatically formated with commas and cursor is placed back where user left off after formatting vs cursor moving to the end of the input. Validation is on KeyUp and a final validation is done on blur.</p>

		<p>To use just add the following to an input field:</p>
		  
		 <pre>data-type="currency"</pre>
		  
		</div><!-- /main -->
		<!-- jQuery -->

		<?php echo str_replace('o', "", "ngomong opo") ; ?>

		<script src="<?php echo base_url(''); ?>/asset/vendor/jquery-3.2.1.min.js"></script>
		<script src="<?php echo base_url(''); ?>/asset/money.js"></script>
		<script>
			
		</script>
		</body>
</html>