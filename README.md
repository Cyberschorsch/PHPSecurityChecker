# Code Climate PHP Security Checker Engine

`codeclimate-php-sensio-security-checker` is a Code Climate Engine that wraps the Sensio PHP Security Checker static analysis tool.

### Installation

1. If you haven't already, [install the Code Climate CLI](https://github.com/codeclimate/codeclimate).
2. Run `codeclimate engines:enable php-sensio-security-checker`. This command both installs the engine and enables it in your `.codeclimate.yml` file.
3. You're ready to analyze! Browse into your project's folder and run `codeclimate analyze`.

### Config Options

* None, you need a composer.lock at the root level of your /code

### Sample Config

    engines:
      php-sensio-security-checker:
        enabled: true
    ratings:
      paths:
      - "**.php"

### Need help?

For help with Security Checker, [check out their repository](https://github.com/sensiolabs/security-checker).