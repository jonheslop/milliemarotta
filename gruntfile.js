module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            options: {
                sourceMap: true
            },
            dist: {
                files: {
                    'css/style.css' : 'css/sass/style.scss'
                }
            }
        },
        watch: {
            sass: {
                files: 'css/sass/*.scss',
                tasks: ['sass','cssmin']
            },
            js: {
                files: 'js/site.js',
                tasks: ['uglify']
            },
            all: {
                files: [
                    '{,**/}*.{png,jpg,gif,php,xml,html}'
                ]
            },
            options: {
                livereload: true
            }
        },
        cssmin: {
            minify: {
                expand: true,
                src: ['css/*.css', '!*.min.css'],
                ext: '.css'
            }
        },
        uglify: {
            options: {
                mangle: false
            },
            my_target: {
                files: {
                    'js/site.min.js': ['js/site.js']
                }
            }
        },
    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default',['watch']);

};