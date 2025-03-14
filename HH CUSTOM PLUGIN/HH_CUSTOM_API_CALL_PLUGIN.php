// HH_API_CALL_CUSTOM

function display_NHLapi_data_shortcode() {
    // Make API call
    $api_url = 'https://api-web.nhle.com/v1/club-schedule-season/DAL/now';
    $response = wp_remote_get($api_url);

    // Check if API call was successful
    if (is_wp_error($response)) {
        return 'Error fetching data from the API';
    }

    // Parse API response
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    // Output the data
    $output = '<ul>';
    foreach ($data as $item) {
        $output .= '<li>' . $item['field1'] . ' - ' . $item['field2'] . '</li>';
    }
    $output .= '</ul>';

    return $output;
}
add_shortcode('display_api_data', 'display_NHLapi_data_shortcode');