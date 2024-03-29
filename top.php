<!DOCTYPE html>
<html lang="en">
<head>
<title>UVM Men's Club Lacrosse</title>
<meta charset="utf-8">
<meta name="author" content="Anthony Blasi">
<meta name="description" content="Men's Club Lacrosse Website">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="style.css" type="text/css" media="screen">

        <?php
        $debug = false;

// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// PATH SETUP
//
//  $domain = "https://www.uvm.edu" or http://www.uvm.edu;

        $domain = "http://";
        if (isset($_SERVER['HTTPS'])) {
            if ($_SERVER['HTTPS']) {
                $domain = "https://";
            }
        }

        $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, "UTF-8");

        $domain .= $server;

        $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");

        $path_parts = pathinfo($phpSelf);

        if ($debug) {
            print "<p>Domain" . $domain;
            print "<p>php Self" . $phpSelf;
            print "<p>Path Parts<pre>";
            print_r($path_parts);
            print "</pre>";
        }

// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// inlcude all libraries
//

        require_once('lib/security.php');

        if ($path_parts['filename'] == "contact") {
            include "lib/validation-function.php";
            include "lib/mail-message.php";
            include "../bin/myDatabase.php";
        }
        
          if ($path_parts['filename'] == "confirmation") {
            include "lib/validation-function.php";
            include "lib/mail-message.php";
            include "../bin/myDatabase.php";
        }
          if ($path_parts['filename'] == "approve") {
            include "lib/validation-function.php";
            include "lib/mail-message.php";
            include "../bin/myDatabase.php";
        }
        ?>	

    </head>

