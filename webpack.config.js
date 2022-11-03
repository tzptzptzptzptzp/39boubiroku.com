const path = require("path");
const CopyWebpackPlugin   = require('copy-webpack-plugin');

module.exports = {
    devtool: "hidden-source-map",
    entry: {
        index: "./src/js/index.ts",
        singular: "./src/js/singular.ts",
        archive: "./src/js/archive.ts",
        search: "./src/js/search.ts",
        404: "./src/js/404.ts",
        themeMode: "./src/js/module/modeInit.ts",
    },
    output: {
        path: path.resolve(__dirname, "dist/assets/js"),
        filename: "[name].js",
    },
    module: {
        rules: [
            {
                test: /\.ts$/,
                use: 'ts-loader',
            },
        ],
    },
    resolve: {
        extensions: [
            '.ts', '.js',
        ],
    },
    plugins: [
        new CopyWebpackPlugin({
            patterns: [
                {
                    from: `${__dirname}/src/css/index.min.css`,
                    to: `${__dirname}/dist/assets/css/main.css`,
                },
            ]
        }),
    ],
    devServer: {
        contentBase: path.resolve(__dirname, "dist/assets/js"),
    },
    cache: true,
};
