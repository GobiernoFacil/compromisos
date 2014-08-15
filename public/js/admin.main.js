// TURISMO APP
// date     : 30/7/2014
// @package : turismo
// @file    : main.js
// @version : 1.0
// @author  : elcoruco
// @url     : http://elcoruco.com

require.config({
  baseUrl : "/js",
  paths : {
    jquery     : "bower_components/jquery/dist/jquery",
    backbone   : "bower_components/backbone/backbone",
    underscore : "bower_components/underscore/underscore",
    text       : "bower_components/text/text",
    tinymce    : "bower_components/tinymce/tinymce"
  },
  shim : {
    /*
    tinymce :{
      exports : "tinymce"
    },
    */
    underscore :{
      exports : "_"
    },
    backbone : {
      deps    : ["jquery", "underscore"],
      exports : "Backbone"
    }
  }
});

var app;

require(["controller"], function(controller){
  app = new controller();
});

