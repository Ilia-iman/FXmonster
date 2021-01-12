<?php
/*
Template Name: Item Preview Page
Template Post Type: post
*/
wp_head();
//wp_get_sidebars_widgets();
$postData = carbon_get_the_post_meta('crb_rows');

/*echo '<pre>';
print_r($postData);
echo '</pre>';*/
?>
    <div class="container">
        <?php
        if ($postData) {
            echo '<div class="col-85">';
            foreach ($postData as $rows) {
                $rowSize = 0;
                foreach ($rows as $key => $value) {
                    if ($key != '_type') {
                        $rowSize++;
                    }
                }
                echo '<div class="gif-row">';
                if ($rows['description']) {
                    $headers[] = $rows['description'];
                    echo '<h4 class="gif-header"><a name="' . $rows['description'] . '">' . $rows['description'] . '</a></h4>';
                }
                echo '<ul class="gif-preview">';
                for ($i = 1; $i < $rowSize; $i++) {
                    echo '<li>';
                    echo '<div class="gif-item">';
                    echo '<img class="gif-240" src=' . wp_get_attachment_image_url($rows['gif' . $i], 'full') . '>';
                    $gif_title = get_the_title($rows['gif' . $i]);
                    if ($gif_title) {
                        echo '<p>' . $gif_title . '</p>';
                    }
                    echo '</div>';
                    echo '</li>';
                }
                echo '</ul>';
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
        <div class="side-menu-col-20">
            <ul>
                <?php
                $headersNumber = count($headers);
                for ($i = 0; $i < $headersNumber; $i++){
                    echo '<li>' . $headers[$i] . '</li>';            }
                ?>
            </ul>
        </div>
    </div>
<?php
/*
 * Implementing VideoHive-like preview grid under product item
 *
 * foreach ($postData as $thing) {
    $rowSize = 0;
    foreach ($thing as $key => $value) {
        if ($key != '_type' and $key != 'description' and $value) {
            $rowSize++;
        }
    }
    switch ($rowSize) {
        case 1:
            $class = 'col-100';
            break;
        case 2:
            $class = 'col-50';
            break;
        case 3:
            $class = 'col-33';
            break;
        case 4:
            $class = 'col-25';
            break;
    }
    echo '<li>';
    if ($thing['description']) {
        echo '<p>' . $thing['description'] . '</p>';
    }
    for ($i = 0; $i <= $rowSize; $i++) {
        echo '<img class="$class" src=' . wp_get_attachment_image_url($thing['gif' . $i], 'full') . '>';
    }
    echo '</li>';
}
echo '</ul>';*/
?>

<?php
wp_footer();