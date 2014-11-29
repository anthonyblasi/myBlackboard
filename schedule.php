<? include ("top.php"); ?>

<body id="schedule">


<? include ("nav.php"); ?>
<img src="LAX.png" alt="descriptive text" />

<article id="main">
    <h1>Important Dates</h1>
<?php
/* Sample code to open a plain text file and put the data into an array */

$debug = false;

if(isset($_GET["debug"])){
    $debug = true;
}



//The name of the file where you will edit the content of the roster table.
//If you add or delete any columns in the csv file, make sure to change the amount of 
//headers and rows underneath.
$filename = "schedule.csv";

if ($debug) print "\n\n<p>filename is " . $filename;
/* have the file in the same folder as this file
 * be sure permissions are set properly
 * if it does work then it is the end of line mark in your csv file
 * check your code with my joe pond sample and see if it works
 * 
 */

$file=fopen($filename, "r");


/* the variable $file will be empty or false if the file does not open */
if($file){
    if($debug) print "<p>File Opened. Begin reading data into an array.</p>\n";

    /* This reads the first row which in our case is the column headers */
    $headers=fgetcsv($file);
    
   
    while(!feof($file)){
        $records[]=fgetcsv($file);
    }
    
    //closes the file
    fclose($file);
    if($debug) {
        print "<p>Finished reading. File closed.</p>\n";
        print "<p>Contents of my array<p><pre> "; print_r($records); print "</pre></p>";
    }
} else {
    if($debug) print "<p>File Opened Failed.</p>\n";
}
//This is all the headers of the tables.  Make sure amount of headers in data.csv matches up with this
//Headers
//_________________________________________________________________________________
 echo '<table align = "center">';
 print '<tr><th>' . $headers[0] . '</th><th> ' . $headers[1] . '</th><th> ' . $headers[2] . '</th><th> ' . $headers[3] . '</th></tr>' . "\n";

//This is each row that goes under each header.  Should be same amount of headers
//Rows
//__________________________________________________________________________________
foreach($records as $oneRecord){
    
	print '<tr><td>' . $oneRecord[0] . '</td><td> ' . $oneRecord[1] . '</td><td> ' . $oneRecord[2] . '</td><td> ' . $oneRecord[3] . '</td></tr>' . "\n";
}
echo '</table>';   


?>
</article>



</body>
</html>
