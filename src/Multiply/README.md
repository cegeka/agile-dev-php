# Multiply

The goal of this exercise is to write your first unit tests, checking the functionality of the Multiply class. The class itself is an array wrapper that features two methods:

* load: Loads data into the elements field.
* multiplyElementsWith: Multiplies all of the elements with a particular number and returns them.

## Steps

1. Run unit tests using 'phpunit -c phunit.xml' or via the IDE.
2. Two tests should be present, but they are both incomplete. This marks that the tests need to be verified.
3. Start testing the "load" method of the Multiply class.
4. Test the multiplyElementsWith method of the Multiply class.
5. Write a test checking the multiplyElementsWith method when a character or string is passed as the argument.
6. Fix the multiplyElementsWith method so that when anything apart from an integer is passed, null is returned.