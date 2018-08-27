Site API - Services
===================

Goal
----
Find out use cases for Filter and Find services. Learn about pagination and helpful methods for value object extraction. Finally discover role of base `Controller` and `Site` service.

Example
-------
* Checkout to starting point by `git checkout example_three_start`
* Display `full\ng_recipe` with custom controller action
* By using this controller do the following:
  * get tag value from field identified with `tags`
  * fetch latest four `ng_recipe` content objects tagged with those tags
  * exclude current recipe from results
  * sort by publish date descending
  * use `FilterService`
* Results iteration code is already provided in `full\ng_recipe`, adjust backend code accordingly
* Use [this](http://127.0.0.1:8000/recipes/power-up-smoothie) recipe as refrence for testing
* Checkout to solution by `git checkout example_three_finish`

Assignment
----------
* Checkout to starting point by `git checkout example_three_finish`
* Display `full\ng_article` with custom controller action
* By using this controller do the following:
  * get tag value from field identified with `tags`
  * fetch all content objects tagged with those tags
  * sort by publish date descending
  * use `FindService`
* Results iteration code is already provided in `full\ng_article`, adjust backend code accordingly
* Use [this](http://127.0.0.1:8000/fitness/effective-training-techniques-isolation-vs-compound-movements) article as refrence for testing
* Checkout to solution by `git checkout assignment_three_finish`
