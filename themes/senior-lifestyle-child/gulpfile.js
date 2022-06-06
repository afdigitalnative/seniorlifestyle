const { series, parallel, dest, src, watch } = require('gulp');
const del = require('del');

const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('autoprefixer');
const csssorter = require('css-declaration-sorter');
const nano = require('cssnano');

const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const babel = require('gulp-babel');
const include = require('gulp-include');

const dist = "assets/dist/";
const source = "assets/src/";

const cssSettings = {
  in: source + "scss/**/*.scss",
  ignore: "!" + source + "scss/vendor/**/*.scss",
  out: "./assets/dist/css/",
  sassOpts: {
    outputStyle: "expanded",
    errLogToConsole: true
  },
  processors: [
    autoprefixer({browsers: ['last 3 versions', 'IE 10']}),
    csssorter({order: 'alphabetical'}),
    nano({discardComments: false}) // this will keep block comments
  ],
  watch: source + "scss/**/*"
}

function clean(cb) {
  del([dist + "/js/*", dist + "/css/*", "./style.css"]);
  cb();
}

function css(cb) {
  src([
    'assets/src/scss/**/*.scss',
    '!assets/src/scss/vendor/**/*.scss',
    '!assets/src/scss/style.scss'
  ])
    .pipe(sourcemaps.init())
    .pipe(sass(cssSettings.sassOpts))
    .pipe(postcss(cssSettings.processors))
    .pipe(sourcemaps.write('.'))
    .pipe(dest(cssSettings.out));
  console.log('=> => The CSS function executed');
  cb();
}

function styleCss(cb) {
  src([
    'assets/src/scss/style.scss'
  ])
    .pipe(sourcemaps.init())
    .pipe(sass(cssSettings.sassOpts))
    .pipe(postcss(cssSettings.processors))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('./'))
  console.log('=> => The Style CSS function executed');
  cb();
}

function javascript(cb) {
  src(['assets/src/js/main-community.js', 'assets/src/js/main-lifestyle.js', 'assets/src/js/main.js'])
    .pipe(include({
      hardFail: true,
      separateInputs: true,
      includePaths: [
        __dirname + '/node_modules',
        __dirname + '/assets/src/js'
      ]
    }))
    .pipe(babel({
      presets: ['@babel/env']
    }))
    .pipe(uglify())
    .pipe(dest('assets/dist/js/'));
    
//  src('assets/src/js/testimonials.js')
//    .pipe(include({
//      hardFail: true,
//      separateInputs: true,
//      includePaths: [
//        __dirname + '/assets/src/js/testimonials'
//      ]
//    }))
//    .pipe(babel({
//      presets: ['@babel/env']
//    }))
//    .pipe(uglify())
//    .pipe(dest('assets/dist/js/'));
  cb();

}

function watchSource(cb) {
  watch([cssSettings.watch, cssSettings.ignore, source + 'scss/style.scss', source + 'js/*.js'], series(exports.default));
  cb();
}

exports.default = series(clean, parallel(css, styleCss, javascript));
//exports.default = series(clean, parallel(css, styleCss));
//exports.default = series(parallel(css, styleCss, javascript));
//exports.default = series(parallel(javascript));
exports.watch = series(exports.default, watchSource);