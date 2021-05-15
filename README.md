# Webpack WordPress Theme

Underscores theme based WordPress and webpack integration.

## Features

- Hot Module Replacement (HMR) 
- SCSS support
- Autoprefixer
- JS Compiler (Babel)
- Minifying assets for production
- Easy to add fonts, images... via webpack

## Requirements

- Node JS
- NPM
- Webpack globally installed
- WordPress locally installed (MAMP, XAMP...)

## Folders and files

Copy to your WordPress theme this required folders/files:

```bash
- package.json
- _webpack
- _src
```

Copy this lines in your functions.php inside `wp_enqueue_scripts` action hook.
More info: https://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts

```php
  $manifest = json_decode(file_get_contents('dist/assets.json', true));
  $main = $manifest->main;
  wp_enqueue_style('theme-css', get_template_directory_uri() . "/dist" . $main->css,  false, null);
  wp_enqueue_script('theme-js', get_template_directory_uri() . "/dist" . $main->js, ['jquery'], null, true);
```

If you want to add custom images/fonts copy or create this folders:

```bash
- img
- fonts
```


## Installation

Go to your project base theme and install all the dependecies:

```bash
npm i
```

## Development

```bash
npm start
```

It will open a new window with your WordPress installation and it will generate a `dist` folder with all required files. Your project is now running in dev mode. Modifications made to CSS/JS in the source code results in an instant browser update. WITHOUT A FULL RELOAD.

## Production

```bash
npm run build
```

It will generate a `dist` folder ready to deploy.

## License

[MIT](https://choosealicense.com/licenses/mit/)


## Author
@asiermusa