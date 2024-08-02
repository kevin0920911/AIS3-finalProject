<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
require_once 'sentence_manager.php';

$embellishment = new Embellishment($sentence);
$embellished_sentence = $embellishment->getEmbellishedSentence();
echo $embellished_sentence;
?>