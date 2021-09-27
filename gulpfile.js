'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));
var cssnano = require('gulp-cssnano');

var paths = {
    styles: {
        src: 'assets/scss/**/*.scss',
        main: 'assets/scss/style.scss',
        dest: './'
    }
};

function styles() {
    return gulp.src(paths.styles.main)
        .pipe(sass().on('error', sass.logError))
        .pipe(cssnano())
        .pipe(gulp.dest(paths.styles.dest));
}

function watch() {
    gulp.watch(paths.styles.src, styles);
}

const build = gulp.series(styles, watch);
exports.default = build;