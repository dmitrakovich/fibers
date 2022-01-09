<?php

$fiber = new Fiber(function() : void {
    $value = Fiber::suspend('fiber');
    echo "Value used to resume fiber: $value <br>";
});

$value = $fiber->start();
echo "Value from fiber suspending: $value <br>";
$fiber->resume('test');
