# Baseline

## Getting Started

Baseline uses npm, webpack and SASS to speed up child theme development for WordPress and the Genesis framework.

### Requirements

You will need to have a copy of node.js installed and updated.
https://nodejs.org/en/

This project uses webpack for its installation.
https://webpack.js.org/guides/installation/

Baseline assumes you already have a copy of the Genesis framework in your themes folder.
https://www.studiopress.com/features/

### First Time Setup

Baseline is used to get a Genesis child theme up and running quickly.

In the steps below `my-child-theme` is used as an example. This should be replaced with your preferred directory name.

1. `cd wp-content/themes`
2. `mkdir my-child-theme`
3. `cd my-child-theme`
4. `git clone https://github.com/pressden/baseline.git`
5. `cp -r baseline/childtheme/* .`
8. `cd baseline`
9. `npm install`

### Naming Your Theme

After setup, a new theme with a default name of "Child Theme" will be available in WordPress. Renaming your new theme is simple.

1. Edit `scss/theme-header.scss` (line 2) to identify your theme in WordPress
2. Edit `functions.php` (line 10) to identify your theme in Genesis

### Running Webpack via NPM

While in the baseline directory (`cd wp-content/themes/my-child-theme/baseline`) use one of the following commands to compile the project:
* `npm start` will compile the project once
* `npm run watch` will watch the project and compile any time a change is detected

### Child Theme Structure

When setting up a project for the first time several files are copied from baseline into your child theme folder.

@TODO: Outline the folder structure and the purpose of the copied files here.

#### Important Notes

* Files in the `baseline` directory should not be modified. Everything in baseline (PHP, JS, SASS) can be overridden in your child theme.
* Generated files (`style.css` and `main.js`) should not be modified directly. Webpack overwrites these files on each build.
