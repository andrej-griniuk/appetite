<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stall $stall
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stall'), ['action' => 'edit', $stall->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stall'), ['action' => 'delete', $stall->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stall->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stalls'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stall'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Food Types'), ['controller' => 'FoodTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Food Type'), ['controller' => 'FoodTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stalls view large-9 medium-8 columns content">
    <h3><?= h($stall->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Food Type') ?></th>
            <td><?= $stall->has('food_type') ? $this->Html->link($stall->food_type->name, ['controller' => 'FoodTypes', 'action' => 'view', $stall->food_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo') ?></th>
            <td><?= h($stall->logo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($stall->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($stall->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rating') ?></th>
            <td><?= $this->Number->format($stall->rating) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($stall->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($stall->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($stall->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reservations') ?></h4>
        <?php if (!empty($stall->reservations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Spot Id') ?></th>
                <th scope="col"><?= __('Stall Id') ?></th>
                <th scope="col"><?= __('Reservation Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($stall->reservations as $reservations): ?>
            <tr>
                <td><?= h($reservations->id) ?></td>
                <td><?= h($reservations->spot_id) ?></td>
                <td><?= h($reservations->stall_id) ?></td>
                <td><?= h($reservations->reservation_date) ?></td>
                <td><?= h($reservations->created) ?></td>
                <td><?= h($reservations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reservations', 'action' => 'view', $reservations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reservations', 'action' => 'edit', $reservations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservations', 'action' => 'delete', $reservations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
