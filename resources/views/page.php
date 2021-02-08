<html>
    <head>
        <title><?php echo $page->name ?></title>
    </head>
    <body>
        <?php
        if(!is_null($template))
            echo $template->header . "\n";
        foreach($components as $component){
            echo $component->content . "\n";
            if(!is_null($component->id_cat)){
                $category = $categories[$component->id][0];
                echo "<h3>" . $category->name . "</h3>";
                echo "<table>
                    <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>";
                foreach($products[$category->id] as $product){
                    echo "<tr>
                        <td>" . $product->name . "</td>
                        <td></td>
                        <td>" . $product->description . "</td>
                        <td>" . $product->price . " zł</td>
                    </tr>";
                }
                echo "</table>";
            }
            if(isset($component->path))
                echo "<img src='" . $component->path . "'/>";
        }
        if(!is_null($template))
            echo $template->footer . "\n";
        ?>
    </body>
</html>