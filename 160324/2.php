<!-- A multiline if...elseif...else statemen -->

<?php
 if ($page == "Home") echo "You selected Home";
 elseif ($page == "About") echo "You selected About";
 elseif ($page == "News") echo "You selected News";
 elseif ($page == "Login") echo "You selected Login";
 elseif ($page == "Links") echo "You selected Links";
 else echo "Unrecognized selection";


// <!-- switch statemen -->

switch ($page)
 {
 case "Home":
 echo "You selected Home";
 break;
 case "About":
 echo "You selected About";
 break;
 case "News":
 echo "You selected News";
 break;
 case "Login":
 echo "You selected Login";
 break;
 case "Links":
 echo "You selected Links";
 break;
 }
