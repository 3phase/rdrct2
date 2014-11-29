<?
Class Elements {

	public function Headings($title, $mainURL) {		// $title = rdrct2.eu - URL Shortener; $mainURL = localhost
		$heading = "
<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<title>" . $title . "</title>\r\n<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>\r\n<link href='css/mainStyle.css' rel='stylesheet' type='text/css'>\r\n<link rel=\"canonical\" href=\"" . $mainURL . "/\" />\r\n<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js\"></script>\r\n<meta charset=\"utf-8\" />\r\n<meta name=\"description\" content=\"URL shortener\" />\r\n<meta name=\"keywords\" content=\"redirect, url, shorten, link, url shortener\" />\r\n<meta property=\"og:url\" content=\"" . $mainURL . "\" />\r\n<meta property=\"og:title\" content=\"rdrct2 - URL Shortener\" />\r\n<meta property=\"og:description\" content=\"URL shortener\" />\r\n<meta property=\"og:type\" content=\"website\" />\r\n<meta property=\"og:image\" content=\"" . $mainURL . "/logo.png\" />\r\n</head>\r\n<body>\r\n";
		return $heading;
	}

	public function Submit_Form($placeholder) {
		$submitForm = "
<form action='#' method='POST'><p>Shorten your URL.</p>\r\n    <input class='url-taker' id='urlTake' size='42' name='longURL' type='text' placeholder='" . $placeholder . "'>\r\n    <input type='submit' value='Go' name='subButton' id='take-url' onClick='checkProtocol()'>\r\n   </form>\r\n";
		return $submitForm;
	}

	public function Output_Form($paragraph, $value) {
		$outputForm = "
<form action='#' method='POST'><p>" . $paragraph . "</p>\r\n          <input class='url-taker' size='42' name='longURL' type='text' value='" . $value . "'> \r\n        <input type='submit' value='Go' name='subButton' id='take-url'> \r\n        </form>";
		return $outputForm;
	}

}
?>