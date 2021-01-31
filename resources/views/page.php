<html>
    <head>
        <title><?php echo $page->name ?></title>
    </head>
    <body>
        <?php
        if(isset($template))
            echo $template->header . "\n";
        foreach($components as $component){
            echo $component->content . "\n";
        }
        if(isset($template))
            echo $template->footer . "\n";
        ?>
    </body>
</html>