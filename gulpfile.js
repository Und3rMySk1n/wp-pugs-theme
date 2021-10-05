'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));
var cssnano = require('gulp-cssnano');
var uglify = require('gulp-uglify');

var paths = {
    styles: {
        src: 'src/scss/**/*.scss',
        main: 'src/scss/style.scss',
        dest: './'
    },
    js: {
        src: 'src/js/app.js',
        dest: 'assets/js/',
    },
};

function styles() {
    return gulp.src(paths.styles.main)
        .pipe(sass().on('error', sass.logError))
        .pipe(cssnano())
        .pipe(gulp.dest(paths.styles.dest));
}

function js() {
    return gulp.src(paths.js.src)
        .pipe(uglify())
        .pipe(gulp.dest(paths.js.dest));
}

function watch() {
    gulp.watch(paths.styles.src, styles);
    gulp.watch(paths.js.src, js);
}

const build = gulp.series(styles, js, watch);
exports.default = build;