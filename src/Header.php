<?php

namespace Header;

class Header {

    private $bag;

    public function __construct(Bag $bag)
    {
        $this->bag = $bag;
    }

    public function commit() {

    }
}
