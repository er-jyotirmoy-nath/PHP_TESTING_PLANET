
<?php

$xml = simplexml_load_file("myxml.xml");
echo $xml->producer[0]->name;
echo $xml->producer[0]->age;

foreach($xml->producer as $





?>
