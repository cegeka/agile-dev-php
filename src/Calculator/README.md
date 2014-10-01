# Calculator

The goal of this exercise is to familiarise yourself with PHPUnit and have your first interaction with the system. You are provided with two classes:

* Calculator - an empty class, with five methods that need to be implemented.
* CalculatorTest - a class with test methods asserting the behaviour of Calculator.

The Calculator class needs to be implemented to support five operations:

* addition
* subtraction
* multiplication
* division
* modulus

## Steps

1. Run PHPUnit through the console command "phpunit -c phpunit.xml" or via PHPStorm.
2. The tests should fail at this point, with each failure being marked appropriately.
3. Look at the testAdd() method in CalculatorTest - it will pass two values to the Calculator class and check if the expected result matches the expectations.
4. Now implement the add method in Calculator, taking into account the format expected by its corresponding test method.
5. Run the tests again - the addition method should be executed correctly.
6. Repeat until all methods have been implemented correctly and all tests pass.