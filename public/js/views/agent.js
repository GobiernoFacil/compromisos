// COMPROMISOS APP
// @package  : compromisos
// @location : /js/views
// @file     : agent.js
// @author   : Gobierno fácil
// @url      : gobiernofacil.com

define(function(require){
  //
  // L O A D   T H E   A S S E T S   A N D   L I B R A R I E S
  //
  var Backbone = require('backbone'); 
      Agent    = require('text!templates/agent-form.html');

  //
  // I N I T I A L I Z E   T H E   B A C K B O N E   V I E W
  //
  var agent = Backbone.View.extend({

    //
    // D E F I N E   T H E   E V E N T S
    // 
    events : {
      'click a' : 'delete',
    },

    //
    // S E T   T H E   C O N T A I N E R
    //
    tagName   : "section",
    className : "new-agent",


    //
    // T H E   I N I T I A L I Z E   F U N C T I O N
    //
    initialize : function(){
      //
    },

    //
    // R E N D E R
    //
    render : function(){
      //this.$el.append(agent);
      this.$el.append(Agent);
      return this;
    },

    //
    // R E M O V E   T H E   Q U E S T I O N
    //
    delete : function(e){
      e.preventDefault();
      this.remove();
    }

  });

  return agent;
});