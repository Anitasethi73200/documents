const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .webpackConfig({
      resolve: {
         extensions: ['.js', '.json', '.ts'],
         alias: {
            '@ckeditor': path.resolve(__dirname, 'node_modules/@ckeditor')
         }
      },
      module: {
         rules: [
            {
               test: /\.svg$/,
               use: ['raw-loader']
            },
            {
               test: /\.ts$/,
               loader: 'ts-loader',
               options: {
                  transpileOnly: true
               }
            },
            {
               test: /\.css$/,
               use: [
                  {
                     loader: 'style-loader',
                     options: {
                        injectType: 'singletonStyleTag',
                        attributes: {
                           'data-cke': true
                        }
                     }
                  },
                  'css-loader',
                  {
                     loader: 'postcss-loader',
                     options: {
                        postcssOptions: styles.getPostCssConfig({
                           themeImporter: {
                              themePath: require.resolve('@ckeditor/ckeditor5-theme-lark')
                           },
                           minify: true
                        })
                     }
                  }
               ]
            }
         ]
      }
   });

if (mix.inProduction()) {
   mix.version();
}
