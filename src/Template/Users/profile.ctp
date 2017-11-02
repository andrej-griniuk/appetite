<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <span style="display:inline-block; margin-top: 7px;">Calories burned in Q4 2017</span>
                <span class="pull-right"><span class="btn btn-sm btn-success"><i class="fa fa-line-chart"></i> 24,505 cal</span></span>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <span style="display:inline-block; margin-top: 10px;">Vote for your favourite stall’s charity</span>
                <div class="pull-right text-right" style="width:290px;"><?= $this->Form->select('stalls', $stalls, ['style' => 'width: 200px; display: inline-block;margin-right:15px;']) ?><button class="btn btn-primary">Vote</button></div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <span style="display:inline-block; margin-top: 7px;">Post a photo</span>
                <span class="pull-right"><button class="btn btn-sm btn-primary"><i class="fa fa-upload"></i> Upload photo</button></span>
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

