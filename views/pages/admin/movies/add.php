<?php

/**
 * @var \App\Kernel\View\View $view //подсказываем что $view инстанс класса View
 * // в action нет пути admin/movies/add
 * @var \App\Kernel\Session\Session $seassion
 */
?>

<?php $view->component('start') ?>
<h1>Add movie page</h1>

<form action="/admin/movies/add" method="post">
    <p>Name</p>
    <div>
        <input type="text" name="name">
    </div>
    <?php if ($session->has('name')) { ?>
        <ul>
            <?php foreach ($session->get('name') as $error) { ?>
                <li style="color:red;"><?php echo $error ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
    <div>
        <button>Add</button>
    </div>
</form>
<?php $view->component('end') ?>