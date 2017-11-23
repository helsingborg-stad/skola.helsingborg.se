// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var sass            = require('gulp-sass');
var concat          = require('gulp-concat');
var uglify          = require('gulp-uglify');
var cssnano         = require('gulp-cssnano');
var rename          = require('gulp-rename');
var autoprefixer    = require('gulp-autoprefixer');
var browserSync     = require('browser-sync').create();
var sourcemaps      = require('gulp-sourcemaps');

// Compile Our Sass
gulp.task('sass-dist', function() {
    return gulp.src('assets/source/sass/app.scss')
            .pipe(sass())
            .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
            .pipe(rename({suffix: '.min'}))
            .pipe(cssnano({
                mergeLonghand: false,
                zindex: false
            }))
            .pipe(gulp.dest('assets/dist/css'))
            .pipe(browserSync.stream());
});

gulp.task('sass-dev', function() {
    return gulp.src('assets/source/sass/app.scss')
            .pipe(sass())
            .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
            .pipe(rename({suffix: '.dev'}))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest('assets/dist/css'))
            .pipe(browserSync.stream());
});

gulp.task('sass-admin-dist', function() {
    return gulp.src('assets/source/sass/admin.scss')
            .pipe(sass())
            .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
            .pipe(rename({suffix: '.min'}))
            .pipe(cssnano({
                mergeLonghand: false,
                zindex: false
            }))
            .pipe(gulp.dest('assets/dist/css'));
});

gulp.task('sass-admin-dev', function() {
    return gulp.src('assets/source/sass/admin.scss')
            .pipe(sass())
            .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
            .pipe(rename({suffix: '.dev'}))
            .pipe(gulp.dest('assets/dist/css'));
});

// Concatenate & Minify JS
gulp.task('scripts-dist', function() {
    return gulp.src('assets/source/js/*.js')
            .pipe(concat('app.js'))
            .pipe(gulp.dest('assets/dist/js'))
            .pipe(rename('app.min.js'))
            .pipe(uglify())
            .pipe(gulp.dest('assets/dist/js'));
});

//BrowserSync
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "https://ronnowskaskolan.helsingborg.dev/"
    });
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('assets/source/js/**/*.js', ['scripts-dist']);
    gulp.watch('assets/source/sass/**/*.scss', ['sass-dist', 'sass-dev', 'sass-admin-dist', 'sass-admin-dev']);
});

//Watch with BrowserSync
gulp.task('watch-live', ['browser-sync'], function () {
    gulp.watch('**/*.php', browserSync.reload);
    gulp.watch('assets/source/js/**/*.js', ['scripts-dist', browserSync.reload]);
    gulp.watch('assets/source/sass/**/*.scss', ['sass-dist', 'sass-dev', 'sass-admin-dist', 'sass-admin-dev']);
});

// Default Task
gulp.task('default', ['sass-dist', 'sass-dev', 'sass-admin-dist', 'sass-admin-dev', 'scripts-dist', 'watch']);

