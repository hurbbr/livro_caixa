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
                <h2>Lancamento
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
                <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                    <?= $this->Html->link(__('<i class="fa fa-reply"></i> Back'), ['action' => 'index'], ['class' => 'btn btn-success pull-right', 'escape' => false]) ?>
                </div>
                <br />
                <?php
                echo $this->Form->create($lancamento, ['role' => 'form']);
                echo $this->Form->hidden('user_id', ['value' => $user, 'id' => 'user-id']);
                ?>

                <?php
                echo $this->Form->control('data', ['class' => 'form-control datepicker', 'type' => 'text', 'autocomplete' => 'off']);
                echo $this->Form->input('descricao', ['class' => 'form-control']);
                echo $this->Form->input('valor', [
                    'type'      => 'text',
                    'class'     => 'form-control money',
                ]);
                echo $this->Form->input('tipo', ['options' => $lancamento::TIPO_NOME, 'default' => $lancamento::TIPO_SAIDA, 'class' => 'form-control']);
                echo $this->Form->input('conta_id', ['options' => $contas, 'empty' => true, 'placeholder' => 'Conta', 'class' => 'form-control']);
                echo $this->Form->input('categoria_id', ['options' => $categorias, 'empty' => true, 'placeholder' => 'Categoria', 'class' => 'form-control']);
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
<?php
$this->start('css');
echo $this->Html->css('bootstrap-datepicker3.min');
$this->end();
$this->start('scriptBottom');
echo $this->Html->script('jquery.maskMoney');
echo $this->Html->script('bootstrap-datepicker.min');
echo $this->Html->script('bootstrap-datepicker.pt-BR.min'); ?>
<script>
    $(function() {
        $('.money').maskMoney({
            prefix: 'R$ ',
            allowNegative: false,
            thousands: '.',
            decimal: ',',
            affixesStay: true
        });
    });
    $('.datepicker').datepicker({
        format: "mm/dd/yyyy",
        language: "pt-BR",
        autoclose: true
    });
</script>
<?php $this->end(); ?>