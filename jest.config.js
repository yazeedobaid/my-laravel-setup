// For a detailed explanation regarding each configuration property, visit:
// https://jestjs.io/docs/en/configuration.html

module.exports = {

    // Automatically clear mock calls and instances between every test
    clearMocks: true,

    // The directory where Jest should output its coverage files
    coverageDirectory: "coverage",

    // Activates notifications for test results
    notify: true,

    // An enum that specifies notification mode. Requires { notify: true }
    notifyMode: "failure-change",

    // The test environment that will be used for testing
    // testEnvironment: "jest-environment-jsdom",

    // A map from regular expressions to module names that allow to stub out resources with a single module
    moduleNameMapper: {
        "^vue$": "vue/dist/vue.common.js"
    },

    // An array of file extensions your modules use. Vue components and JS files.
    moduleFileExtensions: [
        "js",
        "vue"
    ],

    // A map from regular expressions to paths to transformers. For each file type, specify which
    // pre-processor to use before given to jest
    transform: {
        "^.+\\.js$": "<rootDir>/node_modules/babel-jest",
        ".*\\.(vue)$": "<rootDir>/node_modules/vue-jest"
    }

};
