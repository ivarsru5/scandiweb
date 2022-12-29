<?php
$data = file_get_contents( "php://input" );
$data = json_decode( $data );
echo $data[0];
?>