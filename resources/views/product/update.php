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
                    echo 'value=>no major category</option>';
                    foreach($categories as $category){
                        if(isset($edit_category)){
                            echo '<option ';
                            echo $edit_category->id_cat == $category->id ? 'selected ' : '';
                            echo 'value="' . $category->id . '">' . $category->name . '</option>';
                        }
                        else
                            echo '<option value="' . $category->id . '">' . $category->name . '</option>';
                    }
                ?>
            </select>
            <input type="submit" <?php echo isset($edit_category) ? "name='update'" : "name='create'" ?> value="Save">
        </form>
        <form action="<?php echo route('product.createOne')?>" method="get">
            <?php
                if(isset($edit_category)){
                    echo "<input type='hidden' name='id_cat' value=" . $edit_category->id . ">
                    <input type='submit' name='create' value='New'>";
                }
            ?>
        </form>
        <table>
            <?php
                if(isset($products)){
                    foreach($products as $product){
                        echo "<tr>
                            <td>". $product->id ."</td>
                            <td>". $product->id_cat ."</td>
                            <td>". $product->name ."</td>
                            <td>". $product->description ."</td>
                            <td>". $product->price ."</td>
                            <td>". $product->created_by ."</td>
                            <td>". $product->last_edited ."</td>
                            <td>
                                <form action=" . route('product.updateOne') . ">
                                    <input type='hidden' name='id' value=" . $product->id . ">
                                    <input type='hidden' name='id_cat' value=" . $product->id_cat . ">
                                    <input type='submit' value='edit'>
                                </form>
                            </td>
                            <td>
                                <form action=" . route('product.update') . " method='post'>"
                                    . csrf_field() .
                                    "<input type='hidden' name='id' value=" . $product->id . ">
                                    <input type='hidden' name='id_cat' value=" . $product->id_cat . ">
                                    <input type='submit' name='delete' value='x'>
                                </form>
                            </td>
                        </tr>";
                    }
                }
                else
                    echo "<p>no products in this category</p>";
            ?>
        </table>
    </body>
</html>