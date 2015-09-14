<?php
namespace Opale\PHPSecurityChecker;

use SensioLabs\Security\SecurityChecker;
use SensioLabs\Security\Exception\ExceptionInterface;

class Engine
{
    /**
     * @var SecurityChecker
     */
    private $checker;
    /**
     * @var Formatter
     */
    private $formatter;
    /**
     * @param SecurityChecker $checker
     * @param Formatter       $formatter
     */
    public function __construct(SecurityChecker $checker, Formatter $formatter)
    {
        $this->checker = $checker;
        $this->formatter = $formatter;
    }

    public function run($path)
    {
        try {
            $vulnerabilities = $this->checker->check($path);

            $this->formatter->displayResults(__DIR__.'/composer.lock', $vulnerabilities);
        } catch (ExceptionInterface $e) {
            fwrite(STDERR, $e->getMessage());

            return 1;
        }

        return 0;
    }
}
