#!/usr/bin/env php

<?php

require (realpath(dirname(__FILE__) . '/../src/settee.php'));

$server = new SetteeServer('http://127.0.0.1:5984');
$dname = 'irakli';
$db = $server->get_db('irakli');

try {
  $server->create_db($db);
} catch (Exception $e) {
  print_r("database irakli already exists! \n");
}

$doc = new StdClass();
$doc->firstName = "irakli";
$doc->lastName = "Nadareishvili";
$doc->IQ = 200;
$doc->hobbies = array("skiing", "swimming");
$doc->pets = array ("whitey" => "labrador", "mikey" => "pug");

// Should work with json string as well:
//$doc = '{"firstName":"irakli","lastName":"Nadareishvili","IQ":200,"hobbies":["skiing","swimming"],"pets":{"whitey":"labrador","mikey":"pug"}}';

$doc = $db->create($doc);

$db_doc = $db->get($doc->id);
print_r($db_doc);


