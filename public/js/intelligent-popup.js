function addEvent(obj, evt, fn) {
    if (obj.addEventListener) {
        obj.addEventListener(evt, fn, false);
    }
    else if (obj.attachEvent) {
        obj.attachEvent("on" + evt, fn);
    }
}

/*addEvent(document, "mouseout", function(e) {
    e = e ? e : window.event;
    var from = e.relatedTarget || e.toElement;
    if (!from || from.nodeName == "HTML") {
        // the cursor has left the building
        if (Cookies.get('intelligent-popup') != 'yes') {

          var date 	= new Date();
          var minutes = 1;
          date.setTime(date.getTime() + (minutes * 60 * 1000));
          // Set cookie
          Cookies.set('intelligent-popup', 'yes', {
            expires: date,
            path: '/'
          });
          location.href="#intelligent-popup";
        }
    }
});*/

var current_scroll = 0;
var last_mouse_y = null;

addEvent(document, "mousemove", function(e) {

      var speed = last_mouse_y - e.pageY;
      var success_val = e.pageY - speed;

      //console.log("Current Scroll: " + current_scroll);
      //console.log("Last Mouse Y: " + last_mouse_y);
      //console.log("Speed: " + speed);
      //console.log("Success: " + success_val);

      if (success_val < last_mouse_y && success_val <= current_scroll) {
        // the cursor has left the building
        if (Cookies.get('intelligent-popup') != 'yes') {
          var date 	= new Date();
          var minutes = 1;
          date.setTime(date.getTime() + (minutes * 60 * 1000));
          // Set cookie
          Cookies.set('intelligent-popup', 'yes', {
            expires: date,
            path: '/'
          });
          location.href="#intelligent-popup";
        }
      } else {
        //console.log("Normal");
      }

      last_mouse_y = e.pageY;
    //}

});

addEvent(document, "scroll", function(e) {
    current_scroll = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
    //console.log("Current Scroll2: " + current_scroll);
});
