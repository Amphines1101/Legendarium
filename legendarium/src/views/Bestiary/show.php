<?php $title = $creature->getName() . " - Bestiaire"; ?>

<?php ob_start(); ?>

<div class="creature-details">
    <a href="/bestiary" class="back-link">« Retour au bestiaire</a>
    
    <div class="creature-header">
        <h1 class="creature-title"><?= $creature->getName() ?></h1>
        <?php if (!empty($creature->getGreekName())): ?>
            <h2 class="creature-subtitle"><?= $creature->getGreekName() ?></h2>
        <?php endif; ?>
    </div>
    
    <div class="creature-content">
        <div class="creature-main-image">
            <img src="<?= $creature->getImageUrl() ?>" alt="<?= $creature->getName() ?>">
        </div>
        
        <div class="creature-info-card">
            <div class="info-section">
                <h3>Informations</h3>
                <table class="info-table">
                    <?php if (!empty($creature->getCategory())): ?>
                        <tr>
                            <th>Catégorie</th>
                            <td><?= ucfirst($creature->getCategory()) ?></td>
                        </tr>
                    <?php endif; ?>
                    
                    <?php if (!empty($creature->getGender())): ?>
                        <tr>
                            <th>Genre</th>
                            <td><?= ucfirst($creature->getGender()) ?></td>
                        </tr>
                    <?php endif; ?>
                    
                    <?php if (!empty($creature->getImmortal())): ?>
                        <tr>
                            <th>Immortalité</th>
                            <td><?= $creature->getImmortal() ?></td>
                        </tr>
                    <?php endif; ?>
                    
                    <?php if (!empty($creature->getRomanName())): ?>
                        <tr>
                            <th>Nom Romain</th>
                            <td><?= $creature->getRomanName() ?></td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
            
            <?php if (!empty($creature->getRelatives())): ?>
                <div class="info-section">
                    <h3>Relations</h3>
                    <table class="info-table">
                        <?php if (!empty($creature->getRelatives()['father'])): ?>
                            <tr>
                                <th>Père</th>
                                <td><?= $creature->getRelatives()['father'] ?></td>
                            </tr>
                        <?php endif; ?>
                        
                        <?php if (!empty($creature->getRelatives()['mother'])): ?>
                            <tr>
                                <th>Mère</th>
                                <td><?= $creature->getRelatives()['mother'] ?></td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="creature-description">
            <h3>Description</h3>
            <p><?= nl2br($creature->getDescription()) ?></p>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require VIEWS . 'layout.php'; ?>
