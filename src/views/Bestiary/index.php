<?php $title = "Mythological Bestiary"; ?>

<?php ob_start(); ?>

<div class="bestiary-container">
    <h1 class="bestiary-title">Greek Mythology Bestiary</h1>
    
    <div class="bestiary-search">
        <form action="/bestiary/search" method="GET">
            <input type="text" name="q" placeholder="Search for a creature..." class="search-input">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>
    
    <div class="bestiary-categories">
        <h2>Categories</h2> 
        <ul class="categories-list">
            <?php foreach ($categories as $category): ?>
                <li><a href="/bestiary/category/<?= strtolower($category) ?>" class="category-link"><?= ucfirst($category) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <div class="bestiary-grid">
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
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require VIEWS . 'layout.php'; ?>
