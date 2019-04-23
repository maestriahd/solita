var gulp = require('gulp');
var sass = require('gulp-sass');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var babel = require('gulp-babel');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var browserify = require('browserify');
var bro = require('gulp-bro');
var babelify = require('babelify');

var source      = require('vinyl-source-stream');
var buffer      = require('vinyl-buffer');

gulp.task('js', function(){
  // set up the browserify instance on a task basis

  return gulp.src([
    './node_modules/jquery/dist/jquery.js',
    './node_modules/popper.js/dist/popper.js',
    './node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    './javascripts/src/*.js'
  ])

  .pipe(bro({
      debug: true,
      transform: [
        babelify.configure({ presets: ['@babel/preset-env'] }),
        [ 'uglifyify', {
          sourceMap: false,
          global: true
         }]
      ]
    }
  ))
  //.pipe(babel({presets: ['@babel/preset-env']}))
  //.on('error', function (err) { console.log( err ) })
  //.pipe(babel())
  //.pipe(sourcemaps.init())
  //.pipe(uglify())
  //.on('error', function (err) { console.log( err ) })
  //.pipe(rename('minimalist.js'))
  //.pipe(sourcemaps.write())
  //.pipe(concat('minimalist.js'))
  .pipe(gulp.dest('javascripts'));
});


gulp.task('build', function () {
    // app.js is your main JS file with all your module inclusions
    return browserify({entries: './javascripts/src/app.js', debug: true})
        .transform("babelify", { presets: ["@babel/preset-env"] })
        .bundle()
        .pipe(source('minimalist.js'))
        .pipe(buffer())
        .pipe(sourcemaps.init())
        .pipe(uglify())
        //.pipe(sourcemaps.write('/maps'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./javascripts'))
        //.pipe(livereload());
});

gulp.task('css', function() {

    return gulp.src('./css/sass/*.scss')
        .pipe(sass({
            outputStyle: 'nested',
            includePaths: ['./node_modules/bootstrap/scss']
        }).on('error', sass.logError))
        .pipe(postcss([
            autoprefixer({browsers: ['> 5%', '> 5% in US', 'last 2 versions']})
        ]))
        .pipe(gulp.dest('./css'));
});

gulp.task('watch', function() {
    gulp.watch('./css/sass/*.scss', gulp.series('css'));
    //gulp.watch('./javascripts/src/*.js', gulp.series('js'));
});
