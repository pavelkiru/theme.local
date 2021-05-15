const webpack = require('webpack');
const path = require('path');
const autoprefixer = require('autoprefixer');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const WriteFilePlugin = require('write-file-webpack-plugin'); //to create folders
const AssetsPlugin = require('assets-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");

const DEV = process.env.NODE_ENV !== 'production'

module.exports = {
	mode: DEV ? 'development' : 'production',
	entry: DEV ? ['./_src/app.js','webpack-hot-middleware/client'] : ['./_src/app.js'],
	output: {
		path: path.join(__dirname, '../dist'),
		filename: DEV ? 'bundle.js' : 'bundle.[hash:8].js',
		publicPath: '/'
	},
	module: {
		rules: [
		{
			test: /\.js$/,
			exclude: /node_modules/,
			loader: 'babel-loader',
			options: {
				presets: ['env']
			}
		},
		{
			test: /\.(scss$|css$)/,
			use: [
				DEV ? { loader: 'style-loader', options: { sourceMap: true }} : MiniCssExtractPlugin.loader,
				{ 
					loader: 'css-loader', 
					options: { sourceMap: true }
				},
				{
					loader: 'postcss-loader',
					options: {
						ident: "postcss",
						sourceMap: true,
						plugins: () => [
							autoprefixer({
								browsers: [
									">1%",
									"last 4 versions",
									"Firefox ESR",
									"not ie < 9" // React doesn't support IE8 anyway
								]
							}),
						]
					}
				},
				{ 
					loader: 'sass-loader', 
					options: { sourceMap: true }
				},
			]
		},
		{
			test: /\.(png|jpg)$/,
			loader: 'file-loader',
			options: {
				name: DEV ? '[name].[ext]' : '[name].[hash:8].[ext]',
				outputPath: 'images',
				publicPath: DEV ? '' : 'images',
			}
		},
		{
			test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
			use: [{
				loader: 'file-loader',
				options: {
					name: DEV ? '[name].[ext]' : '[name].[hash:8].[ext]',
					outputPath: 'fonts'
				}
			}]
		}
	]},

	optimization: {
		minimize: !DEV,
		minimizer: [
			new OptimizeCSSAssetsPlugin({
				cssProcessorOptions: {
					map: {
						inline: false,
						annotation: true,
					}
				}
			}),
			new TerserPlugin({
				terserOptions: {
					compress: {
						warnings: false
					},
					output: {
						comments: false
					}
				},
				sourceMap: false
			})
		]
	},
	
	plugins: [
		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery: 'jquery',
			'window.jQuery': 'jquery'
		}),
		!DEV && new CleanWebpackPlugin(),
		DEV && new webpack.HotModuleReplacementPlugin(),
		new WriteFilePlugin({
			// exclude hot-update files
			test: /^(?!.*(hot)).*/,
		}),
		new MiniCssExtractPlugin({
			filename: DEV ? 'styles.css' : 'styles.[hash:8].css'
		}),
		new AssetsPlugin({
			path: path.join(__dirname, '../dist'),
			filename: 'assets.json',
		})
	].filter(Boolean),
	
	watch: true,
	//devtool: devMode ? devtool : false
};
