<html>
    <head>
    </head>
    <body>
        <div>
            <a href="<?php echo route('page.index'); ?>">Pages</a>
            <a href="<?php echo route('template.index'); ?>">Templates</a>
        </div>
        <button type="button" onclick="redirCreate()">New</button>
        <table>
            <?php
                foreach($templates as $template){
                    echo "<tr>
                        <td>". $template->id ."</td>
                        <td>". $template->name ."</td>
                        <td>
                            <form action=" . route('template.update') . ">
                                <input type='hidden' name='id' value=" . $template->id . ">
                                <input type='submit' value='edit'>
                            </form>  
                        </td>
                        <td>                          
                            <form action=" . route('template.index') . " method='post'>"
                                . csrf_field() .
                                "<input type='hidden' name='id' value=" . $template->id . ">
                                <input type='submit' name='delete' value='X'>
                            </form>
                        </td>
                    </tr>";
                }
            ?>
        </table>
    </body>
    <script>
        function redirCreate(){
            window.location="<?php echo route('template.create'); ?>";
        }
    </script>

    </body>
</html>