<?php

namespace Legendarium\Models;

class CreatureManager
{
    private $creatures = [];
    private $jsonPath;

    public function __construct($jsonPath = null) {
        $this->jsonPath = $jsonPath ?? dirname(dirname(__DIR__)) . '/public/data/all.json';
        $this->loadCreatures();
    }

    // Charge les créatures depuis le fichier JSON
    private function loadCreatures()
    {
        if (file_exists($this->jsonPath)) {
            $jsonData = file_get_contents($this->jsonPath);
            $data = json_decode($jsonData, true);
            
            if (json_last_error() === JSON_ERROR_NONE) {
                $id = 1; // Pour assigner des IDs uniques
                foreach ($data as $creatureData) {
                    $creature = new Creature();
                    $creature->setId($id++);
                    $creature->setName($creatureData['name'] ?? '');
                    $creature->setGreekName($creatureData['greekName'] ?? '');
                    $creature->setDescription($creatureData['description'] ?? '');
                    $creature->setRomanName($creatureData['romanName'] ?? '');
                    $creature->setCategory($creatureData['category'] ?? '');
                    $creature->setImmortal($creatureData['immortal'] ?? '');
                    $creature->setGender($creatureData['gender'] ?? '');
                    
                    // Important: Assurer que les images sont correctement chargées
                    $creature->setImages($creatureData['images'] ?? []);
                    
                    $creature->setRelatives($creatureData['relatives'] ?? []);
                    
                    $this->creatures[] = $creature;
                }
            }
        }
    }

    // Retourne toutes les créatures
    public function all() {
        return $this->creatures;
    }

    // Retourne une créature par son ID
    public function getById($id) {
        foreach ($this->creatures as $creature) {
            if ($creature->getId() == $id) {
                return $creature;
            }
        }
        return null;
    }

    // Recherche des créatures par nom
    public function searchByName($query) {
        $results = [];
        $query = strtolower($query);
        
        foreach ($this->creatures as $creature) {
            if (strpos(strtolower($creature->getName()), $query) !== false) {
                $results[] = $creature;
            }
        }
        
        return $results;
    }

    // Filtre les créatures par catégorie
    public function getByCategory($category) {
        $results = [];
        
        foreach ($this->creatures as $creature) {
            if (strtolower($creature->getCategory()) === strtolower($category)) {
                $results[] = $creature;
            }
        }
        
        return $results;
    }

    // Retourne toutes les catégories uniques
    public function getAllCategories() {
        $categories = [];
        
        foreach ($this->creatures as $creature) {
            $category = $creature->getCategory();
            if (!empty($category) && !in_array($category, $categories)) {
                $categories[] = $category;
            }
        }
        
        sort($categories);
        return $categories;
    }
}
