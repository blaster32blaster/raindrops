#Instructions

Your task is to convert a number into a string that contains raindrop sounds corresponding to certain potential factors. A factor is a number that evenly divides into another number, leaving no remainder. The simplest way to test if a one number is a factor of another is to use the modulo operation.

*The rules of raindrops are that if a given number:*

- has 3 as a factor, add 'Pling' to the result.
- has 5 as a factor, add 'Plang' to the result.
- has 7 as a factor, add 'Plong' to the result.
- does not have any of 3, 5, or 7 as a factor, the result should be the digits of the number.

#Examples

- 28 has 7 as a factor, but not 3 or 5, so the result would be "Plong".
- 30 has both 3 and 5 as factors, but not 7, so the result would be "PlingPlang".
- 34 is not factored by 3, 5, or 7, so the result would be "34".

#Starting the project

- clone project locally.
- ensure that docker is running on the system and has sufficient resources allocated.
- navigate to root project directory
- run command :

  ``` bash
  docker-compose up
  ```

## Use of Application

- navigate to localhost:8078

## FAQ

- if there is a port conflict on a user's local system, change the port listed in the root docker-compose.yml
- the index route "/" accepts the query string parameter "number" which will allow for the user to pass in a number and have the proper sounds output to the screen
