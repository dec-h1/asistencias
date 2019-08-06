<?php
    if (!empty($_SESSION['msgbox_info']) == 1)
    {
        echo '
            <div class="wrap-message-info">
                <form action="#" method="POST">
			        <button class="button icon icon-delete" name="close_msgbox_info" value="1" type="submit"></button>
			    </form>
                <h1>'.$_SESSION['text_msgbox_info'].'</h1>
            </div>
        ';
    }
    if (!empty($_SESSION['msgbox_error']) == 1)
    {
        echo '
            <div class="wrap-message-error">
                <form action="#" method="POST">
			        <button class="button icon icon-delete" name="close_msgbox_error" value="1" type="submit"></button>
			    </form>
                <h1>'.$_SESSION['text_msgbox_error'].'</h1>
            </div>
        ';
    }
?>