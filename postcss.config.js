/*
* CSS and styling build steps.
*
* */

const fonts = require('./resources/bundling/fonts');
const purgeCss = require('./resources/bundling/purgeCss');

module.exports = {
    plugins: [
        require('tailwindcss'),
        require('postcss-font-magician')({variants: fonts.variants, foundries: fonts.foundries}),
        require('autoprefixer'),
        purgeCss
    ]
};
