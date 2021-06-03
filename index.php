<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package asiermusa
 */

get_header();
?>

  <button type="button" class="btn btn-primary">Главный</button>
  <button type="button" class="btn btn-secondary">Вторичный</button>
  <button type="button" class="btn btn-success">Успех</button>
  <button type="button" class="btn btn-danger">Опасность</button>
  <button type="button" class="btn btn-warning">Предупреждение</button>
  <button type="button" class="btn btn-info">Инфо</button>
  <button type="button" class="btn btn-light">Светлый</button>
  <button type="button" class="btn btn-dark">Темный</button>

<?php

get_footer();
