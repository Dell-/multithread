<?php
/**
 * Copyright © 2016 GBKSOFT. Web and Mobile Software Development.
 * See LICENSE.txt for license details.
 */
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/TestWork.php';

use gbksoft\multithread\TestWork;
use gbksoft\multithread\ThreadPool;

$threadPool = new ThreadPool(8);

$data = [];
for ($i = 0; $i <= 7; ++$i) {
    $data[] = [1];
}

$start = microtime(true);

foreach ($data as $item) {
    $threadPool->add(new TestWork($item));
}

$result = $threadPool->collectResult();

$end = microtime(true);
$time = $end - $start;
$time = round($time, 2);

print "Время выполнения скрипта $time секунд(ы)..." . PHP_EOL;
