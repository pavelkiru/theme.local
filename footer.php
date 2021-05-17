<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package asiermusa
 */

?>

<div>
<?php
$firstName = esc_attr( get_option('first_name'));

echo $firstName;
?>
</div>
<?php wp_footer(); ?>

</body>
</html>
