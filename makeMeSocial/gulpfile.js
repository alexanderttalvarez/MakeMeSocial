var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var concatCss = require('gulp-concat-css');
var uglifyCss = require('gulp-uglifycss');
var uglify = require('gulp-uglify');

gulp.task('sass', function() {

    gulp.src(['resources/partials/scss/app.scss','resources/components/backoffice/**/*.scss'])
        .pipe(concat('backoffice.css'))
        .pipe(sass())
        .pipe(uglifyCss())
        .pipe(gulp.dest('assets/css/'));

    return gulp.src(['resources/partials/scss/app.scss','resources/components/frontend/**/*.scss'])
        .pipe(concat('frontend.css'))
        .pipe(sass())
        .pipe(uglifyCss())
        .pipe(gulp.dest('assets/css/'));

});

gulp.task('js', function() {

    gulp.src('resources/components/backoffice/**/*.js')
        .pipe(concat('backoffice.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js/'));

    return gulp.src('resources/components/frontend/**/*.js')
        .pipe(concat('frontend.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js/'));

});

gulp.task('watch', ['sass', 'js'], function() {
    gulp.watch('resources/**/*.scss', ['sass']);
    gulp.watch('resources/**/*.js', ['js']);
});
