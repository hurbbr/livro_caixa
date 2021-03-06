<!-- Main content -->
<div class="row">
  <div class="col-lg-3 col-md-3 col-sm-6">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-area-chart"></i>
      </div>
      <div class="count">Ano</div>
      <p class="text-success">Entrada: <?= $this->Number->currency($entrada, 'BRL') ?></p>
      <p class="text-danger">Saída: <?= $this->Number->currency($saida, 'BRL') ?></p>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-area-chart"></i>
      </div>
      <div class="count">Mês</div>
      <p class="text-success">Entrada: <?= $this->Number->currency($entrada, 'BRL') ?></p>
      <p class="text-danger">Saída: <?= $this->Number->currency($saida, 'BRL') ?></p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><?= __('Lancamento') ?></h2>
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
      <!-- /.box-header -->
      <div class="x_content">
        <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
          <?= $this->Html->link(__('<i class="fa fa-plus"></i> Novo'), ['action' => 'add'], ['class' => 'btn btn-success pull-right', 'escape' => false]) ?>
        </div>
        <?= $this->Form->create() ?>
        <div class="input-group input-group-sm">
          <input type="text" disabled name="search" class="form-control" placeholder="<?= __('Fill in to start search') ?>">
          <span class="input-group-btn">
            <button class="btn btn-info btn-flat" type="submit"><?= __('Filter') ?></button>
          </span>
        </div>
        </form>
        <table class="table table-striped dataTable ">
          <tr>
            <th><?= $this->Paginator->sort('data') ?></th>
            <th><?= $this->Paginator->sort('descricao') ?></th>
            <th><?= $this->Paginator->sort('tipo') ?></th>
            <th><?= $this->Paginator->sort('valor') ?></th>
            <th><?= __('Actions') ?></th>
          </tr>
          <?php foreach ($lancamentos as $lancamento) : ?>
            <tr>
              <td><?= $lancamento->data ?></td>
              <td><?= h($lancamento->descricao) ?></td>
              <td><?= h($lancamento::TIPO_NOME[$lancamento->tipo]) ?></td>
              <td><?= $this->Number->currency($lancamento->valor, 'BRL') ?></td>
              <td class="actions" style="white-space:nowrap">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lancamento->id], ['class' => 'btn btn-primary btn-xs']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lancamento->id], ['confirm' => __('Confirm to delete this entry?'), 'class' => 'btn btn-danger btn-xs']) ?>
              </td>
            </tr>
          <?php endforeach; ?>
          <tfoot>
            <td></td>
            <td></td>
            <td>Total:</td>
            <td><?= $this->Number->currency($total, 'BRL') ?></td>
            <td></td>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
          <?php
          echo $this->Paginator->numbers(); ?>
        </ul>
      </div>
    </div>
    <!-- /.box -->
  </div>
</div>
<!-- /.content -->