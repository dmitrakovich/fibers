<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Swoole\Coroutine as Co;

class AsyncController extends Controller
{
    static $staticList = [];

    public function coroutines(Request $request): void
    {
        dd(
            go(function() {
                Co::sleep(2);
                echo "Done 1\n";
            }),
            go(function() {
                Co::sleep(1);
                echo "Done 2\n";
            })
        );

        self::$staticList[] = mt_rand(0, 10);
        dd(self::$staticList);
    }

    public function fibers(Request $request): void
    {
        $fiber = new \Fiber(function() : void {
            $value = \Fiber::suspend('fiber');
            dump("Value used to resume fiber: $value");
        });

        $value = $fiber->start();
        dump("Value from fiber suspending: $value");

        $fiber->resume('test');
    }
}
