({
  baseUrl: "./",
  name : "admin.main",
  out : "./admin.main-built.js",
  paths : {
    jquery     : "./bower_components/jquery/dist/jquery",
    backbone   : "./bower_components/backbone/backbone",
    underscore : "./bower_components/underscore/underscore",
    text       : "./bower_components/text/text",
    requireLib    : './bower_components/requirejs/require'
  },
  shim : {
    underscore :{
      exports : "_"
    },
    backbone : {
      deps    : ["jquery", "underscore"],
      exports : "Backbone"
    }
  },
  include : 'requireLib'
})