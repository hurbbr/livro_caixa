<?php
// $this->setLayout('register');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>User
                    <small><?= __('Add') ?></small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-success pull-right', 'escape' => false]) ?>
                </div>
                <br />
                <?php echo $this->Form->create($user, [
                    'role' => 'form',
                ]);
                $this->Form->setTemplates([
                    'inputContainer' => '<div class="form-group col-md-4 col-sm-4 col-xs-12">{{content}}</div>',
                ]); ?>

                <?php
                echo $this->Form->input('primeiro_nome', ['class' => 'form-control']);
                echo $this->Form->input('username', ['class' => 'form-control']);
                echo $this->Form->input('password', ['value' => '', 'empty' => true, 'class' => 'form-control']);
                ?>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>