<html>
    <head>
    </head>
    <body>
        <form action="<?php echo route('page.index')?>" method="post" id="main_form">
            <?php echo csrf_field() ?>
            <?php echo isset($page) ? '<input type="hidden" name="id" value=' . $page->id . '>' : '' ?>
            <label for="text">Name</label>
            <input type="text" name="name" <?php echo isset($page) ? "value='" . $page->name . "'" : '' ?>>
            <label for="text">Template name</label>
            <select name="temp_name" form="main_form">
                <?php
                    echo '<option '; 
                    echo !isset($page) ? 'selected ' : '';  
                    echo 'value=>no template</option>';
                    foreach($templates as $template){
                        if(isset($page)){
                            echo '<option ';
                            echo $page->id_temp == $template->id ? 'selected ' : '';
                            echo 'value="' . $template->id . '">' . $template->name . '</option>';
                        }
                        else
                            echo '<option value="' . $template->id . '">' . $template->name . '</option>';
                    }
                ?>
            </select>
            <label for="text">Language</label>
            <select name="language" form="main_form" <?php echo isset($page) ? "value=" . $page->id_lang : '' ?>>
                <?php
                    foreach($languages as $language){
                        if(isset($page)){
                            echo '<option ';
                            echo $page->id_lang == $language->id ? 'selected ' : '';
                            echo 'value="' . $language->id . '">' . $language->tag . '</option>';
                        }
                        else
                            echo '<option value="' . $language->id . '">' . $language->tag . '</option>';
                    }
                ?>
            </select>
            <label for="text">Url</label>
            <input type="text" name="url" id="url" <?php echo isset($page) ? "value='" . $page->url . "'" : '' ?>>
            <button type="button" onclick="addComponent()">Add component</button>
            <div id="components">
                <?php
                    if(isset($components)){
                        foreach($components as $component){ 
                            echo "<div><textarea name='comp[" . $component->id . "]'>" .
                            $component->content . "</textarea>
                            <label for='text'>delete?</label>
                            <input type='checkbox' name='comp_del[" . $component->id . "]' value=" . 
                            $component->id . "></div>";
                        }
                    }
                ?>
            </div>
            <input type="submit" <?php echo isset($page) ? "name='update'" : "name='create'" ?> value="Save">
        </form>
    </body>
    <script>
        var comp_count = <?php echo isset($maximum) ? $maximum + 1 : 0 ?>;
        function addComponent(){
            var text = document.createElement("div");
            text.innerHTML = "<textarea name='comp[" + comp_count + "]'/>";
            var element = document.getElementById("components");
            element.appendChild(text);
            comp_count++;
        }
    </script>
</html>