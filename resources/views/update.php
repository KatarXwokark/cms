<html>
    <head>
    </head>
    <body>
        <form action="<?php echo route('page.index')?>" method="get" id="main_form">
            <label for="text">Name</label>
            <input type="text" name="name">
            <label for="text">Template name</label>
            <select name="temp_name" form="main_form">
                <?php
                    foreach($templates as $template)
                        echo '<option value="' . $template->id . '">' . $template->name . '</option>'
                ?>
            </select>
            <label for="text">Language</label>
            <select name="language" form="main_form">
                <?php
                    foreach($languages as $language)
                        echo '<option value="' . $language->id . '">' . $language->tag . '</option>'
                ?>
            </select>
            <label for="text">Url</label>
            <input type="text" name="url" id="url">
            <button type="button" onclick="addComponent()">Add component</button>
            <div id="components"></div>
            <input type="submit" name="create" value="Save">
        </form>
    </body>
    <script>
        var comp_count = 0;
        function addComponent(){
            var text = document.createElement("div");
            text.innerHTML = "<textarea name='comp[]" + comp_count + "'/>";
            var element = document.getElementById("components");
            element.appendChild(text);
            comp_count++;
        }
    </script>
</html>