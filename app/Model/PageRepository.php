<?php
declare(strict_types=1);

namespace App\Model;

final class PageRepository
{
    public function all(): array
    {
        return [
            'accueil' => [
                'path' => '/',
                'nav' => 'Accueil',
                'title' => 'Le colzotto des champs | Une création culinaire imaginaire',
                'description' => 'Découvrez le colzotto des champs, une création culinaire fictive inspirée des paysages de Beauce, et explorez sa recette imaginée.',
                'template' => 'home',
            ],
            'restaurant' => [
                'path' => '/restaurant',
                'nav' => 'Le restaurant',
                'title' => 'Le restaurant imaginaire | Le Colzotto des Champs',
                'description' => 'Découvrez le concept pédagogique du restaurant fictif Le Colzotto des Champs, imaginé autour d’une cuisine de campagne inspirée de la Beauce.',
                'template' => 'restaurant',
            ],
            'colzotto' => [
                'path' => '/colzotto',
                'nav' => 'Le colzotto',
                'title' => 'Le colzotto des champs : un plat fictif inspiré de la Beauce',
                'description' => 'Qu’est-ce que le colzotto des champs ? Découvrez ce plat imaginaire à base de céréales, légumes verts et graines, créé pour un projet pédagogique.',
                'template' => 'colzotto',
            ],
            'recette' => [
                'path' => '/recette-colzotto',
                'nav' => 'La recette',
                'title' => 'Recette du colzotto des champs | Création pédagogique',
                'description' => 'Suivez la recette imaginaire du colzotto des champs : riz crémeux, poireau, petits pois et graines toastées. Une création pédagogique, étape par étape.',
                'template' => 'recipe',
            ],
            'beauce' => [
                'path' => '/beauce-et-inspirations',
                'nav' => 'Beauce & inspirations',
                'title' => 'La Beauce et ses paysages | Inspirations du colzotto',
                'description' => 'Quels paysages réels ont inspiré le colzotto des champs ? Repères sourcés sur la Beauce et distinction entre territoire réel et plat fictif.',
                'template' => 'beauce',
            ],
            'mentions' => [
                'path' => '/mentions-legales',
                'nav' => '',
                'title' => 'Mentions légales | Le Colzotto des Champs',
                'description' => 'Mentions légales et informations pédagogiques du site fictif Le Colzotto des Champs. Les informations à valider restent clairement signalées.',
                'template' => 'legal',
            ],
        ];
    }

    public function findByPath(string $path): ?array
    {
        foreach ($this->all() as $page) {
            if ($page['path'] === $path) {
                return $page;
            }
        }
        return null;
    }
}
