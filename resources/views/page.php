<html>
    <head>
        <title><?php echo $page->name ?></title>
    </head>
    <body>
        <?php
        echo $template->header . "\n";
        foreach($components as $component){
            echo $component->content . "\n";
        }
        echo $template->footer . "\n";
        ?>
    </body>
</html>