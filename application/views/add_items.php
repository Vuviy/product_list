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

        <div class="p-3">
            <label  class="p-3" for="category_id">Категорія</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
                <option selected>category</option>
                <?php foreach ($categories as $category){ ?>
                    <option value="<?php echo $category['id'] ?>"><?php echo $category['title'] ?></option>
                <?php } ?>
            </select>
        </div>

           <?php if(isset($error)){?>
            <div class="p-3 border border-danger m-3">
                   <p><?php echo $error ?></p>
            </div>
           <?php }?>
        <input type="submit" name="submit" value="Додати" class="btn btn-primary"></input>

    </form>
</div>
