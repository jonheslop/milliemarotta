var gulp = require('gulp'),
    sass = require('gulp-sass'),
    nano = require('gulp-cssnano'),
    eslint = require('gulp-eslint'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    livereload = require('gulp-livereload');

// Compile sass, minify css, autoprefix
gulp.task('styles', function() {
  return gulp.src('./css/sass/**/*.scss')
    .pipe(sass({
      includePaths: require('node-bourbon').includePaths
    }))
    .on('error', function(err) {
      console.log(err.message);
    })
    .pipe(nano())
    .pipe(gulp.dest('./css'))
    .pipe(livereload());
});

// // ESLint
gulp.task('eslint', function() {
  return gulp.src('./js/parts/**/*.js')
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());
});

// // Minify js files
gulp.task('scripts', ['eslint'], function() {
  return gulp.src('./js/parts/**/*.js')
    .pipe(concat('site.min.js'))
    .pipe(uglify())
    .on('error', function(err) {
      console.log(err.message);
    })
    .pipe(gulp.dest('./js'));
});

// Watch assets for changes and lunch relevant task
gulp.task('watch', function() {
  livereload.listen();
  gulp.watch('css/sass/**/*.scss', ['styles']);
  gulp.watch('js/**/*.js', ['scripts']);

  // Watch HTML and livereload
  gulp.watch('*.{html,php}')
  .on('change', function(file) {
    gulp.src(file.path)
    .pipe(livereload());
  });
});

// default task
gulp.task('default', ['watch']);