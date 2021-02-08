<html>
    <head>
    </head>
    <body>
        <form action="<?php echo route('template.index')?>" method="post" id="main_form">
            <?php echo csrf_field() ?>
            <?php echo isset($template) ? '<input type="hidden" name="id" value=' . $template->id . '>' : '' ?>
            <label for="text">Name</label>
            <input type="text" name="name" <?php echo isset($template) ? "value='" . $template->name . "'" : '' ?>>
            <label for="header">Header</label>
            <textarea name="header"> <?php echo isset($template) ? $template->header : '' ?> </textarea>
            <label for="text">Footer</label>
            <textarea name="footer"> <?php echo isset($template) ? $template->footer : '' ?> </textarea>
            <input type="submit" <?php echo isset($template) ? "name='update'" : "name='create'" ?> value="Save">
        </form>
    </body>
</html>