//Logging function that is part of finalServer2.php

<?php

function sendErrors($id)
{

if ($id == "fe") {
        $file = fopen("frontLog.txt", "r");
        $errorList = array();
        while(!feof($file)){
              $line = fgets($file);
              $errorList[] = $line;
              }
        fclose($file);
$response = $errorList;
return $response;


}
if ($id == "be") {
        $file = fopen("backLog.txt", "r");
        $errorList = array();
        while(!feof($file)){
              $line = fgets($file);
              $errorList[] = $line;
              }
        fclose($file);
$response = $errorList;
return $response;

}
if ($id == "db") {
        $file = fopen("dbLog.txt", "r");
        $errorList = array();
        while(!feof($file)){
              $line = fgets($file);
              $errorList[] = $line;
              }
        fclose($file);
$response = $errorList;
return $response;

}
}
?>