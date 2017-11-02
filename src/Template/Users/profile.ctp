<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                Calories burned in Q4 2017
                <span class="pull-right"><span class="label label-success"><i class="fa fa-line-chart"></i> 24,505 cal</span></span>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <span style="display:inline-block; margin-top: 8px;">Vote for your favourite stall’s charity</span>
                <span class="pull-right"><?= $this->Form->select('stalls', $stalls) ?></span>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                Post a photo
                <span class="pull-right"><button class="btn btn-xs btn-primary"><i class="fa fa-upload"></i> Upload photo</button></span>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                CSR Foundation Days
                <span class="pull-right"><a href="#">Find out more here</a></span>
            </div>
        </div>
    </div>
</div>

