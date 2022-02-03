<html>

<head>
</head>

<body>

	<?php

	$numbers = array(1, 2, 3, 4, 5, true, "Pakistan");

	echo "<h1>By for loop </h1>";
	for ($a = 0; $a < count($numbers); $a++) {
		echo "Value is: " . $numbers[$a] . "<br>";
	}

	echo "<h1>By foreach loop </h1>";
	//Iterate your array
	foreach ($numbers as $value) {
		echo "Value is " . $value . " <br />";
	}



	//************************* 

	echo "<h1> Second method to create array. </h1>";
	/* Second method to create array. */
	$numbers[0] = "one";
	$numbers[1] = "two";
	$numbers[2] = "three";
	$numbers[3] = "four";
	$numbers[4] = "five";

	foreach ($numbers as $value) {
		echo "Value is $value <br />";
	}


	//************************* 

	//Associative Arrays  ( https://www.w3schools.com/php/php_arrays_associative.asp )
	// Associative arrays are arrays that use named keys that you assign to them.

	echo "<h1> Associative Arrays Example  </h1>";

	$salaries = array("MCSf1" => 2000, "MCSf2" => 1000, "MCSf3" => 500);

	//Print values
	foreach ($salaries as $salary) {
		echo "Salary is $salary <br>";   //  print as Salary is 2000
	}

	echo "<br>";

	foreach ($salaries as $i => $i_value) {   //  variable for  key value may have any name  
		echo "Key= " . $i . ", Value= " . $i_value; //  print as Key= MCSf1, Value= 2000
		echo "<br>";
	}

	echo "<br>";
	echo "Salary of MCSf1 is " . $salaries["MCSf1"] . "<br>";  //  print as Salary of MCSf1 is 2000
	echo "Salary of MCSf2 is " . $salaries["MCSf2"] . "<br>";
	echo "Salary of MCSf3 is " . $salaries["MCSf3"] . "<br>";


	//************************* 

	//Multidimensional Arrays

	echo "<h1> Multidimensional Arrays  </h1>";
	$array = array(
		"d1" => array("id" => 1, "Name" => "Bilal1"),
		"d2" => array("id" => 2, "Name" => "Bilal2")
	);


	foreach ($array as $item) {
		print_r($item);
		echo "<br>";
		echo "ID is: " . $item["id"] . " and Name is:" . $item["Name"] . "<br>";
	}


	//print_r($array);   //  Array ( [d1] => Array ( [id] => 1 [Name] => Bilal1 ) [d2] => Array ( [id] => 2 [Name] => Bilal2 ) )
	var_dump($array);   // array(2) { ["d1"]=> array(2) { ["id"]=> int(1) ["Name"]=> string(6) "Bilal1" } ["d2"]=> array(2) { ["id"]=> int(2) ["Name"]=> string(6) "Bilal2" } }

	//************************* 

	echo "<h1> Multidimensional Arrays second Example  </h1>";

	$cars = array(
		array("Volvo", 22, 18),
		array("BMW", 15, 13),
		array("Saab", 5, 2),
		array("Land Rover", 17, 15)
	);

	echo $cars[0][0] . ": In stock: " . $cars[0][1] . ", sold: " . $cars[0][2] . ".<br>";
	echo $cars[1][0] . ": In stock: " . $cars[1][1] . ", sold: " . $cars[1][2] . ".<br>";
	echo $cars[2][0] . ": In stock: " . $cars[2][1] . ", sold: " . $cars[2][2] . ".<br>";
	echo $cars[3][0] . ": In stock: " . $cars[3][1] . ", sold: " . $cars[3][2] . ".<br>";



	?>


	<h1> Testing </h1>
</body>

</html>