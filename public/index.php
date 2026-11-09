<?php
declare(strict_types=1);

use App\Controller\PageController;
use App\Model\PageRepository;

require dirname(__DIR__) . '/app/Model/PageRepository.php';
require dirname(__DIR__) . '/app/Controller/PageController.php';

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
if ($path !== '/' && str_ends_with($path, '/')) {
    $path = rtrim($path, '/');
}

$controller = new PageController(new PageRepository(), dirname(__DIR__) . '/app/View');
$controller->show($path);
