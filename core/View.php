<?php

declare(strict_types=1);

namespace Core;

class View
{
    private const VIEWS_DIRECTORY = 'views';
    private string $baseViewPath;

    public function __construct(protected string $view, protected array $data = [])
    {
        $this->baseViewPath = dirname(__DIR__) . '/' . self::VIEWS_DIRECTORY . '/template.php';

        if (!file_exists(dirname(__DIR__) . '/' . self::VIEWS_DIRECTORY . '/' . $this->view . '.php')) {
            throw new \Exception('View not found');
        }
    }

    public static function make(string $view, array $data = []): static
    {
        return new static($view, $data);
    }

    public function getHtml(): string
    {
        ob_start();

        include $this->baseViewPath;

        return (string)ob_get_clean();
    }

    public function __get(string $name)
    {
        return $this->data[$name] ?? null;
    }
}