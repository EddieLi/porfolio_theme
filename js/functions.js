function add_quote() {
     $.ajax({
     url: my_ajax_script.ajaxurl,
     data: ({action : 'generate_quote'}),
     success: function() {
      //Do stuff here
      console.log("yues");
     }
     });
}