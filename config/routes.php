<?php
# An example about how can be happy :)
setRoute("example", "example@indexAction"); // First is homepage
setRoute("example/try-your-message/{msg}", "example@tryYourMessage");
setRoute("deneme", function() { echo"addasda"; }); 
