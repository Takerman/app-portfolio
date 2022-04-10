<?php
define( 'WP_CACHE', true ); // By SiteGround Optimizer

if ($_SERVER['SERVER_NAME'] === "tanyo") {
        require_once(ABSPATH . 'wp-config.dev.php');
} else {
        require_once(ABSPATH . 'wp-config.prod.php');
}