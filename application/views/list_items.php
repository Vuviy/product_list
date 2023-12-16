
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="add">Додати покупку</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/category/add_category'?>">Додати категорію</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/category/list_category'?>">Категорії</a>
        </li>
    </ul>

    <form action="" method="get">
    <ul class="nav justify-content-center">
        <li class="nav-item m-3">
            <div>
                <p>Статус</p>
                <select class="form-select status" name="status" aria-label="Default select example">
                    <?php if(!empty($_GET) && isset($_GET['status'])){?>
                        <option  <?php echo $_GET['status'] == 0 || $_GET['status'] == 1 ? '' : 'selected' ?> >status</option>
                        <option <?php echo !empty($_GET) && $_GET['status'] == 1 ? 'selected' : '' ?> value="1">Куплено</option>
                        <option <?php echo !empty($_GET) && $_GET['status'] == 0 ? 'selected' : '' ?> value="0">Не Куплено</option>
                    <?php } else{ ?>
                        <option selected>status</option>
                        <option value="1">Куплено</option>
                        <option value="0">Не куплено</option>
                    <?php } ?>
                </select>
            </div>
        </li>
        <li class="nav-item m-3">
            <div>
                <p>Категорія</p>
                <?php if(!empty($_GET) && isset($_GET['category'])){?>
                    <select class="form-select category" name="category" aria-label="Default select example">
                        <option   <?php echo $_GET['category'] === 'category' ? 'selected' : '' ?>  >category</option>
                        <?php foreach ($categories as $category){ ?>
                            <option <?php echo $_GET['category'] == $category['id'] ? 'selected' : '' ?> value="<?php echo $category['id'] ?>"><?php echo $category['title'] ?></option>
                        <?php } ?>
                    </select>
                <?php } else{ ?>
                    <select class="form-select category" name="category" aria-label="Default select example">
                        <option selected>category</option>
                        <?php foreach ($categories as $category){ ?>
                            <option value="<?php echo $category['id'] ?>"><?php echo $category['title'] ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </div>
        </li>
        <li class="nav-item m-3">
            <button type="submit" class="btn btn-primary filter">Вибрати</button>
        </li>
    </ul>
    </form>
    <div class="item-list">

        <div class="list-group" style="max-width: 80%; margin-left: auto; margin-right: auto;">

        <?php if(empty($items)){?>

            <h2 class="p-5" style="max-width: 80%; margin-left: auto; margin-right: auto;">Нічого немає</h2>
            <?php } ?>
        <?php foreach ($items as $item){?>

            <div data-id="<?php echo $item['id']?>" class="list-group-item list-group-item-action m-3 <?php echo $item['status'] ? 'bg-success bg-gradient' : 'bg-danger bg-gradient' ?>" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $item['title']?></h5>
                    <small><?php echo date('H:m  Y.m.d', strtotime($item['created_at']))?></small>
                </div>

                <p class="mb-1">Категорія: <?php foreach ($categories as $category){
                    if($item['category_id'] == $category['id'])
                        echo $category['title'];
                    }; ?>
                </p>
                <p>Статус: <span><?php echo $item['status'] ? 'Куплено' : 'Не Куплено'?></span></p>
                <div>
                    <button type="button" data-btn="<?php echo $item['id']?>" data-id="<?php echo $item['id']?>" data-status="<?php echo $item['status']?>" class="btn btn-success border border-dark change-status-item"><?php echo $item['status'] ? 'Позначити як НЕ куплено' : 'Позначити як куплено'?></button>
                    <button type="button" data-id="<?php echo $item['id']?>" class="btn btn-danger delete-item border border-dark">Видалити</button>
                </div>
            </div>
            <?php }?>
        </div>
    </div>