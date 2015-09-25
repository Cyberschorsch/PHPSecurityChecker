# Docker PHP Security Checker Engine Checker

`php-sensio-security-checker` is a Code Climate Engine inspired docker image that wraps the Sensio PHP Security Checker static analysis tool.

## Installation

### Git

1. Git clone the repository `git clone git@github.com:OpaleNet/PHPSecurityChecker.git`
2. Build the docker image `docker build --rm -t phpsensiosecuritychecker .`

## Run

Like codeclimates engine you need to mount your code base in `/code`, the engine check for a `composer.lock` file at the root of the `/code`.
Contrary to codeclimates engine this one **does** make requests (to the sensio security checker).
To run the check launch the docker image with `docker run -ti -v CODE_PATH:/code phpsensiosecuritychecker`
This will output a json like those of code climate engine, basically if you have a json you should fix something otherwise you are good to go.


## Why not a regular codeclimate engine ?

Codeclimate engines have to follow a strict security policy which does not allow requests on the internet,
as we use the always up to date sensio security checker this policy does not allow the engine to work.

## Need help?

For help with Security Checker, [check out their repository](https://github.com/sensiolabs/security-checker).