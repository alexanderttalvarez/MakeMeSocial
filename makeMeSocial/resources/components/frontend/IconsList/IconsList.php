<?php

echo "<ul class='mms-SocialNetworks'>";
foreach( $social_networks as $sn ) {

    echo "<li>";
    echo "<a href='" . $sn['url'] . "'>";
    echo "<img src='" . mms_get_image( $sn['network'].".png" ) . "' alt='" . $sn['network'] . "'>";
    echo "</a>";
    echo "</li>";

}
echo "</ul>";
