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
        include("../lang/nl.lang.php");
        $langarray = $lang_nl;
        break;
}

function lang($langvar) {
		$curlang = $GLOBALS['langarray'];
		return $curlang[$langvar];
}

?>