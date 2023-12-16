<?php echo validation_errors(); ?>

<?php //echo form_open('test/create'); ?>
<?php //echo form_open('create'); ?>

<div class="w-50" style="margin-left: auto; margin-right: auto; margin-top: 100px">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/item/list_items'?>">Список покупок</a>
        </li>
    </ul>

    <form action="add" method="post">



        <div class="input-group input-group-lg p-3">
            <span class="input-group-text" id="inputGroup-sizing-lg">Назва</span>
            <input name="title" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>
<!--        <input type="submit" name="submit" value="Create item" />-->
<!--        <button type="submit" name="submit" class="btn btn-primary">Create item</button>-->
        <input type="submit" name="submit" value="Додати" class="btn btn-primary"></input>

    </form>
</div>
