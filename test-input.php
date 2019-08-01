<?php
    function test_input($data) {
        /*trim($data) will strip unnecessary characters (extra space, tab, newline)
            from the user input data (with the PHP trim() function). */
        $data = trim($data);
        /*stripslashes($data) will remove backslashes () from the user input data
            (with the PHP stripslashes() function). */
        $data = stripslashes($data);
        /* htmlspecialchars($data) converts special characters to HTML entities.
        (If the user inputs < and >, htmlspecialchars() will translate it to &lt; and &gt;).
        */
        $data = htmlspecialchars($data);
        return $data;
        }

?>