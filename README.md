## UC Santa Cruz | Science WordPress Core Functionality Plugin ##

[WordPress](https://github.com/wordpress/) plugin for [UC Santa,Cruz Science](https://science.ucsc.edu/).

This plugin contains the site's core functionality. Any custom post-types, taxonomies, or shrotcodes are defined in here rather than the theme, making it _theme independent_. If the current theme is changed at a future date, this plugin will ensure the any custom functionality remains. 

This plugin contains the following library structure; however, it can be expanded greatly:

* general.php -- for any general functions you would write

* post-types.php -- for registering custom post types

* shortcodes.php -- for writing custom shortcodes

* taxonomies.php -- for custom taxonomies

## Dependencies

- [Node.js](https://nodejs.org/en/)
- [npm](https://www.npmjs.com/)
- [Gulp](https://gulpjs.com/)

## Install and build

Clone this repository into the `/wp-content/plugins/` directory of your WordPress development environment. Navigate to the directory you cloned this repo into with your terminal and type:

```console
npm install
```

Wait several minutes for the installation to complete and you're in business!

## Gulp tasks

There are two Gulp tasks defined in the `gulpfile.js` file:

There is no `style.css` file in this repo. The `gulp styles` task will build your `style.css` file based on the SASS files located in `/assets/sass/`. This task will also created minified styles, saved as `styles.min.css`.

```console
gulp styles
```

The `gulp watch` task will continuously watch your `/assets/sass/` directory and rebuild your styles every time you save a SASS file.

```console
gulp watch
```

## Credits
- Developed by [Jason Chafin](https://github.com/herm71), Senior Web Developer, UC Santa Cruz Communications & Marketing