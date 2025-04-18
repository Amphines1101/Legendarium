<?php $title = $creature->getName() . " - Bestiary"; ?>

<?php ob_start(); ?>

<div class="creature-details">
    <a href="/" class="back-link">« Back to Bestiary</a>
    
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
                <h3>Information</h3>
                <table class="info-table">
                    <?php if (!empty($creature->getCategory())): ?>
                        <tr>
                            <th>Category</th>
                            <td><?= ucfirst($creature->getCategory()) ?></td>
                        </tr>
                    <?php endif; ?>
                    
                    <?php if (!empty($creature->getGender())): ?>
                        <tr>
                            <th>Gender</th>
                            <td><?= ucfirst($creature->getGender()) ?></td>
                        </tr>
                    <?php endif; ?>
                    
                    <?php if (!empty($creature->getImmortal())): ?>
                        <tr>
                            <th>Immortality</th>
                            <td><?= $creature->getImmortal() ?></td>
                        </tr>
                    <?php endif; ?>
                    
                    <?php if (!empty($creature->getRomanName())): ?>
                        <tr>
                            <th>Roman Name</th>
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
                                <th>Father</th>
                                <td><?= $creature->getRelatives()['father'] ?></td>
                            </tr>
                        <?php endif; ?>
                        
                        <?php if (!empty($creature->getRelatives()['mother'])): ?>
                            <tr>
                                <th>Mother</th>
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
