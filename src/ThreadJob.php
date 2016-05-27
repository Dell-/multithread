<?php
/**
 * Copyright © 2016 GBKSOFT. Web and Mobile Software Development.
 * See LICENSE.txt for license details.
 */
namespace gbksoft\multithread;

/**
 * Class ThreadJob
 */
class ThreadJob extends \Worker implements ResultInterface
{
    /**
     * @var WorkerInterface
     */
    private $task;

    /**
     * Job constructor
     *
     * @param WorkerInterface $task
     */
    public function __construct(WorkerInterface $task)
    {
        $this->task = $task;
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->task->run();
    }

    /**
     * @inheritdoc
     */
    public function getResult()
    {
        return $this->task->getResult();
    }
}
