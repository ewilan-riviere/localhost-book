// module.exports = {
//   root: true,
//   env: {
//     browser: true,
//     es2021: true,
//   },
//   extends: [
//     // 'eslint:recommended',
//     'plugin:vue/essential',
//     'plugin:vue/recommended',
//     'plugin:prettier/recommended',
//   ],
//   plugins: ['vue', 'prettier'],
//   rules: {},
// }

module.exports = {
  //   root: true,
  //   env: {
  //     browser: true,
  //     node: true,
  //   },
  //   parserOptions: {
  //     parser: 'babel-eslint',
  //   },
  //   extends: [
  //     'prettier',
  //     'prettier/vue',
  //   'plugin:prettier/recommended'
  //   ],
  //   plugins: ['prettier'],
  //   // add your custom rules here
  //   rules: {
  //     'no-console': process.env.NODE_ENV === 'production' ? 'error' : 'off',
  //     'no-debugger': process.env.NODE_ENV === 'production' ? 'error' : 'off',
  //     'vue/no-v-html': 'off',
  //     'vue/component-name-in-template-casing': [
  //       'error',
  //       'kebab-case',
  //       {
  //         registeredComponentsOnly: true,
  //         ignores: [],
  //       },
  //     ],
  //   },
  root: true,
  env: {
    node: true,
  },
  extends: [
    'plugin:vue/essential',
    'eslint:recommended',
    'plugin:prettier/recommended',
  ],
  rules: {},
  parserOptions: {
    parser: 'babel-eslint',
  },
}
