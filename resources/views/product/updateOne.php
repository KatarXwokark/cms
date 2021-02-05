<html>
    <head>
    </head>
        <form action="<?php echo route('product.update')?>" method="post" id="main_form">
            <?php echo csrf_field() ?>
            <?php echo isset($product) ? '<input type="hidden" name="id" value=' . $product->id . '>' : '' ?>
            <input type="hidden" name="id_cat" value=<?php echo $id_cat?>>
            <label for="text">Name</label>
            <input type="text" name="name" <?php echo isset($product) ? "value='" . $product->name . "'" : '' ?>>
            <label for="text">Description</label>
            <input type="text" name="description" <?php echo isset($product) ? "value='" . $product->description . "'" : '' ?>>
            <label for="text">Price</label>
            <input type="text" name="price" <?php echo isset($product) ? "value='" . $product->price . "'" : '' ?>>
            <input type="submit" <?php echo isset($product) ? 'name="update"' : 'name="create"' ?> value="Save">
        </form>
    <body>
    </body>
</html>