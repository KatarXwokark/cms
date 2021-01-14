<html>
    <head>
    </head>
    <body>
        <button type="button" onclick="redirCreate()">New</button>
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
                        <td>
                            <form action=" . route('page.update') . ">
                                <input type='hidden' name='id' value=" . $page->id . ">
                                <input type='submit' value='edit'>
                            </form>
                        </td>
                    </tr>";
                }
            ?>
        </table>
    </body>
    <script>
        function redirCreate(){
            window.location="<?php echo route('page.create'); ?>";
        }
    </script>
</html>