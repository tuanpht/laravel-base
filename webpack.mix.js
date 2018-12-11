/*
 |--------------------------------------------------------------------------
 | Mix utilities
 |--------------------------------------------------------------------------
 |
 */
const mix = require('laravel-mix');
const publicBasePath = 'public/assets';
const resourceBasePath = 'resources/assets';
mix.setPublicPath(publicBasePath)
    .setResourceRoot('/assets/');

const compileJsInFolder = (resourceJsFolder) => {
    const fs = require('fs');
    const path = require('path');
    const resourceFolder = path.join(resourceBasePath, resourceJsFolder);
    const publicFolder = path.join(publicBasePath, resourceJsFolder)

    const files = fs.readdirSync(resourceFolder);
    files.forEach(file => {
        if (path.extname(file).toLowerCase() === '.js') {
            mix.js(path.join(resourceFolder, file), path.join(publicFolder, file));
        }
    });
}

const compileJs = (resourceFiles) => {
    resourceFiles.forEach(resourceFile => {
        mix.js(path.join(resourceBasePath, resourceFile), path.join(publicBasePath, resourceFile));
    });
}

const compileSass = (resourceFiles) => {
    resourceFiles.forEach(resourceFile => {
        mix.sass(path.join(resourceBasePath, resourceFile[0]), path.join(publicBasePath, resourceFile[1]));
    });
}

const copyFiles = (files) => {
    files.forEach(file => {
        mix.copy(file[0], path.join(publicBasePath, file[1]));
    });
}

const copyFolders = (folders) => {
    folders.forEach(folder => {
        mix.copyDirectory(folder[0], path.join(publicBasePath, folder[1]));
        if (folder[2]) {
            mix.version(path.join(publicBasePath, folder[2]));
        }
    });
}

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
compileJs([
    'js/web/web.js',
    'js/admin/admin.js',
]);

// Js for each page
compileJsInFolder('js/admin/pages/');

compileSass([
    ['sass/web/web.scss', 'css/web/web.css'],
    ['sass/admin/admin.scss', 'css/admin/admin.css'],
]);

// Copy some vendor packages
copyFiles([
    ['node_modules/@fortawesome/fontawesome-free/css/all.min.css', 'vendor/fontawesome/css'],
]);

copyFolders([
    ['node_modules/@fortawesome/fontawesome-free/webfonts', 'vendor/fontawesome/webfonts'],
    ['resources/assets/images', 'images'],
])

// Versioning
mix.version();
