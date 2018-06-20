<?php
/**
 * Created by PhpStorm.
 * User: win8
 * Date: 6/20/2018
 * Time: 11:06 PM
 */
$sql ="";
$handle = @fopen("sample.txt", "r");
$values='';





$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}






while (!feof($handle))
{
    $buffer = fgets($handle, 4096);

    $distinct_words=array_unique(str_word_count($buffer, 1));

    $res=count(array_unique(str_word_count($buffer, 1)));
    var_dump("Distinct unique words : ".$res);
    var_dump("Watchlist words:");
    $unique_names=implode("|",$distinct_words);

    foreach($distinct_words as $words){

        var_dump($words);
    }
    $sql = "INSERT INTO watchlist (unique_words)
VALUES ('.$unique_names.')";
    //die();
}



if ($conn->query($sql) === TRUE) {

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();