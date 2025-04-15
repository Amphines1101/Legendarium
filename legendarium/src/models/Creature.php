<?php

namespace Legendarium\Models;

class Creature
{
    private $id;
    private $name;
    private $greekName;
    private $description;
    private $romanName;
    private $category;
    private $immortal;
    private $gender;
    private $images;
    private $relatives;

    public function getThumbnailUrl()
    {
        if (isset($this->images['thumbnail']) && !empty($this->images['thumbnail'])) {
            return $this->images['thumbnail'];
        } elseif (isset($this->images['regular']) && !empty($this->images['regular'])) {
            // Si pas de miniature mais une image régulière, on l'utilise
            return $this->images['regular'];
        } else {
            // Image par défaut
            return '/img/No-photo.jpg';
        }
    }
    
    /**
     * Retourne l'URL de l'image régulière ou une image par défaut si non disponible
     */
    public function getRegularUrl()
    {
        if (isset($this->images['regular']) && !empty($this->images['regular'])) {
            return $this->images['regular'];
        } elseif (isset($this->images['thumbnail']) && !empty($this->images['thumbnail'])) {
            // Si pas d'image régulière mais une miniature, on l'utilise
            return $this->images['thumbnail'];
        } else {
            // Image par défaut
            return '/img/default-creature.jpg';
        }
    }
    // Getters et setters
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; return $this; }
    
    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; return $this; }
    
    public function getGreekName() { return $this->greekName; }
    public function setGreekName($greekName) { $this->greekName = $greekName; return $this; }
    
    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; return $this; }
    
    public function getRomanName() { return $this->romanName; }
    public function setRomanName($romanName) { $this->romanName = $romanName; return $this; }
    
    public function getCategory() { return $this->category; }
    public function setCategory($category) { $this->category = $category; return $this; }
    
    public function getImmortal() { return $this->immortal; }
    public function setImmortal($immortal) { $this->immortal = $immortal; return $this; }
    
    public function getGender() { return $this->gender; }
    public function setGender($gender) { $this->gender = $gender; return $this; }

    public function getImages() { return $this->images; }
    public function setImages($images) { $this->images = $images; return $this; }

    public function getRelatives() { return $this->relatives; }
    public function setRelatives($relatives) { $this->relatives = $relatives; return $this; }


    public function getImageUrl() {
        if (!empty($this->images) && !empty($this->images['regular'])) {
            return $this->images['regular'];
        }
        return '/public/img/default-creature-large.jpg'; // Image par défaut
    }
}
