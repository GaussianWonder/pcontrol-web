module.exports = {
  'env': {
    'browser': true,
    'es2021': true,
  },
  'extends': [
    'eslint:recommended',
    'plugin:vue/strongly-recommended',
  ],
  'parserOptions': {
    'ecmaVersion': 12,
    'sourceType': 'module',
  },
  'plugins': [
    'vue',
  ],
  'rules': {
    'indent': [
      'error',
      2,
    ],
    'quotes': [
      'error',
      'single',
    ],
    'semi': [
      'error',
      'always',
    ],
    'comma-dangle': [
      'error',
      'always-multiline',
    ],
    'no-trailing-spaces': [
      'error',
      {
        'ignoreComments': true,
      },
    ],
    'no-empty': 0,
    'no-unused-vars': 0,
    'no-undef': 0,
    'no-mixed-spaces-and-tabs': 0,
    'vue/no-v-for-template-key': 'ignore',
  },
};