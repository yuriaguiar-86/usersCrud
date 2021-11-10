<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Alterar Senha</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Visualizar'), ['controller' => 'Users', 'action' => 'perfil'], ['class' => 'btn btn-outline-primary btn-sm']) ?>
        </span>

        <div class="dropdown d-block d-md-none">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Users', 'perfil' => 'perfil'], ['class' => 'dropdown-item']) ?>
            </div>
        </div>
    </div>
</div>
<hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($user) ?>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Senha</label>
        <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Mínimo 08 caracteres', 'value' => '', 'label' => false]) ?>
    </div>
</div>

<p><span class="text-danger">* </span>Campo obrigatório</p>
<?= $this->Form->button(__('Editar'), ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>
