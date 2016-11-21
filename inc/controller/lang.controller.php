<?php

//Set system language
if (isset($_SESSION["syslang"])) {
	$syslang = $_SESSION['syslang'];
} else {
	$syslang = 'nl';
}

//Process system language
switch ($syslang) {
    case "nl":
        include($_SERVER["DOCUMENT_ROOT"] . "/inc/lang/nl.lang.php");
        $langarray = $lang_nl;
        break;
}

//Create lang array
$curlang = array_merge($lang_nl, $langarray);

//Lang function for displaying variables
function lang($langvar) {
		return $GLOBALS['curlang'][$langvar];
}

?>