module.exports = function( grunt ) {
  'use strict';

  // Load all grunt tasks
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  // Project configuration
  grunt.initConfig( {
    pkg: grunt.file.readJSON( 'package.json' ),

    concat: {
      options: {
        stripBanners: true,
        banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
          ' * <%= pkg.homepage %>\n' +
          ' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
          ' * Licensed GPLv2+' +
          ' */\n'
      },
      _16_beaver_custom_theme: {
        src: [
          'assets/js/src/_16_beaver_custom_theme.js'
        ],
        dest: 'assets/js/_16_beaver_custom_theme.js'
      }
    },
    jshint: {
      browser: {
        all: [
          'assets/js/src/**/*.js',
          'assets/js/test/**/*.js'
        ],
        options: {
          jshintrc: '.jshintrc'
        }
      },
      grunt: {
        all: [
          'Gruntfile.js'
        ],
        options: {
          jshintrc: '.gruntjshintrc'
        }
      }
    },
    uglify: {
      all: {
        files: {
          'assets/js/script.min.js': ['assets/js/vendor/**/*.js', 'assets/js/src/**/*.js']
        },
        options: {
          banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
            ' * <%= pkg.homepage %>\n' +
            ' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
            ' * Licensed GPLv2+' +
            ' */\n',
          mangle: {
            except: ['jQuery']
          }
        }
      }
    },
    test: {
      files: ['assets/js/test/**/*.js']
    },

    sass: {
      all: {
        files: {
          'assets/css/main.css': 'assets/css/sass/main.scss'
        }
      }
    },
    cssmin: {
      options: {
        banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
          ' * <%= pkg.homepage %>\n' +
          ' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
          ' * Licensed GPLv2+' +
          ' */\n'
      },
      minify: {
        expand: true,

        cwd: 'assets/css/',
        src: ['main.css', 'vendor/bp5.css'],

        dest: 'assets/css/',
        ext: '.min.css'
      }
    },
    concat_css: {
      options: {
        // Task-specific options go here.
      },
      all: {
        src: ['assets/css/vendor/bp5.min.css', 'assets/css/vendor/bootstrap.min.css', 'assets/css/main.min.css'],
        dest: 'assets/css/styles.min.css'
      },
    },

    watch: {
      sass: {
        files: ['assets/css/sass/**/*.scss'],
        tasks: ['sass', 'cssmin', 'concat_css'],
        options: {
          debounceDelay: 500
        }
      },

      scripts: {
        files: ['assets/js/src/**/*.js', 'assets/js/vendor/**/*.js'],
        tasks: ['jshint', 'concat', 'uglify'],
        options: {
          debounceDelay: 500
        }
      }
    },

    rsync: {
      options: {
          args: ["--verbose"],
          exclude: ['.git*', 'node_modules', '.sass-cache', 'Gruntfile.js', 'package.json', '.DS_Store', 'README.md', 'config.rb', '.jshintrc', '.gruntjshintrc'],
          recursive: true
      },
      dist: {
        options: {
          src: "./",
          dest: "../dist"
        }
      },
      staging: {
        options: {
          src: "./",
          tasks: ['sass', 'cssmin', 'concat_css', 'jshint', 'concat', 'uglify'],
          dest: "/srv/www/16beavergroup.org/public/wp-content/themes/homepage2",
          host: "root@50.116.51.173",
          syncDestIgnoreExcl: true
        }
      },
      prod: {
        options: {
          src: "./",
          tasks: ['sass', 'cssmin', 'concat_css', 'jshint', 'concat', 'uglify'],
          dest: "/srv/www/16beavergroup.org/public/wp-content/themes/homepage",
          host: "root@50.116.51.173",
          syncDestIgnoreExcl: true
        }
      }
    }

  } );

  // Default task.
  grunt.loadNpmTasks("grunt-rsync");
  grunt.registerTask( 'default', ['jshint', 'concat', 'uglify', 'sass', 'cssmin'] );

  grunt.util.linefeed = '\n';
};
