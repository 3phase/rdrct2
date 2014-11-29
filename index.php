<?
ob_start();
include 'incl/visuals/elements.php';
include 'incl/engine/conn.inc.php';
include 'incl/engine/url_treatements.php';
include_once 'incl/engine/ip_operations.php';
include_once 'analyticstracking.php'; 

$elements = new Elements();
$connection = new Connect_To_DB("localhost", "username", "password", "database");

print $elements -> Headings("rdrct2 - URL Shortener", "localhost");

echo "<div id=\"url-sh-rectangle\">";

if (!isset($_POST['subButton'])) {
  print $elements -> Submit_Form("Paste your URL");
} else {

  log_ip();
  $ip = get_ip();    
  $lurl = $_POST['longURL'];
   
 if($lurl == NULL){
    print $elements -> Submit_Form("Please, don&#39;t left the field unfilled.");
 } else if(!filter_var($lurl, FILTER_VALIDATE_URL)) {
    print $elements -> Submit_Form("The URL is not valid.");
 } else if(strpos($lurl,"http://rdrct2.eu/")) {
    print $elements -> Submit_Form("The URL is already shortened.");
 } else {
    $lurl = mysql_real_escape_string($lurl);  
    check_if_url_contains_protocol_specials($lurl);
    $sql = "SELECT longURL FROM rdrct2 WHERE longURL = '$lurl'";
    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_num_rows($result);
    if ($row !=0 ){
        // compare long url with existing long url and selecting the matching short url
        $existrequest = "SELECT shortURL FROM rdrct2 WHERE longURL = '$lurl'";
        $existrquery = mysql_query($existrequest);      
        if($existrquery){
            while($rowset = mysql_fetch_array($existrquery)){
              $shorturl = $rowset['shortURL'];
              print $elements -> Output_Form("Your URL was shortened.", $shorturl);
            }
        }
    } else {
        // start messing with the short url
        $shurl = generate_hashcode_of_url();
        $shurlcheck = "SELECT shortURL FROM rdrct2 " .
                      "WHERE shortURL = '$shurl';";
        $shresult = mysql_query($shurlcheck) or die(mysql_error());
        $numrows = mysql_num_rows($shresult);
        if (($numrows !=0) || ($shurl == 'about') || ($shurl == 'index')){
          $shurl = generate_hashcode_of_url();
        } else {
          //insert shorturl and longurl into database
          mysql_query("INSERT INTO rdrct2 (shortURL, longURL, ip_address) VALUES ('$shurl', '$lurl', '$ip')");
          print $elements -> Output_Form("Your URL was shortened.", $shurl);
        } 
    }

   $connection -> close_db();
 }

}
include_once 'incl/visuals/footer.html';
?>