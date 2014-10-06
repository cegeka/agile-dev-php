<?php


class Multiply
{
    /** @var array */
    protected $elements = [];

    /**
     * Load data into the elements array.
     * @param array $elements Data to be loaded into the wrapper.
     */
    public function load(array $elements = [])
    {
        $this->elements = $elements;
    }

    /**
     * Multiply all of the elements with a particular value.
     * @param int $multiplicationValue The value with which the elements are multiplied.
     * @return array The array elements, after they have been multiplied with a particular value.
     */
    public function multiplyElementsWith($multiplicationValue)
    {
        $multipliedArray = [];

        foreach ($this->elements as $element) {
            $multipliedArray[] = $element * $multiplicationValue;
        }

        return $multipliedArray;
    }

    /**
     * @return array
     */
    public function getElements()
    {
        return $this->elements;
    }


} 