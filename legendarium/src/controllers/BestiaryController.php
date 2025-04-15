<?php

namespace Legendarium\Controllers;

use Legendarium\Models\CreatureManager;

class BestiaryController {
    private $creatureManager;

    public function __construct() {
        $this->creatureManager = new CreatureManager();
    }

    // Affiche la page d'accueil du bestiaire
    public function index() {
        $creatures = $this->creatureManager->all();
        $categories = $this->creatureManager->getAllCategories();
        
        require VIEWS . 'Bestiary/index.php';
    }

    // Affiche les détails d'une créature
    public function show($id) {
        $creature = $this->creatureManager->getById($id);
        
        if (!$creature) {
            header('Location: /bestiary');
            exit;
        }
        
        require VIEWS . 'Bestiary/show.php';
    }

    // Affiche les créatures d'une catégorie spécifique
    public function category($categoryName) {
        $creatures = $this->creatureManager->getByCategory($categoryName);
        $categories = $this->creatureManager->getAllCategories();
        $currentCategory = $categoryName;
        
        require VIEWS . 'Bestiary/category.php';
    }

    // Recherche de créatures
    public function search() {
        $query = $_GET['q'] ?? '';
        $creatures = [];
        
        if (!empty($query)) {
            $creatures = $this->creatureManager->searchByName($query);
        }
        
        require VIEWS . 'Bestiary/search.php';
    }
}
