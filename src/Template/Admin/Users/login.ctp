<?= $this->Form->create('post', array('class' => 'form-signin')) ?>

<h1 class="h3 mb-3 font-weight-normal">Área Restrita</h1>

<?= $this->Flash->render(); ?>

<div class="form-group">
    <label>Usuário</label>
    <?php echo $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Digite o usuário', 'label' => false]); ?>
</div>
<div class="form-group">
    <label>Senha</label>
    <?php echo $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Digite a senha', 'label' => false]); ?>
</div>

<?= $this->Form->button(__('Acessar'), ['class' => 'btn btn-lg btn-primary btn-block']) ?>
<p class="text-center">Esqueceu a senha?
<?= $this->Html->link(__('Cadastrar'), ['controller' => 'Users', 'action' => 'cadastrar']) ?></p>
<?= $this->Form->end() ?>
