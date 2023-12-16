
<div>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/item/add'?>">Додати покупку</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="add_category">Додати категорію</a>
        </li>
    </ul>

    <div>

    </div>

    <div class="list-group" style="max-width: 80%; margin-left: auto; margin-right: auto;">

        <?php foreach ($items as $item){?>

            <div data-id="<?php echo $item['id']?>" class="list-group-item list-group-item-action m-3" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $item['title']?></h5>
                </div>
                <div>
                    <button data-id="<?php echo $item['id']?>" type="button" class="btn btn-danger delete-category">Видалити</button>
                </div>
            </div>

            <?php }?>
    </div>

</div>
