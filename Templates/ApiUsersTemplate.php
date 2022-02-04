<?php

/**
 * Custom Plugin Template
 * File: my-custom-page.php
 *
 */

declare(strict_types=1);

use App\API\ApiCall;

$res = new ApiCall();
get_header(); ?>

    <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    <?php

    $apiResp = json_decode($res->callApi(null));
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

    ?>
<div id="resp-ajax" class="">

</div>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();