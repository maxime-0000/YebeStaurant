# Architecture MVC

Le site utilise un MVC PHP natif léger, sans dépendance Composer :

- `public/index.php` reçoit la requête et transmet le chemin au contrôleur frontal.
- `app/Controller/PageController.php` choisit la page et la vue, et renvoie une vraie réponse 404 pour une route inconnue.
- `app/Model/PageRepository.php` contient les routes et les métadonnées éditoriales (titre, description, modèle de vue).
- `app/View/layout.php` fournit le gabarit commun ; `app/View/pages/` contient les vues de chaque page.
- `public/assets/` contient les styles et le script de navigation.

## Lancer en local

Depuis la racine du projet :

```powershell
php -S localhost:8000 -t public public/router.php
```

Ouvrir ensuite `http://localhost:8000`. Les URL propres sont `/`, `/restaurant`, `/colzotto`, `/recette-colzotto`, `/beauce-et-inspirations` et `/mentions-legales`.

Pour l’hébergement, définir `public/` comme racine publique du site et activer la réécriture vers `index.php` (ou utiliser `public/.htaccess` sur Apache). Les fichiers PHP de l’application restent hors du répertoire public.

Avant publication, il faut compléter les champs de mentions légales et remplacer le domaine d’exemple dans le sitemap et `robots.txt`. L’hébergement public, HTTPS, les réponses HTTP, le sitemap et l’indexation restent à vérifier après déploiement.
