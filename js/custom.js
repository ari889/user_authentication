(function($){
  $(document).ready(function(){
    $('a#deactivate').click(function(){
        let conf = confirm('Are u sure?');
        if(conf == true){
          return true;
        }else{
          return false;
        }
    });
  });
})(jQuery)
