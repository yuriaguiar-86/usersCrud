<?= $this->Form->create($user, array('class' => 'form-signin')) ?>

<h1 class="h3 mb-3 font-weight-normal">Cadastro</h1>

<?= $this->Flash->render(); ?>

<div class="form-group">
    <label>Nome</label>
    <?php echo $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Nome Completo', 'label' => false]); ?>
</div>
<div class="form-group">
    <label>E-mail</label>
    <?php echo $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Digite seu e-amil', 'label' => false]); ?>
</div>
<div class="form-group">
    <label>Usuário</label>
    <?php echo $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Digite o usuário', 'label' => false]); ?>
</div>
<div class="form-group">
    <label>Senha</label>
    <?php echo $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Digite a senha', 'label' => false]); ?>
</div>

<?= $this->Form->button(__('Registrar'), ['class' => 'btn btn-lg btn-primary btn-block']) ?>
<p class="text-center">
    <?= $this->Html->link(__('Clique aqui'), ['controller' => 'Users', 'action' => 'login']) ?> se possui cadastro.</p>
<?= $this->Form->end() ?>
