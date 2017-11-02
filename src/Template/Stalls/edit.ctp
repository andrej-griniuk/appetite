<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stall $stall
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $stall->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $stall->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stalls'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Food Types'), ['controller' => 'FoodTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Food Type'), ['controller' => 'FoodTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stalls form large-9 medium-8 columns content">
    <?= $this->Form->create($stall) ?>
    <fieldset>
        <legend><?= __('Edit Stall') ?></legend>
        <?php
            echo $this->Form->control('food_type_id', ['options' => $foodTypes]);
            echo $this->Form->control('logo');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('rating');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
