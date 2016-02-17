const gulp = require('gulp');
const sass = require('gulp-sass');
const nano = require('gulp-cssnano');
const eslint = require('gulp-eslint');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');

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
    .pipe(gulp.dest('./css'));
});

// Define list of scripts to run trhough scripts task
// const scripts = [
//   './src/js/gallery.js',
//   './src/js/faces.js',
//   './src/js/show.js',
//   './src/js/tabs.js'
// ];

// // ESLint
// gulp.task('eslint', function() {
//   return gulp.src(scripts)
//     .pipe(eslint())
//     .pipe(eslint.format())
//     .pipe(eslint.failAfterError());
// });

// // Minify js files
// gulp.task('scripts', ['eslint'], function() {
//   return gulp.src(scripts)
//     .pipe(concat('app.min.js'))
//     .pipe(uglify())
//     .on('error', function(err) {
//       console.log(err.message);
//     })
//     .pipe(gulp.dest('./dist/js'));
// });

// Watch assets for changes and lunch relevant task
gulp.task('watch', function() {
  gulp.watch('css/sass/**/*.scss', ['styles']);
  // gulp.watch('src/js/**/*.js', ['scripts']);
});

// default task
gulp.task('default', ['watch']);