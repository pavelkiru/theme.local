'use strict';

process.env.NODE_ENV = 'development';

const webpack = require('webpack');
const path = require('path');
const webpackDevMiddleware = require('webpack-dev-middleware');
const webpackHotMiddleware = require('webpack-hot-middleware');
const browserSync = require('browser-sync');

// Get the Webpack config (with options)
const configuration = require('./webpack.config');
const server = browserSync.create();
const bundler = webpack(configuration);

// Env variables
const env = require('./env.config')

server.init({
	proxy: {
    // proxy local WP install
    target: env.PROXY_TARGET,
    middleware: [
      // converts browsersync into a webpack-dev-server
      webpackDevMiddleware(bundler, {
        publicPath: configuration.output.publicPath,
        noInfo: true
      }),
      // hot update js && css
      webpackHotMiddleware(bundler)
    ]
  },
	// logLevel: 'silent',
  files: ['./**/*.php'],
  open: true
});
