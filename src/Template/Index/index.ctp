<?php
/**
 * @var \App\View\AppView $this
 */
?>
<style>
    .navbar-brand {
        display: none;
    }
</style>
<div class="container">
    <div id="index" class="text-center">
        <?= $this->Html->image('logo_large.png') ?>
        <h1><?= __('Are you a') ?></h1>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                <ul>
                    <li><?= $this->Html->link('<i class="fa fa-cutlery"></i>' . __('Food Eater'), ['controller' => 'Stalls', 'action' => 'map'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('<i class="fa fa-map-marker"></i>' . __('Stall Holder'), ['controller' => 'Reservations', 'action' => 'map'], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('<i class="fa fa-male"></i>' . __('Organiser'), ['controller' => 'Reservations', 'action' => 'map'], ['escape' => false]) ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
