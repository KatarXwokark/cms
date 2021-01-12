<html>
    <head>
    </head>
    <body>
        
        <table>
            <?php
                foreach($pages as $page){
                    echo "<tr>
                        <td>". $page->id ."</td>
                        <td>". $page->name ."</td>
                        <td>". $page->name_temp ."</td>
                        <td>". $page->language ."</td>
                        <td>". $page->url ."</td>
                        <td>". $page->author ."</td>
                        <td>". $page->last_edited ."</td>
                    </tr>";
                }
            ?>
        </table>
    </body>
</html>