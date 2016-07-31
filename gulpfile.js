
var gulp    = require('gulp'),
    sass    = require('gulp-sass'),
    minify  = require('gulp-minify-css'),
    concat  = require('gulp-concat'),
    uglify  = require('gulp-uglify'),
    rename  = require('gulp-rename'),
    inject  = require('gulp-inject');
    
var date        = new Date(),
    file_time   = date.getTime();

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var path = 
{
    'resources': 
    {
        'sass'  : './resources/assets/sass',
        'js'    : './resources/assets/js'
    },
    'public': 
    {
        'css'   : './public/assets/css',
        'js'    : './public/assets/js'
    },
    'inject':
    {
        'source':
        {
            'css'   : './public/assets/css/**/*.css',
            'js'    : './public/assets/js/**/*.js'
        },
        'target'    : './resources/layouts/master.blade.php'
    },
    'sass'      : './resources/assets/sass/**/*.scss',
    'js'        : './resources/assets/js/**/*.js'
};

gulp.task('sass', function() {
    return gulp.src(path.resources.sass + '/app.scss')
        .pipe(sass({
            onError: console.error.bind(console, 'SASS ERROR')
        }))
        .pipe(minify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.public.css));
});

gulp.task('js', function() {
    return gulp.src(path.resources.js + '/app.js')
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.public.js));
});

gulp.task('inject', function(){
    var source = gulp.src([path.inject.source.css, path.inject.source.js]);
    var target = gulp.src(path.inject.target);
    
    return target.pipe(inject(source));
});

gulp.task('test', function(){
    console.log(file_time);
});

gulp.task('watch', function() {
    gulp.watch(path.sass, ['sass']);
    gulp.watch(path.js, ['js']);
});

gulp.task('default', ['watch']);
