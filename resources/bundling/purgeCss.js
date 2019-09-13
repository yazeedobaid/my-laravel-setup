/*
* Purge CSS to remove unused styles in application. It is executed in
* production environment only!
*
* */
const purgeCss = require('@fullhuman/postcss-purgecss')({

    // Paths to all of the template files in the application
    content: [
        './resources/views/**/*.html',
        './resources/views/*.php',
        './resources/js/components/**/*.vue'
    ],

    // Tailwind extractor
    defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
});

module.exports = process.env.NODE_ENV === 'production' ? purgeCss : null;
