var gulp = require('gulp');
var less = require('gulp-less');
var gutil = require('gulp-util');
var paths = {
	less: 'less/**/*.less',
};

// Build less for development and demo
gulp.task('build-less', function() {
	return gulp.src('less/custom.less')
	.pipe(less())
	.on('error', function(err) { gutil.log(err.message); })
	.pipe(gulp.dest('./less'));
});

// Rerun the task when a file changes
gulp.task('watch', function() {
	gulp.watch(paths.less, ['build-less']);
});

gulp.task('default', ['watch']);