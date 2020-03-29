const isDevelopment = process.env.NODE_ENV === 'development'
const path = require('path');
const WebpackShellPlugin = require('webpack-shell-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = [
    {
        mode: process.env.NODE_ENV,
        entry: './src/Resources/js/admin.js',
        output: {
            filename: 'admin.js',
            path: path.resolve(__dirname, 'build')
        },
        plugins: [
            new WebpackShellPlugin({
                safe: true,
                onBuildStart: [
                    'echo "clearing old css"; rm -f ./build/admin.css', //remove css file
                    'echo "clearing old js"; rm -f ./build/admin.js', //remove css file
                ]
            }),
            new MiniCssExtractPlugin({
                filename: 'admin.css',
                chunkFilename: '[id].css'
            })
        ],
        module: {
            rules: [
                {
                    test: /\.(sa|sc|c)ss$/,
                    use: [
                      MiniCssExtractPlugin.loader,
                        'css-loader',
                        'postcss-loader',
                        'sass-loader',
                    ],
                },
                {
                    test: /\.(woff|woff2|eot|ttf)$/,
                    use: [
                        {
                            loader: 'file-loader',
                            options: {
                                outputPath: 'fonts/'
                            }
                        }
                    ]
                },
                {
                    test: /\.(jpe?g|png|svg)$/,
                    use: 'base64-inline-loader'
                }
            ]
        },
        resolve: {
            extensions: ['.js', '.scss']
        }
    },
    {
        mode: process.env.NODE_ENV,
        entry: './src/Resources/js/public.js',
        output: {
            filename: 'public.js',
            path: path.resolve(__dirname, 'build')
        },
        plugins: [
            new WebpackShellPlugin({
                safe: true,
                onBuildStart: [
                    'echo "clearing old css"; rm -f ./build/public.css', //remove css file
                    'echo "clearing old js"; rm -f ./build/public.js', //remove css file
                ]
            }),
            new MiniCssExtractPlugin({
                filename: 'public.css',
                chunkFilename: '[id].css'
            })
        ],
        module: {
            rules: [
                {
                    test: /\.(sa|sc|c)ss$/,
                    use: [
                      MiniCssExtractPlugin.loader,
                        'css-loader',
                        'postcss-loader',
                        'sass-loader',
                    ],
                },
                {
                    test: /\.(woff|woff2|eot|ttf)$/,
                    use: [
                        {
                            loader: 'file-loader',
                            options: {
                                outputPath: 'fonts/'
                            }
                        }
                    ]
                },
                {
                    test: /\.(jpe?g|png|svg)$/,
                    use: 'base64-inline-loader'
                }
            ]
        },
        resolve: {
            extensions: ['.js', '.scss']
        }
    }
];
