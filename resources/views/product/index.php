<html>
    <head>
    </head>
    <body>
        <div>
            <a href="<?php echo route('page.index'); ?>">Pages</a>
            <a href="<?php echo route('template.index'); ?>">Templates</a>
            <a href="<?php echo route('product.index'); ?>">Products</a>
        </div>
        <button type="button" onclick="redirCreate()">New</button>
        <table>
            <?php
                foreach($categories as $category){
                    echo "<tr>
                        <td>". $category->id ."</td>
                        <td>". $category->id_cat ."</td>
                        <td>". $category->name ."</td>
                        <td>
                            <form action=" . route('product.update') . ">
                                <input type='hidden' name='id' value=" . $category->id . ">
                                <input type='submit' value='edit'>
                            </form>
                        </td>
                        <td>
                            <form action=" . route('product.index') . " method='post'>"
                                . csrf_field() .
                                "<input type='hidden' name='id' value=" . $category->id . ">
                                <input type='submit' name='delete' value='x'>
                            </form>
                        </td>
                    </tr>";
                }
            ?>
        </table>
    </body>
    <script>
        function redirCreate(){
            window.location="<?php echo route('product.create'); ?>";
        }
    </script>
</html>