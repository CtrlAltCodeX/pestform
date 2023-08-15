const path = require('path');
const mix = require('laravel-mix');

const devPublicPath = path.join(
    '..',
    '..',
    '..',
    'public'
);

const assetsPath = path.join(__dirname, 'src', 'Resources', 'assets');
const jsPath = path.join(assetsPath, 'js');

mix.setPublicPath(devPublicPath)
.js(path.join(jsPath, 'app.js'), 'front_end/js/app.js')
    .vue()