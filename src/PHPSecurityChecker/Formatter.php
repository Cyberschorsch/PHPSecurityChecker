<?php
namespace Opale\PHPSecurityChecker;

class Formatter
{
    /**
     * Displays a security report as json.
     *
     * @param string $lockFilePath    The file path to the checked lock file
     * @param array  $vulnerabilities An array of vulnerabilities
     */
    public function displayResults($lockFilePath, array $vulnerabilities)
    {
        $issue = [
            'type' => 'issue',
            'check_name' => 'Security issue',
            'categories' => ['Security'],
            'location' => ['path' => $lockFilePath, 'lines' => ['begin' => 1, 'end' => 1]],
            'content' => ['body' => ''],
        ];

        foreach ($vulnerabilities as $dependency => $vulnerability) {

            $issue['description'] = sprintf(
                'Known security issue in %1$s (%2$s)',
                $dependency,
                $vulnerability['version']
            );

            $issue['content']['body'] = $this->buildContentMarkdown($vulnerability['advisories']);

            fwrite(STDOUT, json_encode($issue) . "\0");
        }
    }

    /**
     * @param array $advisories
     *
     * @return string
     */
    private function buildContentMarkdown(array $advisories)
    {
        $markdown = '';

        foreach ($advisories as $issue => $details) {
            $markdown .= sprintf(
                '%2$s See [%1$s](%3$s) for more information %4$s',
                $details['cve'],
                $details['title'],
                $details['link'],
                "\n"
            );
        }

        return rtrim($markdown);
    }
}