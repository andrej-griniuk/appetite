<?php
/**
 * @var \App\View\AppView $this
 */

$this->Html->css([
    '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
    'bootstrap.min',
    'app'
], ['block' => true]);
?>
<?= $this->Html->charset() ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Appetite - <?= $this->fetch('title') ?></title>
<?= $this->Html->meta('icon') ?>
<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
