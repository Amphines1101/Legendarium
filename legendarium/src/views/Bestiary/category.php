<?php $title = ucfirst($currentCategory) . " - Bestiaire"; ?>

<?php ob_start(); ?>

<div class="bestiary-container">
    <a href="/bestiary" class="back-link">« Retour au bestiaire</a>
    
    <h1 class="category-title"><?= ucfirst($currentCategory) ?></h1>
    
    <div class="bestiary-categories">
        <h2>Autres catégories</h2>
        <ul class="categories-list">
            <?php foreach ($categories as $category): ?>
                <?php if ($category != $currentCategory): ?>
                    <li>
                        <a href="/bestiary/category/<?= strtolower($category) ?>" class="category-link">
                            <?= ucfirst($category) ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <div class="bestiary-grid">
        <?php if (empty($creatures)): ?>
            <p class="no-results">Aucune créature trouvée dans cette catégorie.</p>
        <?php else: ?>
            <?php foreach ($creatures as $creature): ?>
                <div class="creature-card">
                    <div class="creature-image">
                        <img src="<?= $creature->getThumbnailUrl() ?>" alt="<?= $creature->getName() ?>">
                    </div>
                    <div class="creature-info">
                        <h3 class="creature-name"><?= $creature->getName() ?></h3>
                        <?php if (!empty($creature->getGreekName())): ?>
                            <p class="creature-greek-name"><?= $creature->getGreekName() ?></p>
                        <?php endif; ?>
                        <a href="/bestiary/show/<?= $creature->getId() ?>" class="creature-details-button">Voir détails</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require VIEWS . 'layout.php'; ?>
