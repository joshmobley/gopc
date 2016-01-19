module.exports = function (grunt) {

    'use strict';

    require('time-grunt')(grunt);
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        jshint: {
            grunt: {
                options: {node: true},
                globals: {module: true},
                src: 'Gruntfile.js'
            },
            dist: {
                src: 'js/main.js'
            }
        },

        sass: {
            dist: {
                files: {
                    'css/styles.css': 'css/sass/styles.scss'
                }
            }
        },

        uglify: {
            dist: {
                options: {
                    sourceMap: true,
                    sourceMapName: 'js/main.min.js.map'
                },
                files: {
                    'js/main.min.js': ['js/main.js']
                }
            }
        },

        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 9'],
            },
            dist: {
                src: 'css/styles.css'
            }
        },

        cssmin: {
            options: {
                sourceMap: true,
                report: 'min'
            },
            dist: {
                files: {
                    'css/styles.min.css': ['css/styles.css']
                }
            }
        },

        watch: {
            sass: {
                files: [
                    'css/sass/*.*',
                    'css/lib/*.*'
                ],
                tasks: ['sass','autoprefixer','cssmin'],
                interrupt: true
            },
            js: {
                files: [
                    'js/main.js'
                ],
                tasks: ['jshint:dist','uglify:dist'],
                interrupt: true
            }
        }

    });

    grunt.registerTask('default', ['jshint', 'sass', 'autoprefixer', 'cssmin', 'uglify:dist' ,'watch']);

};
