<html>
    <head>
    </head>
    <body>
        <button type="button" onclick="redir()">New</button>
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
    <script>
        function redir(){
            window.location="<?php echo route('page.create'); ?>";
        }
    </script>
</html>