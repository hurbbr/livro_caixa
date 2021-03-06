<div class="page-title">
    <div class="title_left">
        <h3>
            Lancamento
            <small><?= __('View') ?></small>
        </h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
            <?= $this->Html->link(__('<i class="fa fa-dashboard"></i> Back'), ['action' => 'index'], ['class' => 'btn btn-success pull-right','escape'=>false]) ?>
        </div>
    </div>
    </div>

<!-- Main content -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lancamento
                        <small><?= __('View') ?></small>
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
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?= $this->Form->create($lancamento, array('role' => 'form')) ?>
                    <div class="box-body">
                        <?php
                                                            echo $this->Form->input('descricao', ['placeholder' => $lancamento->descricao, 'disabled' => true]);
                                    echo $this->Form->input('valor', ['placeholder' => $lancamento->valor, 'disabled' => true]);
                                    echo $this->Form->input('tipo', ['placeholder' => $lancamento->tipo, 'disabled' => true]);
                                    echo $this->Form->input('deleted', ['placeholder' => $lancamento->deleted, 'disabled' => true]);
                                    echo $this->Form->input('conta_id', ['options' => $contas, $lancamento->conta_id, 'disabled' => true]);
                                    echo $this->Form->input('categoria_id', ['options' => $categorias, $lancamento->categoria_id, 'disabled' => true]);
                                    echo $this->Form->input('user_id', ['options' => $users, $lancamento->user_id, 'disabled' => true]);
                        ?>
                    </div>
                <!-- /.box-body -->
                    <div class="box-footer">
                        <?= $this->Form->button(__('Save')) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>

