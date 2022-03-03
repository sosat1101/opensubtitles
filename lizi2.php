<?php
ob_start(function($ctc) { static $a = 0; return $a++ . '- ' . $ctc . "\n";}, 10);
ob_start(function($ctc) { return ucfirst($ctc); }, 3);
echo "fo";
sleep(2);
echo 'o';
sleep(2);
echo "barbazz";
sleep(2);
echo "hello";