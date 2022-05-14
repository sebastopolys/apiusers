<?php

/**
 * Custom Plugin Template
 *
 * Template File: ApiUsersTemplate.php
 **/

declare(strict_types=1);

use App\API\ApiCall;
use App\Backend\BackendOptions;

$obj = new BackendOptions();
$res = new ApiCall();
$apiResp = json_decode($res->callApi(null));

if ($obj->option['apiusers_radio_field_1'] === 'raw') {
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

if (isset($obj->option['apiusers_checkbox_field_2'])) {
        echo '<p class="apiusers-credit">' . 
        $obj->option['apiusers_text_field_1'] . '</p>';
}

?>
<div id="resp-ajax" class="">

</div>

<?php

get_footer();
