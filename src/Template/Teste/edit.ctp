<?php 
    $this->Form->setTemplates([
        'inputContainer' => '<div class="form-group col-md-4 col-sm-4 col-xs-12">{{content}}</div>',
    ]);
?> 
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Teste
                    <small><?= __('Edit') ?></small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                <?= $this->Html->link(__('<i class="fa fa-dashboard"></i> Back'), ['action' => 'index'], ['class'=>'btn btn-success pull-right','escape'=>false]) ?>
            </div>
                <br/>
                <?= $this->Form->create($teste, ['role' => 'form']) ?>

                <?php
                                            echo $this->Form->input('nome', ['class' => 'form-control']);
                                                        echo $this->Form->input('numero', ['class' => 'form-control']);
                                            ?>
                <div class="ln_solid"></div>
                <div class="item form-group">
<div class="col-md-6 col-sm-6 offset-md-3">
<?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
</div>
                        
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>