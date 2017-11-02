<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stall[]|\Cake\Collection\CollectionInterface $stalls
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stall'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Food Types'), ['controller' => 'FoodTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Food Type'), ['controller' => 'FoodTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stalls index large-9 medium-8 columns content">
    <h3><?= __('Stalls') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('food_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rating') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stalls as $stall): ?>
            <tr>
                <td><?= $this->Number->format($stall->id) ?></td>
                <td><?= $stall->has('food_type') ? $this->Html->link($stall->food_type->name, ['controller' => 'FoodTypes', 'action' => 'view', $stall->food_type->id]) : '' ?></td>
                <td><?= h($stall->logo) ?></td>
                <td><?= h($stall->name) ?></td>
                <td><?= $this->Number->format($stall->rating) ?></td>
                <td><?= h($stall->created) ?></td>
                <td><?= h($stall->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $stall->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stall->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stall->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stall->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
