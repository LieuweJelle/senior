<?php
/* 
Under Construction!

if(isset($_POST['search'])){
  $search = disableHtml($_POST['search']);
  $query = DB::query("SELECT * FROM blogs WHERE title LIKE %s OR blog LIKE %s OR subtitle LIKE %s OR text LIKE %s OR datum LIKE %s ORDER BY id DESC", '%'.$search.'%', '%'.$search.'%', '%'.$search.'%', '%'.$search.'%', '%'.$search.'%');
  if(DB::count() < 1) {
    $error2 .= "<span class='error'>Deze zoekactie levert niets op.</span><br /><br />";
  } else {
    foreach($query as $row) {
      echo $row['id']." => ".$row['title']."<br />";
    }
  }
} else {
  die("ACCESS DENIED!!");
} */
?>
