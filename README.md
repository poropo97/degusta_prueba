# Simple Time Tracker

## Task Description

The task is to make a simple time tracker. The user should be able to:
- Type the name of the task they are working on and click “start”.
- See the timer that is counting how long the task is already taking.
- Click "Stop" to stop working on that task (the timer stops).
- Type another name for a different task and click “start” again. The page should start counting from the beginning.
- On the same page (or another, up to you), the user should be able to see the summary of the time tracker where it displays how much time was spent on which task, and how much time was spent working today.

## Requirements

- Place all the code in GitHub or Bitbucket.
- Store it in a Docker container.
- Feel free to use your favorite PHP framework, but we use Symfony, and it will be more appreciated. We are looking for a professional that can do a smart utilization of developing tools. Always keep in mind the SOLID principles.
- The data should be stored in any relational database you wish.
- The tasks can be recognized by name, so if "homepage development" is typed twice during one day, spending 2 hours in the morning and 0.5 hours in the afternoon, then at the end of the day it should show 2.5 hours near “homepage development”.
- Don’t forget the README.md.

## Hints

- We do not require the page to be beautiful; it can be the simplest style, but please make it responsive in the simplest possible way. Remember, mobile first!

## One Step Further (Optional)

- We love the terminal, so we would appreciate it if you write a PHP script that receives by parameter the action (start/end) and the name of the task. Another script should return a list of all the tasks with their status, start time, end time, and total elapsed time.