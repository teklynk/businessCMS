<?php
if ( ! defined( 'ALLOW_INC' ) ) {
    die( 'Direct access not permitted' );
}
?>
    <!-- Pages Section -->
    <a name="pages" tabindex="-1"></a>
<?php

getPage( loc_id );

echo "<a name='pages'></a>";

if ( count($pageArray) > 0 ) {
    echo "<div class='container-fluid services'>";
    echo "<div class='container bannerwrapper'>";

    echo "<div class='row' id='pages'>";



    foreach($pageArray as $pageData) {

        echo "<div class='col-sm-6 col-md-3 col-lg-3 page-item'>";
        echo "<div class='panel panel-default text-center'>";

        echo "<div class='panel-body'>";

        if ( ! empty( $pageData['title'] ) ) {
            echo "<h1>" . $pageData['title'] . "</h1>";
        }

        if ( ! empty( $pageData['content'] ) ) {
            echo "<p>" . $pageData['content'] . "</p>";
        }

        if ( ! empty( $pageData['id'] ) ) {
            echo "<a href='" . $pageData['id'] . "' class='btn btn-primary'>Learn More</a>";
        }

        echo "</div>";

        echo "</div>";
        echo "</div>";
    }

    echo "</div>";

    echo "</div>";
    echo "</div>";

}
?>