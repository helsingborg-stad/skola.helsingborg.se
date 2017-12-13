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
var rev             = require('gulp-rev');
var revDel          = require('rev-del');
var revReplaceCSS   = require('gulp-rev-css-url');

/* ==========================================================================
   Dev assets tasks
   ========================================================================== */
gulp.task('sass-dev', function() {
    return gulp.src('assets/source/sass/app.scss')
            .pipe(sourcemaps.init())
              .pipe(sass())
              .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest('assets/dist/css'))
            .pipe(browserSync.stream());
});

gulp.task('sass-admin-dev', function() {
    return gulp.src('assets/source/sass/admin.scss')
            .pipe(sourcemaps.init())
              .pipe(sass())
              .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest('assets/dist/css'));
});

gulp.task('scripts-dev', function() {
    return gulp.src('assets/source/js/*.js')
        .pipe(sourcemaps.init())
          .pipe(concat('app.js'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('assets/dist/js'))
});

/* ==========================================================================
   Dist assets tasks
   ========================================================================== */

gulp.task('sass-dist', function() {
    return gulp.src('assets/source/sass/app.scss')
            .pipe(sass())
            .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
            .pipe(rename({suffix: '.min'}))
            .pipe(cssnano({
                mergeLonghand: false,
                zindex: false
            }))
            .pipe(gulp.dest('assets/tmp/css'))
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
            .pipe(gulp.dest('assets/tmp/css'));
});

gulp.task('scripts-dist', function() {
    return gulp.src('assets/source/js/*.js')
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/tmp/js'))
});

/* ==========================================================================
   Build assets tasks
   ========================================================================== */
  gulp.task('build:sass', ['sass-dev', 'sass-admin-dev', 'sass-dist', 'sass-admin-dist']);
  gulp.task('build:js', ['scripts-dev', 'scripts-dist']);

/* ==========================================================================
   Rev Tasks
   ========================================================================== */

var revTask = function() {
    return gulp.src(["./assets/tmp/**/*"])
      .pipe(rev())
      .pipe(revReplaceCSS())
      .pipe(gulp.dest('assets/dist'))
      .pipe(rev.manifest())
      .pipe(revDel({dest: 'assets/dist'}))
      .pipe(gulp.dest('assets/dist'));
}

gulp.task("rev:sass", ['build:sass'], function(){
  return revTask()
})

gulp.task("rev:js", ['build:js'], function() {
  return revTask()
})

gulp.task("rev:build", ['build:sass', 'build:js'], function(){
  return revTask();
})

/* ==========================================================================
   Others
   ========================================================================== */

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "https://ronnowskaskolan.helsingborg.dev/"
    });
});

// Watch Files For Changes - do not use this, use default task instead!
gulp.task('watch', function() {
    gulp.watch('assets/source/js/**/*.js', ['rev:js']);
    gulp.watch('assets/source/sass/**/*.scss', ['rev:sass']);
});

//Watch with BrowserSync
gulp.task('watch-live', ['browser-sync'], function () {
    gulp.watch('**/*.php', browserSync.reload);
    gulp.watch('assets/source/js/**/*.js', ['rev:js', browserSync.reload]);
    gulp.watch('assets/source/sass/**/*.scss', ['rev:sass']);
});

// Default Task
gulp.task('default', ['rev:build', 'watch']);
