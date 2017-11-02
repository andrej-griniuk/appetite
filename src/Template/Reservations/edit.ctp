<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reservation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Spots'), ['controller' => 'Spots', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Spot'), ['controller' => 'Spots', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stalls'), ['controller' => 'Stalls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stall'), ['controller' => 'Stalls', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservations form large-9 medium-8 columns content">
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        <legend><?= __('Edit Reservation') ?></legend>
        <?php
            echo $this->Form->control('spot_id', ['options' => $spots]);
            echo $this->Form->control('stall_id', ['options' => $stalls]);
            echo $this->Form->control('reservation_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
