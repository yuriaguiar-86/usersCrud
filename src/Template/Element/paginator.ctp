<?php
$paginator = $this->Paginator->setTemplates([
    'number' => '<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'current' => '<li class="page-item active"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'first' => '<li class="page-item"><a href="{{url}}" class="page-link">&laquo</a></li>',
    'last' => '<li class="page-item"><a href="{{url}}" class="page-link">&raquo</a></li>',
    'prevActive' => '<li class="page-item"><a href="{{url}}" class="page-link">Anterior</a></li>',
    'nextActive' => '<li class="page-item"><a href="{{url}}" class="page-link">Próximo</a></li>',
]);
?>
<nav aria-label="paginacao">
    <ul class="pagination pagination-sm justify-content-center">
        <?php
        echo $paginator->first();

        if ($paginator->hasPrev()) {
            echo $paginator->prev();
        }
        echo $paginator->numbers();
        if ($paginator->hasNext()) {
            echo $paginator->next();
        }

        echo $paginator->last();
        ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}<br> Apresentando {{current}} registros de {{count}}')]) ?></p>
</nav>
