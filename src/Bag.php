<?php

namespace Header;

/**
 * Class Bag
 * @package Header
 */
class Bag
{

    /**
     * @var array
     */
    private $bag = [];

    /**
     * @param $header
     * @param $value
     * @param bool $replace
     */
    public function set($header, $value, $replace = true)
    {
        if(empty($header) || empty($value)) {
            throw new \LogicException('Parameters cannot be empty');
        }

        $this->bag[] = [
            'header' => $header,
            'value' => $value,
            'replace' => $replace
        ];
    }

    /**
     * @param array ...$headers
     */
    public function bulkSet(...$headers)
    {
        if(empty($headers)) {
            throw new \LogicException('Parameter cannot be empty');
        }

        // Get only the first 3 values
        foreach($headers as $key => $value) {
            if(empty($value[0])) {
                throw new \LogicException('First value of each array should be the header');
            }
            if(empty($value[1])) {
                throw new \LogicException('Second value of each array should be the header value');
            }

            $this->bag[] = [
                'header' => $value[0],
                'value' => $value[1],
                'replace' => isset($value[2]) ? $value[2] : true,
            ];
        }
    }

    /**
     * @param $header
     */
    public function delete($header)
    {
        foreach($this->bag as $key => $value) {
            if($value['header'] === $header) {
                unset($this->bag[$key]);
            }
        }
    }

    /**
     * @param $header
     * @return array
     */
    public function get($header)
    {
        $return = [];

        foreach($this->bag as $key => $value) {
            if($value['header'] === $header) {
                $return[] = $this->bag[$key];
            }
        }

        return $return;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->bag;
    }

    /**
     * @param $header
     * @return bool
     */
    public function has($header)
    {
        foreach($this->bag as $key => $value) {
            if($value['header'] === $header) {
                return true;
            }
        }

        return false;
    }
}