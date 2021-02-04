<html>
    <head>
    </head>
    <body>
        <form action="<?php echo route('product.index')?>" method="post" id="main_form">
            <?php echo csrf_field() ?>
            <?php echo isset($edit_category) ? '<input type="hidden" name="id" value=' . $edit_category->id . '>' : '' ?>
            <label for="text">Name</label>
            <input type="text" name="name" <?php echo isset($edit_category) ? "value='" . $edit_category->name . "'" : '' ?>>
            <label for="text">Major category</label>
            <select name="id_cat" form="main_form">
                <?php
                    echo '<option '; 
                    echo !isset($edit_category) ? 'selected ' : '';  
                    echo 'value=>no template</option>';
                    foreach($categories as $category){
                        if(isset($edit_category)){
                            echo '<option ';
                            echo $edit_category->id_temp == $category->id ? 'selected ' : '';
                            echo 'value="' . $category->id . '">' . $category->name . '</option>';
                        }
                        else
                            echo '<option value="' . $category->id . '">' . $category->name . '</option>';
                    }
                ?>
            </select>
            <input type="submit" <?php echo isset($edit_category) ? "name='update'" : "name='create'" ?> value="Save">
        </form>
    </body>
</html>