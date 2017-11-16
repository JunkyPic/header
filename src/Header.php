<?php

namespace Header;

/**
 * Class Header
 * @package Header
 */
class Header {

    /**
     * @var Bag
     */
    private $bag;

    /**
     * Header constructor.
     * @param Bag $bag
     */
    public function __construct(Bag $bag)
    {
        $this->bag = $bag;
    }

    /**
     * @param int $http_code
     */
    public function commit($http_code = 200) {
        foreach ($this->bag->getAll() as $key => $item) {
            header(trim($item['header'] . $item['value']), (bool)$item['replace'], $http_code);
        }
    }
}
