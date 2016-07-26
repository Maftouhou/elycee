var gulp = require('gulp');
var concat = require('gulp-concat');
var minify = require('gulp-minify');
var minifycss = require('gulp-minify-css');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var inject = require('gulp-inject');
var injecthtml  = require('gulp-inject-html');
var image = require('gulp-image')


gulp.task('default', []);

gulp.task('scripts', function() {
  return gulp.src('app/scripts/**/*.js')
    .pipe(concat('app.js'))
    .pipe(gulp.dest('./dist/js/'))
    .pipe(uglify())
    .pipe(rename('app.min.js'))
    .pipe(gulp.dest('./dist/js/'));


});


gulp.task('styles', function () {
    return gulp.src('app/styles/layout.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(rename('app.css'))
    .pipe(gulp.dest('./dist/css/'))
    .pipe(minifycss())
    .pipe(rename('app.min.css'))
    .pipe(gulp.dest('./dist/css/'));
    



});

gulp.task('html', function(){
  var sources = gulp.src(
    ['./js/*.min.js', './css/*.min.css'], {read: false, cwd: './dist'}
        
  );

  return gulp.src('./ressources/views/app/index.blade.php')
    .pipe(inject(sources))
    .pipe(gulp.dest('./dist/'));



});

gulp.task('images', function(){
  return gulp.src('./app/images/*.{png,jpg,gif,svg}')
  .pipe(image())
  .pipe(gulp.dest('./dist/images/'));

})

gulp.task('build', ['scripts', 'styles', 'html']);



gulp.task('serve', ['styles', 'html', 'scripts'], function() {
  
  gulp.watch('app/styles/**/*.scss', ['styles']);
  gulp.watch('app/scripts/**/*.js', ['scripts']);

  gulp.watch(['*.html', 'dist/*.css', 'dist/*.js']);
});


