<?php
/**
 * Copyright © 2016 GBKSOFT. Web and Mobile Software Development.
 * See LICENSE.txt for license details.
 */
namespace gbksoft\multithread;

/**
 * Interface WorkerInterface
 */
interface WorkerInterface extends ResultInterface
{
    /**
     * Run task
     */
    public function run();
}
