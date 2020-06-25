<?php
if (!function_exists('get_response')) {
    function get_response($status_code, $api_messages = [], $api_data = null)
    {
        return response()->json(
            [
                'data' => $api_data,
                'meta' => [
                    'messages' => $api_messages,
                ],
            ],
            $status_code
        );
    }
}

?>
