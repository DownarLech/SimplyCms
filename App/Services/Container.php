<?php
declare(strict_types=1);

namespace App\Services;

class Container
{
    private array $storeClass = [];


    public function __construct()
    {
    }

    /**
     * @param array $storeClass
     */
    public function set($id, $class): void
    {
        $this->storeClass[$id] = $class;
    }

    public function get($id) {

        if(isset($this->storeClass[$id])) {
            return $this->storeClass[$id];
        } else {
            echo 'There is no such a object';
        }
    }
}