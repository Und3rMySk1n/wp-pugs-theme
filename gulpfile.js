'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));
var cssnano = require('gulp-cssnano');
var uglify = require('gulp-uglify');
var merge = require('merge-stream');
var concat = require('gulp-concat');

var paths = {
    theme: {
        info: 'src/theme-info.css',
    },
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
    var description = gulp.src(paths.theme.info);
    var compressed = gulp.src(paths.styles.main)
        .pipe(sass().on('error', sass.logError))
        .pipe(cssnano());

    return merge(description, compressed)
        .pipe(concat('style.css'))
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