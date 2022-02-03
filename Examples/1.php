<html>

<head>
</head>

<body>

	<h1> Introduction </h1>

	<!-- this php block is evaluated and its output will be embed here  -->
	<?php
	echo ("Server side Programming Language<br>");  // this text is parse as an html
	echo "PHP: Personal Home Page <br>";
	echo "Now, It stands for Hypertext Preprocessor <br>";

	echo "<input type='text' />";
	echo '<br>';

	$arr = [1, 2, 3, 'usman', true];
	print_r($arr);   //     Array ( [0] => 1 [1] => 2 [2] => 3 [3] => usman [4] => 1 )
	// 	The print_r() function prints the information about a variable in a more human-readable way.
	echo '<br>';
	var_dump($arr);   //   The PHP var_dump() function returns the data type and value:
	echo '<br>';

	foreach ($arr as $a) {
		print "element is " . $a . "<br>";
	}

	//$b = 12;

	echo '<br>';
	echo '<br>';
	echo '<br>';

	if (empty($b)) {
		print "value set to variable";
	}


	?>


</body>

</html>

<!-- 



Important Notes:
Never forget to put a semicolon ( ; ) at the end of a command in PHP as it is a must to terminate it. 


What are the rules for creating a PHP variable?
Following are the rules of creating a PHP variable,

A variable in PHP always starts with a dollar sign.
It cannot start with a number.
A variable can either start with a letter or an underscore
It can only hold alphanumeric characters or underscore.
You can use an alphanumeric character while assigning the name of a variable. For example, using symbols such as “&” or “%” in variable names will produce an error.
Variables in PHP are case-sensitive. It means “$_NAME” and “$_name” are two different variables.


*****************************

PHP is a Loosely Typed Language
In the example above, notice that we did not have to tell PHP which data type the variable is.
PHP automatically associates a data type to the variable, depending on its value. 
Since the data types are not set in a strict sense, you can do things like adding a string to an integer without causing an error.

In PHP 7, type declarations were added. This gives an option to specify the data type expected when declaring a function, 
   and by enabling the strict requirement, it will throw a "Fatal Error" on a type mismatch.

You will learn more about strict and non-strict requirements, and data type declarations in the PHP Functions chapter.
 
****************************
variable scope
https://www.w3schools.com/php/php_variables_scope.asp

-->