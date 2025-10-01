<?php

/**
 * @var \App\Kernel\View\View $view //подсказываем что $view инстанс класса View
 */
?>

<?php $view->component('start') ?>
<h1>Add movie page</h1>

<from action="" ;>
    <p>Name</p>
    <div>
        <input type="text" name="name">
    </div>
    <div>
        <button>Add</button>
    </div>
</from>
<?php $view->component('end') ?>