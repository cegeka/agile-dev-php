# Introduction to agile software development in PHP

Welcome to the Cegeka introduction to agile software development in PHP repository. This project was created by Cegeka
as an exercise that can be used by Cegeka to educate PHP developers in the best practices of agile software development.



# Setup

The objective of this exercise is to create a small PHP web application called the 'God Game'. In this game, the user is
a God that will create his own new world in accordance with the rules that have been set by the 'System'. Of course, it
is impossible to create the world in one go. You are required to go through an iterative process and improve your
creation every step of the way, each time making small modifications to your creation until the eco system of your world
is stable.

For these exercises, it is recommended to split up the audience into groups of 2 developers. This is preferred since
this will allow the developers to do pair programming, which essentially a major component of agile software development
within Cegeka. However, it is perfectly possible to perform these exercises individually should this be necessary. It is
also suggested to switch pair after every exercise in order to maximize the spread of knowledge between the developers.



# Exercises

While completing the exercises, the following rules must be respected at all times:

* You can only work on one exercise at a time
* You can only implement what is specified in the acceptance criteria of the exercise, nothing more, nothing less.
* All code must be unit tested. An exercise is not complete until you have a code coverage result of at least 95%
* TDD (test-first) is preferred, though not required
* There is no time limit for any exercise, you can work as long as you want
* There are no technical requirements or limitations on how the exercise is solved. The only requirement is that the
implementation matches the acceptance criteria and that the code is tested



## Exercise 1

* As a Creator I can see the world as a matrix. The world is split in cells and each cell can hold at most 1 living
creature.

| Given                 | When                              | Expected                      |
|-----------------------|-----------------------------------|-------------------------------|
| A world of size 10    | Setting and retrieving a cell     | Return the same cell          |
| A world of size 10    | Getting the world cell count      | The cell count equals 100     |
| A world of size 5     | Getting the world cell count      | The cell count equals 25      |



## Exercise 2

* As a Creator I can see the passing of days by a counter.

| Given                                             | When              | Expected                          |
|---------------------------------------------------|-------------------|-----------------------------------|
| Given a new world which has an age of 0 days      | When day passes   | The age of the world is 1 day     |



## Exercise 3

* First there was grass and each day it aged. I can see that grass appears on a random spot on the world after 7 days.

| Given                             | When              | Expected                                          |
|-----------------------------------|-------------------|---------------------------------------------------|
| Given a world of age 5 days       | After day pass    | World doesn’t contain any cells with grass        |
| Given a world of age 6 days       | After day pass    | World contains 1 cell with grass with age 0       |
| Given a world of age 7 days       | After day pass    | World contains 1 cell with grass with age 1       |



## Exercise 4

* Each day after the coming of age, grass populated one unoccupied neighboring cell. As a creator I can see that grass
spreads over the world one occupied cell every day.


| Given                         | When                                  | Expected                                                      |
|-------------------------------|---------------------------------------|---------------------------------------------------------------|
| A cell containing grass       | The age of grass an age of 6 days     | No grass spread occurs                                        |
| A cell containing grass       | The age of grass an age of 7 days     | One unoccupied neighboring cells grows with a new grass       |
| A cell containing grass       | The age of grass an age of 8 days     | No grass spread occurs                                        |
| A cell containing grass       | The age of grass an age of 14 days    | One unoccupied neighboring cells grows with a new grass       |



## Exercise 5

* As a creator I can see that grass of 14 days old will die and leave an unoccupied cell.


| Given                                 | When                  | Expected                                                  |
|---------------------------------------|-----------------------|-----------------------------------------------------------|
| A world with grass of age 13 days     | The days passes       | The grasses turn 14 days and dies, leaving empty spot     |



## Exercise 6

* As a creator I can see that a sheep appears on a random spot in the world after 19 days and the sheep moves around the
world.


| Given                         | When                  | Expected                                                  |
|-------------------------------|-----------------------|-----------------------------------------------------------|
| A world of age 19 days        | The days passes       | The world contains a sheep at a random place              |
| A sheep of age 0 days         | The days passes       | The sheep has age 1                                       |
| A sheep of age 29 days        | The days passes       | The sheep dies leaving the cell it was on empty           |
| A world with a sheep          | The days passes       | The sheep moves to a random nearby unoccupied cell        |



## Exercise 7

* As a creator I can see that when the sheep is 14 days old, another sheep with age 0 appears on a cell near the
original sheep.


| Given                         | When                  | Expected                                                  |
|-------------------------------|-----------------------|-----------------------------------------------------------|
| A sheep of age 14 days        | The days passes       | The sheep gives birth to a new sheep on a cell nearby     |



## Exercise 8

* As a creator I can see that when the sheep is 14 days old, another sheep with age 0 appears on a cell near the
original sheep.


| Given                         | When                                      | Expected                                                  |
|-------------------------------|-------------------------------------------|-----------------------------------------------------------|
| A world of age 49 days        | The days passes                           | The world contains a wolf at a random place               |
| A lion of age 0 days          | The days passes                           | The lion has age 1                                        |
| A world with a lion           | The days passes                           | The lion moves to a random nearby unoccupied cell         |
| A lion                        | The lion moves to a cell with grass       | The grass remains undisturbed                             |



