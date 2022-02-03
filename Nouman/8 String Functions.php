<?php 

$name = "Harry is a good boy";
echo $name;
echo "<br>";

echo "The length of " . "my string is " . strlen($name);
echo "<br>";
echo str_word_count($name);
echo "<br>";
echo strrev($name);
echo "<br>";
echo strpos($name, "Harry"); //  give position of Harry in the name string
echo "<br>";
echo str_replace("Harry", "Rohan", $name);  // replace harry string string with Rohan in the string name
echo "<br>";
echo str_repeat($name, 4); //  repeat string 4 times
echo "<br>";

// pre tag show all spaces in a text node as it is
echo "<pre>";
echo rtrim("    this is a good boy     "); // remove right spaces
echo "<br>";
echo ltrim("    this is a good boy     "); // remove left spaces
echo "</pre>";

$trimit = 'junk awesome stuff junk';
$trimmed = trim ( $trimit, 'junk' );
print_r ( $trimmed );   // awesome stuff 


$blog = 'Your Blog is Excellent!';
echo substr($blog, 1);  //  substr(string string, int start[, int length] );
//  returns 'our Blog is Excellent!'
echo "<br>";

$blog = 'Your Blog is Excellent!';
echo substr($blog, -9);
//  returns 'xcellent!'
echo "<br>";

$blog = 'Your Blog is Excellent!';
substr($blog, 0, 4);
// returns 'Your'

substr($blog, 5, -13);
//returns 'Blog'

$person = 'these people need to get working!';
strtoupper ( $person ); // THESE PEOPLE NEED TO GET WORKING!
strtolower ( $person );

// *************

if (is_string ( 7 )) {
	echo "Yes";
} else {
	echo "No";
}
// No

if (is_string ( "Lucky Number 7" )) {
	echo "Yes";
} else {
	echo "No";
}
// Yes



?>
