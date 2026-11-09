<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\PageRepository;

final class PageController
{
    public function __construct(private PageRepository $pages, private string $viewDirectory)
    {
    }

    public function show(string $path): void
    {
        $page = $this->pages->findByPath($path);
        if ($page === null) {
            http_response_code(404);
            $page = ['nav' => '', 'title' => 'Page introuvable | Le Colzotto des Champs', 'description' => 'Cette page n’existe pas.', 'template' => 'not-found', 'path' => $path];
        }
        $pages = $this->pages->all();
        require $this->viewDirectory . '/layout.php';
    }
}
