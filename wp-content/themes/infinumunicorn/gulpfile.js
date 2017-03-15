// Defining requirements
const gulp = require('gulp');
const plumber = require('gulp-plumber');
const sass = require('gulp-sass');
const watch = require('gulp-watch');
const cssnano = require('gulp-cssnano');
const rename = require('gulp-rename');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const merge2 = require('merge2');
const ignore = require('gulp-ignore');
const rimraf = require('gulp-rimraf');
const clone = require('gulp-clone');
const merge = require('gulp-merge');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();
const reload = browserSync.reload;
const concatCss = require('gulp-concat-css');
const autoprefixer = require('gulp-autoprefixer');
const cssScss = require('gulp-css-scss');
 

// Defining base pathes
var basePaths = {
	bower: './bower_components/',
	node: './node_modules/',
	dev: './src/',
	js: './js/',
	css: './css/',
	sass: './sass'
};

// browser-sync watched files
// automatically reloads the page when files changed
var browserSyncWatchFiles = [
	'style.css',
	'./js/*.js',
	'.**/*.php'
];
// browser-sync options
// see: https://www.browsersync.io/docs/options/
var browserSyncOptions = {
	proxy: "localhost/infinum/",
	notify: false
};

// Run:
// gulp css-scss
// Compiles CSS files in SCSS
gulp.task('css-scss', () => {
  return gulp.src('./css/bootstrap.css')
    .pipe(cssScss())
    .pipe(gulp.dest('scss'));
});


// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task('scss', function () {
	gulp.src('./scss/style.css')
		.pipe(sourcemaps.init())
		.pipe(plumber())
		.pipe(sass())
		.pipe(autoprefixer({
			browsers: ['last 2 versions', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'],
			cascade: false
		}))
		.pipe(sourcemaps.write(''))
		.pipe(gulp.dest('./css'));
});

// Static Server + watching scss/html files
gulp.task('serve', ['scss'], function() {

    browserSync.init({
		proxy: "localhost/infinum/",
		notify: false
    });

    gulp.watch("./scss/*.scss", ['scss']).on('change', browserSync.reload);
    gulp.watch("./*.php").on('change', browserSync.reload);
});

gulp.task('default', ['scss', 'serve']);