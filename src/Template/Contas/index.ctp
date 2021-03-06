<!-- Main content -->
<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Conta <small><?= __('Index') ?></small></h2>
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
          <?= $this->Html->link(__('<i class="fa fa-plus"></i>New'), ['action' => 'add'], ['class' => 'btn btn-success pull-right', 'escape' => false]) ?>
        </div>
        <form action="<?php echo $this->Url->build(); ?>" method="POST">
          <div class="input-group input-group-sm">
            <input type="text" name="search" class="form-control" placeholder="<?= __('Fill in to start search') ?>">
            <span class="input-group-btn">
              <button class="btn btn-info btn-flat" type="submit"><?= __('Filter') ?></button>
            </span>
          </div>
        </form>
        <table class="table table-hover table-striped">
          <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('nome') ?></th>
            <th><?= $this->Paginator->sort('tipo') ?></th>
            <th><?= $this->Paginator->sort('dia_fechamento') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th><?= __('Actions') ?></th>
          </tr>
          <?php foreach ($contas as $conta) : ?>
            <tr>
              <td><?= $this->Number->format($conta->id) ?></td>
              <td><?= h($conta->nome) ?></td>
              <td><?= h($conta::TIPO[$conta->tipo]) ?></td>
              <td><?= h($conta->dia_fechamento ?? '-') ?></td>
              <td><?= h($conta->created) ?></td>
              <td><?= h($conta->modified) ?></td>
              <td class="actions" style="white-space:nowrap">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $conta->id], ['class' => 'btn btn-primary btn-xs']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $conta->id], ['confirm' => __('Confirm to delete this entry?'), 'class' => 'btn btn-danger btn-xs']) ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
          <?php echo $this->Paginator->numbers(); ?>
        </ul>
      </div>
    </div>
    <!-- /.box -->
  </div>
</div>
<!-- /.content -->