<?php
declare(strict_types=1);

$escape = static fn (string $value): string => htmlspecialchars(
    $value,
    ENT_QUOTES | ENT_SUBSTITUTE,
    'UTF-8'
);

$contentFile = __DIR__ . '/pages/' . $page['template'] . '.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $escape($page['title']) ?></title>
    <meta name="description" content="<?= $escape($page['description']) ?>">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <a class="skip" href="#contenu">Aller au contenu</a>

    <header class="site-header">
        <a class="brand" href="/" aria-label="Le Colzotto des Champs, accueil">
            <span class="brand-mark">✳</span>
            <span>Le Colzotto <small>des Champs</small></span>
        </a>

        <button class="menu-toggle" aria-expanded="false" aria-controls="nav">
            Menu
        </button>

        <nav id="nav" aria-label="Navigation principale">
            <?php foreach (array_filter($pages, static fn (array $item): bool => $item['nav'] !== '') as $item): ?>
                <a href="<?= $escape($item['path']) ?>"<?= $item['path'] === ($page['path'] ?? '') ? ' class="active" aria-current="page"' : '' ?>>
                    <?= $escape($item['nav']) ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </header>

    <main id="contenu">
        <?php require $contentFile; ?>
    </main>

    <footer class="footer">
        <div class="footer-top">
            <a class="brand brand-footer" href="/">
                <span class="brand-mark">✳</span>
                <span>Le Colzotto <small>des Champs</small></span>
            </a>

            <p>Un projet pédagogique inspiré<br>par les paysages de Beauce.</p>

            <nav aria-label="Liens de pied de page">
                <a href="/colzotto">Le plat</a>
                <a href="/recette-colzotto">La recette</a>
                <a href="/beauce-et-inspirations">Les inspirations</a>
                <a href="/mentions-legales">Mentions légales</a>
            </nav>
        </div>

        <div class="footer-bottom">
            <span>© Projet pédagogique · 2026</span>
            <span>Restaurant fictif · Aucun service commercial</span>
        </div>

        <p class="transparency">
            Site fictif réalisé dans un cadre pédagogique. Le restaurant et le
            colzotto des champs sont des créations imaginaires.
        </p>
    </footer>

    <script src="/assets/site.js" defer></script>
</body>
</html>
