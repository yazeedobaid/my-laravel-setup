module.exports = {
    root: true,
    noInlineConfig: true,
    env: {
        browser: true,
        es6: true
    },
    extends: [
        'standard',
        'plugin:vue/recommended'
    ],
    globals: {
        Atomics: 'readonly',
        SharedArrayBuffer: 'readonly'
    },
    parserOptions: {
        ecmaVersion: 2018,
        sourceType: 'module'
    },
    plugins: [
        'vue'
    ],
    rules: {
        'indent': ['error', 4],
        'no-console': 'error',
        'semi': ['error', 'always', {
            'omitLastInOneLineBlock': true
        }],
        'vue/array-bracket-spacing': 'error',
        'vue/arrow-spacing': 'error',
        'vue/brace-style': 'error',
        'vue/camelcase': 'error',
        'vue/component-name-in-template-casing': ['error', 'PascalCase'],
        'vue/eqeqeq': 'error',
        'vue/key-spacing': 'error',
        'vue/script-indent': ['error', 4],
        'vue/html-indent': ["error", 4],
        'vue/v-on-function-call': 'warn'
    },
    'overrides': [
        {
            'files': ['*.vue'],
            'rules': {
                'indent': 'off'
            }
        }
    ]
};
