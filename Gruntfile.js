module.exports = function(grunt) {
    const sass = require('node-sass');

    grunt.initConfig({
        sass: {        
            options: {
                implementation: sass,
                sourceMap: false
            },
            dist: {
                src: "sass/main.scss",
                dest: "css/main.css"
            }
        },
        watch: {
            css: {
                files: ["sass/*.scss"],
                tasks: ["sass"],
                options: {
                    livereload: true,
                    debounceDelay: 2000
                }
            }
        }
    });
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['sass', 'watch']);
};