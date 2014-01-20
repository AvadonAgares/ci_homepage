<?php

function d() {
    foreach( func_get_args() as $item) {
        $_SESSION['page_system']['messages'][] = array(
            'content'   => print_r($item,true),
            'source'    => 'debug',
        );
    }
}

?>