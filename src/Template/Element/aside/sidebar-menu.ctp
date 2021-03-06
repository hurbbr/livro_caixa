    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <ul class="nav side-menu">
                <li><a href="<?php echo $this->Url->build(['controller' => 'Lancamentos', 'action' => 'index']); ?>"><i class="fa fa-home"></i> Lançamentos</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Contas', 'action' => 'index']); ?>"><i class="fa fa-home"></i> Contas</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Categorias', 'action' => 'index']); ?>"><i class="fa fa-home"></i> Categorias</a></li>
            </ul>
        </div>
    </div>
    <!-- /sidebar menu -->