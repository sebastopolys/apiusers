<?php

/**
 * Custom Plugin Template
 * File: my-custom-page.php
 *
 */

declare(strict_types=1);

use App\API\ApiCall;

$res = new ApiCall();
$apiResp = json_decode($res->callApi(null));

$options = get_option('apiusers_settings');
if ($options['apiusers_radio_field_1'] === 'raw') {
    echo "<style>
   header,footer,.site-header,.site-footer{display:none;}
   </style>";
    echo '<h1 class="raw-title">Api Users table:</h1>';
}
get_header();
echo"<table><th>ID</th><th>Name</th><th>Username</th>";
for ($i = 0; $i < count($apiResp); $i++) {
        echo "<tr>";
        echo '<td><a href="#" id="id-'
        . esc_html($i) . '" class="tabledata" data="'
        . esc_attr($apiResp[$i]->id) . '">'
        . esc_html($apiResp[$i]->id) . "</a></td>";
        echo '<td><a href="#" id="name-'
        . esc_html($i) . '" class="tabledata" data="'
        . esc_attr($apiResp[$i]->id) . '">'
        . esc_html($apiResp[$i]->name) . "</a></td>";
        echo '<td><a href="#" id="username-'
        . esc_html($i) . '" class="tabledata" data="'
        . esc_attr($apiResp[$i]->id) . '">'
        . esc_html($apiResp[$i]->username) . "</a></td>";
        echo "</tr>";
}
echo "</table>";
if (isset($options['apiusers_checkbox_field_2'])) {
        echo
        '<p class="apiusers-credit">
        Api Users plugin was created by Sebastian Rossi for Inpsyde job application
        </p>';
}

?>
<div id="resp-ajax" class="">

</div>

<?php

get_footer();
