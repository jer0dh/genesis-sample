# Genesis Dev using Genesis Sample Theme
> See original Docs below

## Styles
`config/appearance.php` holds 
* default colors like links that can be edited by WP Customizer.  
* A color palette that can be defined with custom colors 
* Different font sizes that can be customized.
> See `lib/gutenberg/inline-styles.php` that generates the inline styles for both colors and font sizes.
* The Google Fonts URL that will be loaded in `functions.php` for front-end and in `lib/gutenberg/init.php` for editor

Most SASS style files should be placed under `/css/supporting` and imported by main scss files.
### Main Scss files
* `/style.scss` - main front-end styling.  
* `lib/gutenberg/style-editor.scss` - Loaded in the editor. Import your block styles here. Best if you can import a
subset of the same scss files imported in the `/style.scss` 

### Dynamically created inline styles
* `/lib/output.php` creates inline styles for front-end. It uses the settings of `/config/appearance.php`
* `/lib/gutenberg/inline-styles.php` creates inline styles for font-sizes and color palettes from `/config/appearance.php`
for front-end and some for editor

## Bootstrap 4.x
`lib/bootstrap.php` shows how we have setup the structural wraps to use bootstraps .container and .row.
In the `gdev_init_structural_wrap` function the `$structural_wraps` array contains the standard locations
where structural wraps are to be placed.  This will put the normal
```html
<div class="container">
  <div class="row">
  
   </div>
</div>
```
wrapped around the content of this location.  If no other column definitions are to be made to the content, then
put the same location string in the `$structural_wraps_with_col12` array so the content will additionally be
wrapped in a `<div class="col-12">`

To put the extra bootstrap column classes to the content elements, take advantage of the genesis_attr() filter.

For instance, in the header lets put the title-area in a `col-md-4` column and the primary nav in a `col-md-8` column:

```php
// Title-area
add_filter( 'genesis_attr_title-area', function( $attributes ) {

	$attributes['class'] .= ' col-md-4';

	return $attributes;
});

// Nav
add_filter( 'genesis_attr_nav-primary', function( $attributes ) {

	$attributes['class'] .= ' col-md-8';

	return $attributes;
});


```

# Genesis Sample Theme

GitHub project link: https://github.com/studiopress/genesis-sample/.


## Installation Instructions

1. Upload the Genesis Sample theme folder via FTP to your wp-content/themes/ directory. (The Genesis parent theme needs to be in the wp-content/themes/ directory as well.)
2. Go to your WordPress dashboard and select Appearance.
3. Activate the Genesis Sample theme.
4. Inside your WordPress dashboard, go to Genesis > Theme Settings and configure them to your liking.

## Theme Support

Please visit https://my.studiopress.com/help/ for theme support.

## For Developers

The version of [Genesis Sample on GitHub](https://github.com/studiopress/genesis-sample/) includes tooling to check code against WordPress standards. To use it:

1. Install Composer globally on your development machine. [See Composer setup steps](https://getcomposer.org/doc/00-intro.md#downloading-the-composer-executable).
2. In the command line, change directory to the Genesis Sample folder.
3. Type the command `composer install` to install PHP development dependencies.
4. Type `composer phpcs` to run coding standards checks.

You'll see output highlighting issues with PHP files that do not conform to Genesis Sample coding standards.

Run `composer phpcbf` if you see “phpcbf can fix the x marked sniff violations automatically” in the output of `composer phpcs`.

### npm scripts

Scripts are also provided to help with CSS linting, CSS autoprefixing, and creation of pot language files. To use them:

1. Install [Node.js](https://nodejs.org/), which also gives you the Node Package Manager (npm).
2. In the command line, change directory to the Genesis Sample folder.
3. Type the command `npm install` to install dependencies.

You can then type any of these commands:

- `npm run autoprefixer` to add and remove vendor prefixes in `style.css`.
- `npm run makepot` to regenerate the `languages/genesis-sample.pot` file.
- `npm run lint:css` to generate a report of style violations for `style.css`.
- `npm run lint:js` to generate a report of style violations for JavaScript files.
- `npm run fix:js` to fix any JavaScript style violations that can be corrected automatically.
- `npm run zip` to create a genesis-sample.zip. Files in the `excludes` array in `scripts/makezip.js` are omitted.

### Packaging for distribution

1. Follow the install instructions for npm scripts above.
2. Switch to the git branch you plan to distribute.
3. Bump version numbers manually and commit those changes.
4. Type `npm run zip` to create `genesis-sample.zip`. Files in the `excludes` array in `scripts/makezip.js` are omitted from the zip. `filename.md` files will be renamed to `filename.txt`.
