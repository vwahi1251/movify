const sass = require('node-sass');

module.exports = function(grunt) {
  grunt.initConfig({
    sass: {
      options: {
       implementation: sass,
        sourceMap: true
      },
      dist: {
        files: {
          './index.css': 'build.scss'
        }

      }
    },
    watch: {
      scripts: {
        files: ["./js/**/*.js", "./sass/**/*.scss"],
        tasks: ["browserify", "concat", "sass"]
      }
    },
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.registerTask('default', [ 'sass']);
};
