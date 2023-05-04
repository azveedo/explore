const path = require("path");
const HtmlWebpackHtmlPlugin = require("html-webpack-plugin");
const webpack = require("webpack");
const autoprefixer = require("autoprefixer");

module.exports = {
  entry: path.resolve(__dirname, "index.js"),
  mode: process.env.NODE_ENV,
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, "build"),
  },
  devServer: {
    static: path.resolve(__dirname, "build"),
  },
  optimization: {
    runtimeChunk: "single",
  },
  module: {
    rules: [
      {
        test: /\.html$/i,
        use: ["html-loader"],
      },
      {
        test: /\.css$/i,
        use: ["style-loader", "css-loader"],
      },
      {
        test: /\.(png|svg|jpg|jpeg|gif)$/i, // regular expression
        type: "asset/resource",
      },
      {
        test: /\.s[ac]ss$/i,
        use: ["style-loader", "css-loader", "sass-loader", "postcss-loader"],
      },
    ],
  },
  plugins: [
    new HtmlWebpackHtmlPlugin({
      template: "template.html",
      // meta: {
      //   viewport: "width=device-width, initial-scale=1",
      // },
    }),

    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      "window.jQuery": "jquery",
    }),
  ],
};
