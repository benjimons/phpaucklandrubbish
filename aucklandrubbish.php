<?php
$valuationnumber = "";

    // Defining the basic cURL function
    function curl($url) {
        $ch = curl_init();  // Initialising cURL
        curl_setopt($ch, CURLOPT_URL, $url);    // Setting cURL's URL option with the $url variable passed into the function
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Setting cURL's option to return the webpage data
        $data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
        curl_close($ch);    // Closing cURL
        return $data;   // Returning the data from the function
    }

$aklrubbishscrape = curl("https://akl.eps.blinkm.co/_api/interaction/run/mobi/CollectionResult_xhr?valuation_num=".$valutationnumber);  

$dom = new DOMDocument;
$dom->loadHTML($aklrubbishscrape);
$links = $dom->getElementsByTagName('span');
$i=0;
$stack = array();
foreach ($links as $link){
	
	if($i==0){
		$stack['trash'] = strtotime($link->textContent)."001";
	}else{
		$stack['recycle'] = strtotime($link->textContent)."001";
	}
	$i++;
}
echo json_encode($stack);

?>
