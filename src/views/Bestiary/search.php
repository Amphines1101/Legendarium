<?php $title = "Search Results - Bestiary"; ?>

<?php ob_start(); ?>

<div class="bestiary-container">
    <a href="/" class="back-link">« Back to Bestiary</a>
    
    <h1 class="search-title">Results for "<?= htmlspecialchars($query) ?>"</h1>
    
    <div class="bestiary-search">
        <form action="/bestiary/search" method="GET">
            <input type="text" name="q" value="<?= htmlspecialchars($query) ?>" placeholder="Search for a creature..." class="search-input">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>
    
    <div class="bestiary-grid">
        <?php if (empty($creatures)): ?>
            <p class="no-results">No results found for your search.</p>
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
                        <a href="/bestiary/show/<?= $creature->getId() ?>" class="creature-details-button">See Details</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require VIEWS . 'layout.php'; ?>
