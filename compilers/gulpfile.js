'use strict';
 
import gulp from 'gulp'; 
import autoprefixer from 'gulp-autoprefixer';
import sass from 'gulp-dart-sass';
import rename from 'gulp-rename';
import uglifycss from 'gulp-uglifycss';

gulp.task('sass', () => {
	return gulp.src('../assets/src/scss/**/*.scss')
		.pipe(sass.sync({
			outputStyle: 'compressed',
			includePaths: ['./node_modules'],
		}).on( 'error', sass.logError ))
		.pipe(autoprefixer({
			cascade: false
		}))
		.pipe(uglifycss({
			'maxLineLen' : 80,
			'uglyComments' : true
		}))
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest('../assets/dist/css'));
});

gulp.task('sass:watch', () => {
	gulp.watch('../assets/src/scss/**/*.scss', gulp.series('sass'));
});
