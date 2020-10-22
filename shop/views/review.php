<html lang="en">
<?php require "../layout/header.php"?>

<div class="container" style="margin-top: 15px">
<?php

function displayComment(Array $comments, int $n) {
    if (isset($comments[$n])) {
        $str = "<ul>";
        foreach ($comments[$n] as $comment) {



            $str .= '
                <li style="list-style: none" style="max-height: 50px"> 
                    <div class="card mb-3" >
                        <div class="row no-gutters">
                            <div class="row">
                                <img class="col avatar" src="../../images/'.$comment->avatar.'" alt="avatar">
                                
                                <div class="w-100"></div>
                                <div class="col" style="margin: 10px 10px">'.$comment->username.'</div>                     
                            </div>
                        
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">'.$comment->title .'</h5>
                            <p class="card-text">'.$comment->comment.'</p>
                            <p class="card-text"><small class="text-muted">'.$comment->datetime.'</small></p>
                          </div>
                        </div>
                    </div>
                </div>';

            $str .= displayComment($comments, $comment->id); $str .= "</li>";

    }
    $str .= "</ul>";
    return $str; }
    return ""; }
echo displayComment($comments, 0);
?>

<!--<div class="card mb-3">-->
<!--  <div class="row no-gutters">-->
<!---->
<!--        <div class="row">-->
<!--            <div class="col">col</div>-->
<!--            <div class="col">col</div>-->
<!--            <div class="w-100"></div>-->
<!--            <div class="col">col</div>-->
<!--            <div class="col">col</div>-->
<!--        </div>-->
<!---->
<!--    <div class="col-md-8">-->
<!--      <div class="card-body">-->
<!--        <h5 class="card-title">Card title</h5>-->
<!--        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
<!--        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

    <?php require "../layout/footer.php" ?>

    <script>
        <?php require "../Static/js/product.js"?>

    </script>

</html>




