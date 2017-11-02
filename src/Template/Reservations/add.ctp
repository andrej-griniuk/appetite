<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<div class="container">
    <h1>Food Stall Application</h1>

    <div class="reservations form large-9 medium-8 columns content">
        <?= $this->Form->create($reservation, ['align' => [
            'xs' => [
                'left' => 5,
                'middle' => 7,
                //'right' => 12
            ],
            'sm' => [
                'left' => 4,
                'middle' => 6,
                'right' => 12
            ]
        ]]) ?>
        <fieldset>
            <?php
                echo $this->Form->hidden('spot_id', ['default' => $this->request->getQuery('spot_id')]);
                echo $this->Form->hidden('reservation_date', ['default' => $this->request->getQuery('date')]);
                echo $this->Form->control('stall_id', ['label' => __('Stall name'), 'empty' => true, 'required' => true]);
                echo $this->Form->control('food_type_id', ['label' => __('Type of food')]);
                echo $this->Form->control('weeks', ['label' => __('Number of consecutive weeks to book'), 'options' => [1, 2, 3, 4]]);
            ?>
            <div class="form-group">
                <label class="control-label col-xs-5 col-sm-4"><?= __('Information for stall-holders') ?></label>
                <div class="col-xs-7 col-sm-6">
                    <ul>
                        <li>Space 2m x 3m</li>
                        <li>Set up times only 10am-11:30am</li>
                        <li>Take down times only 2pm-4pm</li>
                        <li>Food Safety Certificate required to be displayed at stall</li>
                        <li>Use of <a href="">Square payment device</a> highly recommended]</li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-5 col-sm-4"></label>
                <div class="col-xs-7 col-sm-6">
                    <?= $this->Form->button(__('Pay with Paypal'), ['class' => 'btn-lg btn-primary']) ?>
                </div>
            </div>
        </fieldset>
        <?= $this->Form->end() ?>
    </div>
</div>
