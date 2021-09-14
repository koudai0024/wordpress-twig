const path = require("path");
const webpack = require("webpack");

module.exports = {
  mode: "production",
  entry: "./src/assets/ts/main.ts",
  module: {
    rules: [
      {
        test: /\.ts$/,
        use: "ts-loader",
      },
    ],
  },
  resolve: {
    extensions: [".ts", ".js"],
  },
  output: {
    path: path.join(__dirname, "theme/assets/js"),
    filename: "main.js",
  },
};
