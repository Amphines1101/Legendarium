<?php $title = "Résultats de recherche - Bestiaire"; ?>

<?php ob_start(); ?>

<div class="bestiary-container">
    <a href="/bestiary" class="back-link">« Retour au bestiaire</a>
    
    <h1 class="search-title">Résultats de recherche pour "<?= htmlspecialchars($query) ?>"</h1>
    
    <div class="bestiary-search">
        <form action="/bestiary/search" method="GET">
            <input type="text" name="q" value="<?= htmlspecialchars($query) ?>" placeholder="Rechercher une créature..." class="search-input">
            <button type="submit" class="search-button">Rechercher</button>
        </form>
    </div>
    
    <div class="bestiary-grid">
        <?php if (empty($creatures)): ?>
            <p class="no-results">Aucune créature trouvée pour votre recherche.</p>
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
                        <p class="creature-category"><?= ucfirst($creature->getCategory()) ?></p>
                        <a href="/bestiary/show/<?= $creature->getId() ?>" class="creature-details-button">Voir détails</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require VIEWS . 'layout.php'; ?>
