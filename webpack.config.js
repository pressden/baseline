const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
  mode: 'production',
  externals: {
		jquery: 'jQuery',
	},
  entry: {
    main: '../webpack.js'
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, '../')
  },
  module: {
    rules: [
      {
        test: /\.(sa|sc|c)ss$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [
            'css-loader',
            {
              loader: 'sass-loader',
              options: {
                includePaths: [
                  "node_modules/bootstrap/scss",
                ]
              }
            }
          ]
        })
      },
      {
        test: /\.(jpg|jpeg|png|gif|svg)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].[ext]',
              outputPath: '/images/'
            }
          }
        ]
      },
      {
        test: /\.(woff|woff2|eot|ttf)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].[ext]',
              outputPath: '/fonts/'
            }
          }
        ]
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin('style.css'),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery'
    })
  ]
};
