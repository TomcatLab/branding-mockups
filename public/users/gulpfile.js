var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var inject = require('gulp-inject');
var injectPartials = require('gulp-inject-partials');
var replace = require('gulp-replace');
var del = require('del');
var concat = require('gulp-concat');
var merge = require('merge-stream');
var rename = require("gulp-rename");
let cleanCSS = require('gulp-clean-css');



gulp.task('sass', () => {
    var compile =  gulp.src('assets/scss/**/style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest('./assets/css'))
        .pipe(browserSync.stream());
    var minify =  gulp.src('assets/css/**/style.css')
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(rename({ extname: '.min.css' }))
        .pipe(gulp.dest('./assets/css'))
        .pipe(browserSync.stream());
    return merge(compile, minify);
});

gulp.task('serve', gulp.series( 'sass', () => {

    browserSync.init({
        port: 3000,
        server: 'http://127.0.0.1:8000/home',
        notify: false,
        ghostMode: true
    });

    gulp.watch('assets/scss/**/*.scss', gulp.series('sass'));
    //gulp.watch('**/*.html').on('change', browserSync.reload);
    gulp.watch('assets/js/**/*.js').on('change', browserSync.reload);
}));

gulp.task('cleanVendors', () => {
    return del([
        './assets/vendors/**/*'
    ]);
});

gulp.task('buildCoreCss', () => {
    return gulp.src([
        './node_modules/perfect-scrollbar/css/perfect-scrollbar.css',
        './node_modules/owl.carousel/dist/assets/owl.carousel.min.css'
    ])
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(concat('core.css'))
        .pipe(gulp.dest('./assets/vendors/core'));
});

gulp.task('buildCoreJs', () => {
    return gulp.src([
        './node_modules/jquery/dist/jquery.min.js', 
        './node_modules/popper.js/dist/umd/popper.min.js', 
        './node_modules/bootstrap/dist/js/bootstrap.min.js', 
        './node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js',
        './node_modules/owl.carousel/dist/owl.carousel.min.js',
        './node_modules/feather-icons/dist/feather.min.js'
    ])
    .pipe(concat('core.js'))
    .pipe(gulp.dest('./assets/vendors/core'));
});

gulp.task('copyAddonCss', () => {
    var style1 = gulp.src(['./node_modules/font-awesome/css/font-awesome.min.css']).pipe(gulp.dest('./assets/vendors/font-awesome/css'));
    var style2 = gulp.src(['./node_modules/font-awesome/fonts/*']).pipe(gulp.dest('./assets/vendors/font-awesome/fonts'));

    return merge(style1, style2);
});

gulp.task('copyAddonJs', () => {
    var script1 = gulp.src('./node_modules/feather-icons/dist/*').pipe(gulp.dest('./assets/vendors/feather-icons'));
    return merge(script1);
});


gulp.task('copyVendors', gulp.series('cleanVendors', 'buildCoreCss', 'buildCoreJs', 'copyAddonCss', 'copyAddonJs'));

gulp.task('default', gulp.series('serve'));