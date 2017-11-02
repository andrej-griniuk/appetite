<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only"><?= __('Toggle navigation') ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?= $this->Html->link($this->Html->image('logo.png') . '<span>Appetite</span>', '/', ['class' => 'navbar-brand', 'escape' => false, 'title' => __('Spike')]) ?>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><?= $this->Html->link('<i class="fa fa-user"></i> Christopher', ['controller' => 'Users', 'action' => 'profile'], ['escape' => false]) ?></li>
            </ul>
        </div>
    </div>
</nav>
