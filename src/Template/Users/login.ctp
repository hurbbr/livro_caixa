<?php
$this->setLayout('login');
?>
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <?= $this->Form->create() ?>
                <h1>Livro Caixa</h1>
                <div>
                    <?= $this->Form->input('username', ['class' => 'form-control', 'placeholder' => 'Username', 'label' => false, 'required' => true]) ?>
                </div>
                <div>
                    <?= $this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Senha de Acesso', 'label' => false, 'required' => true]) ?>
                </div>
                <div>
                    <?= $this->Form->button(__('Entrar'), ['class' => 'btn btn-primary btn-block btn-flat']); ?>

                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <p>©2016 Todos Direitos Reservados. Desenvolvido por Hostmoz,Lda</p>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </section>
        </div>
    </div>
</div>