# Twitter-PHP-Search

A small PHP app that displays popular tweets related to a keyword.

[Here's a demo using **#custserv**](https://kayako-test.herokuapp.com/)

## Installation

### Prerequisites

- Create a twitter app at https://apps.twitter.com/, and make sure you have your `CONSUMER_KEY` and `CONSUMER_SECRET` ready.
- Install [Foreman](https://github.com/ddollar/foreman) if you haven't already.

### Local Setup

Git clone this repo.

`git clone git@github.com:rohitpaulk/twitter-php-search.git`

`cd` into the repo directory

`cd twitter-php-search`

Create an `.env` file that looks like:
```
TWITTER_CONSUMER_KEY=your-consumer-key
TWITTER_CONSUMER_SECRET=your-consumer-secret
PORT=8000
```

Setup done, let's fire up a server.

`foreman start`

Visit [http://localhost:8000/](http://localhost:8000/)!

### Deploy

Deploying to [Heroku](http://heroku.com/) is the easiest. Set the `TWITTER_CONSUMER_KEY` and `TWITTER_CONSUMER_SECRET` config variables and you're all set to go!

This *should* work on any other PHP hosting setup, provided that the correct env-vars are present.

## Improvements

- Cache access tokens
- Cache tweet data
- Improve styling for larger screens (>1366px wide)
- Minor styling glitches related to height of elements.
- Install Requests via [Composer](https://getcomposer.org/)

## Libraries used
- [Requests for PHP](https://github.com/rmccue/Requests)