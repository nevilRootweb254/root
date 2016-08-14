<?php
error_reporting(0);
$server = "localhost";
$username = "root";
$password = "1995";
$db = "art_gallary";
$conn = mysql_connect($server,$username,$password) or die('unable to connect');
$data = mysql_select_db($db) or die('error connecting');
/*$select = "CREATE TABLE art_gallary_table(
user_id INT PRIMARY KEY AUTO_INCREMENT ,
firstname VARCHAR(15) NOT NULL,
secondname VARCHAR(15) NOT NULL,
username VARCHAR(15) NOT NULL UNIQUE KEY,
password VARCHAR(255) NOT NULL UNIQUE KEY,
country VARCHAR(25) NOT NULL,
city VARCHAR(25) NOT NULL, 
phone_number INT(25) NOT NULL UNIQUE KEY, 
email VARCHAR(40) NOT NULL UNIQUE KEY,
profilepicture VARCHAR(500) NOT NULL,
sex CHAR(15) NOT NULL ,
age INT(15) NOT NULL , 
type_of_art VARCHAR(3000) NOT NULL,
art_description VARCHAR(3000) NOT NULL,
sighn_up_date TIMESTAMP
)";
$create = "CREATE DATABASE art_gallary";
$created = mysql_query($create,$conn) or die('error creating the table');
$table = mysql_query($select,$conn);
if($table ==1){
	echo 'created table 1';
}


$com = "CREATE TABLE posts_gallary(
post_id INT PRIMARY KEY AUTO_INCREMENT ,
user_id INT  NOT NULL ,
post VARCHAR(3000) NOT NULL,
likes VARCHAR(300) NOT NULL,
dislikes VARCHAR(3000) NOT NULL ,
commentpic VARCHAR(3000) NOT NULL,
post_date TIMESTAMP
)";
$tablecom = mysql_query($com,$conn);
if($tablecom ==1){
	echo 'created table 3';
}
*/
mysql_close($conn);

?>