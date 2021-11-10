<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="sidebar-toggle text-light mr-3">
        <span class="navbar-toggler-icon"></span>
    </a>
    <a class="navbar-brand" href="#">Administrativo</a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle menu-header" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <img class="fas fa-user" width="20" height="20"> &nbsp;<span class="d-none d-sm-inline"><?= current(str_word_count($perfilUser['name'], 2)); ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <?= $this->Html->link(
                        '<i class="fas fa-user"></i> Perfil',
                        [
                            'controler' => 'Users', 'action' => 'perfil'
                        ],
                        [
                            'class' => 'dropdown-item',
                            'escape' => false
                        ]
                    ) ?>
                    <?= $this->Html->link(
                        '<i class="fas fa-sign-out-alt"></i> Sair',
                        [
                            'controler' => 'Users', 'action' => 'logout'
                        ],
                        [
                            'class' => 'dropdown-item',
                            'escape' => false
                        ]
                    ) ?>
                </div>
            </li>
        </ul>
    </div>
</nav>
