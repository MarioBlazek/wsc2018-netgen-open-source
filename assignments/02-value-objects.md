Site API - Value objects
========================

Goal
----
Get into grip with two most important Site API value objects, `Content` and `Location`. Consume simple content traversal.

Example
-------
* Checkout to starting point by `git checkout example_two_start`
* We are not satisfied how related authors are outputted on `full\ng_article`, first of all current way is quite error prone and secondly it requires to much boilerplate code, so let's simplify it
* Add parent location name to `full-page-sponsored-tag` div, without using a Twig function
* Use [this](http://127.0.0.1:8000/fitness/effective-training-techniques-isolation-vs-compound-movements) article as refrence for testing
* Checkout to solution by `git checkout example_two_finish`

Assignment
----------
* Checkout to starting point by `git checkout example_two_finish`
* In `full\ng_news`
  * List **only** authors by using method for Site API's `Content` value object
  * In case when authors field is empty display Content's owner name
  * Add parent location name to `full-page-sponsored-tag` div, without using a Twig function
* Use [this](http://127.0.0.1:8000/healthy-eating/we-neglect-this-factor-when-choosing-healthy-food) news as refrence for testing
* Clean unused code
* Checkout to solution by `git checkout assignment_two_finish`
