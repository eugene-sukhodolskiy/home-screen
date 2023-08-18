const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const sourcemaps = require("gulp-sourcemaps");
const watch = require("gulp-watch");
const cleanCSS = require("gulp-clean-css");
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");

gulp.task("sass-build", () => {
	return gulp.src("./scss/index.scss")
		.pipe(sourcemaps.init())
		.pipe(sass().on("error", sass.logError))
		.pipe(concat("dist.min.css"))
		.pipe(cleanCSS())
		.pipe(sourcemaps.write("./"))
		.pipe(gulp.dest("./"));
});

gulp.task("js-build", () => {
	return gulp.src("./js/*.js")
		.pipe(sourcemaps.init())
		.pipe(concat("dist.min.js"))
		.pipe(uglify())
		.pipe(sourcemaps.write("./"))
		.pipe(gulp.dest("./"));
});

gulp.task("watch", () => {
	gulp.watch("./scss/**/*.scss", gulp.series("sass-build"));
	gulp.watch("./js/*.js", gulp.series("js-build"));
});