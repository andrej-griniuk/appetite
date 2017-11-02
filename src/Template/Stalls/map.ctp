<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Spot[] $spots
 * @var string $date
 */
?>
<div class="map-container">
    <div class="row">
        <div class="col-md-8">
            <?= $this->element('map') ?>
        </div>
        <div class="col-md-4">
            tweets
        </div>
    </div>
</div>
<?= $this->element('stalls') ?>
