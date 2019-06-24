<?php
if (!function_exists('is_current_route')) {
    function is_current_route($uri, $output = 'active')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}

if (!function_exists('format_message')) {
    function format_message($message, $type)
    {
        return '<div class="alert alert-' . $type . ' alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>' . $message . ' </strong>
    </div>';
    }
}

if (!function_exists('format_message_front')) {
    function format_message_front($message, $type)
    {
        return '<div class="alert alert-' . $type . ' alert-dismissible fade in" role="alert">
    <strong>' . $message . ' </strong>
    </div>';
    }
}
