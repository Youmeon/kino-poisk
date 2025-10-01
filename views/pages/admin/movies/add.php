<?php

/**
 * @var \App\Kernel\View\View $view //подсказываем что $view инстанс класса View
 * // в action нет пути admin/movies/add
 */
?>

<?php $view->component('start') ?>
<h1>Add movie page</h1>

<form action="" method="post">
    <p>Name</p>
    <div>
        <input type="text" name="name">
    </div>
    <div>
        <button>Add</button>
    </div>
</form>
<?php $view->component('end') ?>