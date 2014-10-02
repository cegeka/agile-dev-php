<?php

class ArrayManipulator
{
    /** @var array */
    protected $elements = [];

    /**
     * Load data into the array, removing all negative numbers while doing so.
     * Only integers can be loaded.
     * @param array $data
     * @return array The elements array.
     */
    public function load(array $data = [])
    {
        $this->elements = [];

        foreach ($data as $element) {
            if ($this->numberIsNegative($element) || $this->elementIsNotInteger($element)) {
                continue;
            }

            $this->elements[] = $element;
        }

        return $this->getElements();
    }

    /**
     * Add an element into the array. If it is a negative number, it will not be loaded.
     * Only integers can be loaded.
     * @param $element
     * @return array The elements array.
     */
    public function addElement($element)
    {
        if (!$this->numberIsNegative($element) && !$this->elementIsNotInteger($element)) {
            $this->elements[] = $element;
        }

        return $this->elements;
    }

    /**
     * Sort the array in ascending order.
     * @return array The elements array.
     */
    public function sort()
    {
        sort($this->elements);
        return $this->getElements();
    }

    /**
     * Calculate the sum of all the elements in the array.
     * @return int The sum of the elements. Guaranteed to be positive.
     */
    public function sum()
    {
        return array_sum($this->elements);
    }

    /**
     * Return an array with all of the elements that are a multiple of a parameter.
     * @param $multiple The parameter through which all of the other elements are tested through.
     * @return array
     */
    public function elementsMultipleOf($multiple)
    {
        $multipleArray = [];

        foreach ($this->getElements() as $element) {
            if ($element % $multiple !== 0) {
                continue;
            }

            $multipleArray[] = $element;
        }

        return $multipleArray;
    }

    /**
     * Return an array, where all of the elements have been raised to a power.
     * @param int $power The power to which the elements should be raised.
     * @return array The elements array with the elements after they have been raised.
     */
    public function raiseToPower($power)
    {
        if ($power <= 0) {
            return null;
        }

        $powersArray = [];

        foreach ($this->getElements() as $element) {
            $powersArray[] = pow($element, $power);
        }

        return $powersArray;
    }

    /**
     * Print the array as CSV.
     * @return string
     */
    public function __toString()
    {
        if (0 === count($this->getElements())) {
            return 'No data is stored.';
        }

        return 'Data: ' . implode(', ', $this->getElements());
    }

    /**
     * Checks if a number is negative.
     * @param $number
     * @return bool Whether the number is negative or now.
     */
    protected function numberIsNegative($number)
    {
        return $number < 0;
    }

    /**
     * Checks if an element is an integer.
     * @param $element
     * @return bool Whether the element is an integer or not.
     */
    protected function elementIsNotInteger($element)
    {
        return ($element !== intval($element));
    }

    /**
     * DO NOT TEST GETTERS AND SETTERS.
     * @return array
     */
    public function getElements()
    {
        return $this->elements;
    }
}