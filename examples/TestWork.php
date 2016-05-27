<?php
/**
 * Copyright © 2016 GBKSOFT. Web and Mobile Software Development.
 * See LICENSE.txt for license details.
 */
namespace gbksoft\multithread;

/**
 * Class TestWork
 */
class TestWork implements WorkerInterface
{
    /**
     * @var int
     */
    private $data;

    /**
     * Constructor
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        return array_reduce($this->data, function () {
            sleep(10);
            return 1;
        });
    }

    public function getResult()
    {
        return 1;
    }
}
