const gulp = require("gulp");
const sass = require("gulp-dart-sass");
const autoprefixer = require("gulp-autoprefixer");
const webpackStream = require("webpack-stream");
const webpack = require("webpack");
const webpackConfig = require("./webpack.config.js");
const OUTDIR = "../theme";

const compileSass = () => {
  return gulp
    .src("./src/assets/scss/style.scss")
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(gulp.dest(`${OUTDIR}`));
};

const compileTs = () => {
  return webpackStream(webpackConfig, webpack).pipe(
    gulp.dest(`${OUTDIR}/assets/js`)
  );
};

const copyImage = () => {
  return gulp
    .src("./src/assets/images/**/*.{png,jpg,jpeg}")
    .pipe(gulp.dest(`${OUTDIR}/assets/images`));
};

const copyPhp = () => {
  return gulp.src("./src/**/*.php").pipe(gulp.dest(`${OUTDIR}`));
};

const copyTwig = () => {
  return gulp
    .src("./src/templates/**/*.twig")
    .pipe(gulp.dest(`${OUTDIR}/templates`));
};

const copyVendor = () => {
  return gulp.src("./vendor/**/*.*").pipe(gulp.dest(`${OUTDIR}/vendor`));
};

const watch = () => {
  gulp.watch("./src/assets/scss/**/*.scss", gulp.series("sass"));
  gulp.watch("./src/assets/ts/**/*.ts", gulp.series("ts"));
  gulp.watch("./src/assets/images/**/*.{png,jpg,jpeg}", gulp.series("image"));
  gulp.watch("./src/**/*.php", gulp.series("php"));
  gulp.watch("./src/templates/**/*.twig", gulp.series("twig"));
  gulp.watch("./vendor/**/*.*", gulp.series("vendor"));
};

exports.sass = compileSass;
exports.ts = compileTs;
exports.image = copyImage;
exports.php = copyPhp;
exports.twig = copyTwig;
exports.vendor = copyVendor;
exports.watch = watch;
exports.default = gulp.series(
  compileSass,
  compileTs,
  copyImage,
  copyPhp,
  copyTwig,
  copyVendor
);
