<?php
/**
 * @var \App\View\AppView $this
 * @var string $date
 */
?>

<div id="dateSelector">
    <?= $this->Html->link('<i class="fa fa-chevron-left"></i>', ['action' => 'map', (new \Cake\I18n\Date($date))->subDay()->format('Y-m-d')], ['escape' => false, 'class' => 'pull-left']) ?>
    <?= $this->Html->link('<i class="fa fa-chevron-right"></i>', ['action' => 'map', (new \Cake\I18n\Date($date))->addDay()->format('Y-m-d')], ['escape' => false, 'class' => 'pull-right']) ?>
    <i class="fa fa-calendar"></i> <?= (new \Cake\I18n\Date($date))->nice() ?>
</div>
<div id="map"></div>
