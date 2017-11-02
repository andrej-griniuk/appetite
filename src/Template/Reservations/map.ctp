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
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Tip 1</strong></div>
                <div class="panel-body">Don’t forget your Food Safety Certificate</div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Tip 2</strong></div>
                <div class="panel-body">Square Payment Device is great for cash-less</div>
            </div>
        </div>
    </div>
</div>
<?= $this->element('stalls') ?>
