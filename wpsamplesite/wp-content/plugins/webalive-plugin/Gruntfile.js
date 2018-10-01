'use strict';
module.exports = function( grunt ) {
    var pkg = grunt.file.readJSON( 'package.json' );
    grunt.initConfig({

        // Setting folder templates
        dirs: {
            adminDist: 'admin/assets/dist/',
            adminSource: 'admin/assets/source/',
            moduleSource: 'modules/',
            publicDist: 'public/assets/dist/',
            publicSource: 'public/assets/source/',
        },

        // Minify all css files
        cssmin: {
            options: {
                mergeIntoShorthands: false
            },
            target: {
                files: {
                    // Admin
                    '<%= dirs.adminDist %>/css/admin.min.css': '<%= dirs.adminSource %>/css/admin.css',
                    '<%= dirs.adminDist %>/css/sweetalert.min.css': '<%= dirs.adminSource %>/css/sweetalert.min.css',
                    
                    // Public
                    '<%= dirs.publicDist %>/css/public.min.css': '<%= dirs.publicSource %>/css/public.css',
                }
            }
        },

        // Babel: Converts ES6/ES7 into plain JS
        // babel: {
        //     options: {
        //         sourceMap: false,
        //         presets: [ 'env' ],
        //     },
        //     dist: {
        //         files: {
        //             '<%= dirs.adminDist %>/js/admin.js': '<%= dirs.adminSource %>/js/admin.js',
        //             '<%= dirs.publicDist %>/js/public.js': '<%= dirs.publicSource %>/js/public.js',
        //         }
        //     }
        // },

        // Minify all js files
        uglify: {
            options: {
                mangle: false,
            },
            my_target: {
                files: {
                    // Admin
                    '<%= dirs.adminDist %>/js/admin.min.js': [
                        '<%= dirs.adminSource %>/js/admin.js',
                        '<%= dirs.moduleSource %>/settings/assets/js/settings.js',
                        
                    ],
                    '<%= dirs.adminDist %>/js/sweetalert.min.js': [
                        '<%= dirs.adminSource %>/js/sweetalert.min.js',
                    ],
                    '<%= dirs.adminDist %>/js/vimeo_uploader.min.js': [
                        '<%= dirs.moduleSource %>/vimeo_uploader/assets/js/vimeo_uploader.js',
                    ],

                    // Public
                    '<%= dirs.publicDist %>/js/public.min.js': [
                        '<%= dirs.publicSource %>/js/public.js',
                    ],
                }
            }
        },

        // Watching all changes
        watcher: {
            css: {
                files: ['<%= dirs.adminSource %>/css/*.css', '<%= dirs.publicSource %>/css/*.css' ],
                tasks: ['cssmin'],
                livereload: {
                    options: {
                        livereload: true
                    }
                }
            },
            scripts: {
                files: [
                    '<%= dirs.adminSource %>/js/*.js', 
                    '<%= dirs.publicSource %>/js/*.js',
                    '<%= dirs.moduleSource %>/**/assets/js/**/*.js',
                ],
                tasks: ['uglify']
            }
        },

        // Generate POT files.
        makepot: {
            target: {
                options: {
                    domainPath: '/languages/', // Where to save the POT file.
                    potFilename: 'webalive_tutspress.pot', // Name of the POT file.
                    type: 'wp-theme', // Type of project (wp-plugin or wp-theme).
                    potHeaders: {
                        'report-msgid-bugs-to': 'http://webalive.com/',
                        'language-team': 'LANGUAGE <EMAIL@ADDRESS>'
                    }
                }
            }
        },

        // Clean up build directory
        clean: {
            main: ['build/']
        },

        // Copy the plugin into the build directory
        copy: {
            main: {
                src: [
                    '**',
                    '!node_modules/**',
                    '!build/**',
                    '!testing/**',
                    '!bin/**',
                    '!.git/**',
                    '!Gruntfile.js',
                    '!package.json',
                    '!debug.log',
                    '!phpunit.xml',
                    '!.gitignore',
                    '!.gitmodules',
                    '!npm-debug.log',
                    '!assets/less/**',
                    '!tests/**',
                    '!**/Gruntfile.js',
                    '!**/package.json',
                    '!**/README.md',
                    '!**/export.sh',
                    '!**/*~'
                ],
                dest: 'build/'
            }
        },

        //Compress build directory into <name>.zip and <name>-<version>.zip
        compress: {
            main: {
                options: {
                    mode: 'zip',
                    archive: './build/webalive_tutspress-v'+ pkg.version + '.zip'
                },
                expand: true,
                cwd: 'build/',
                src: ['**/*'],
                dest: 'webalive_tutspress'
            }
        },
    });

    // Load NPM tasks to be used here
    grunt.loadNpmTasks( 'grunt-wp-i18n' );
    grunt.loadNpmTasks( 'grunt-contrib-clean' );
    grunt.loadNpmTasks( 'grunt-contrib-copy' );
    grunt.loadNpmTasks( 'grunt-contrib-compress' );
    grunt.loadNpmTasks( 'grunt-sass' );
    grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
    grunt.loadNpmTasks( 'grunt-babel' );
    grunt.loadNpmTasks( 'grunt-contrib-uglify' );
    grunt.loadNpmTasks('grunt-watcher');

    grunt.registerTask( 'default', [
        'cssmin', 'uglify', 'watcher'
    ]);

    grunt.registerTask( 'minifycss', [
        'cssmin'
    ]);

    grunt.registerTask( 'minifyjs', [
        'uglify'
    ]);

    grunt.registerTask('release', [
        'makepot',
    ]);

    grunt.registerTask( 'zip', [
        'clean',
        'uglify',
        'cssmin',
        'copy',
        'compress'
    ])
};