<?php
/**
 * Copyright © 2016 GBKSOFT. Web and Mobile Software Development.
 * See LICENSE.txt for license details.
 */
namespace gbksoft\multithread;

/**
 * Class ThreadPool
 */
class ThreadPool
{
    /**
     * @var ThreadJob[]
     */
    private $jobs = [];

    /*
     * ThreadPool constructor
     *
     * @param int $maxThreads
     */
    public function __construct($maxThreads)
    {
        $this->pool = new \Pool($maxThreads);
    }


    /**
     * @param WorkerInterface $thread
     */
    public function add(WorkerInterface $thread)
    {
        $job = new ThreadJob($thread);
        $this->jobs[] = $job;
        $this->pool->submit($job);
    }

    /**
     * @return mixed
     */
    public function collectResult()
    {
        $result = [];

        $isRun = true;
        while ($isRun) {
            foreach ($this->jobs as $job) {
                if ($job->isRunning()) {
                    $isRun = true;
                    break;
                }
                $isRun = false;
            }
            usleep(3500);
        }

        $this->pool->shutdown();
        $this->pool->collect(function (ThreadJob $threadJob) use (&$result) {

            $result[] = $threadJob->getResult();

            return !$threadJob->isRunning();
        });

        return $result;
    }
}
