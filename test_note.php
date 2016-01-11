<?php
if (isset ($_GET['id'])&& isset ($_GET['stars'])){
                $posteur = $_SESSION['id'];
                $id_actualite= $_GET['id'];
                $note = $_GET['stars'];
$getVoteJoueur = $bdd->query("SELECT * FROM `note` WHERE posteur=$posteur AND id_actualite=$id_actualite");
if( $getVoteJoueur->fetch() == false )
{
                $addnote = $bdd->prepare("INSERT INTO `note` VALUES ('', ?, ?, ?)");
                $addnote->execute(array($posteur, $id_actualite, $note));
    echo '<div id="infos"><p style="color:green;text-align:center;">Votre note a bien été pris en compte !</p></div>';
}
}
?>
    <style type="text/css">
        /*
         * Rating styles
         */
        .rating {
            width:290px;
            margin-top:36px;
            font-size: 35px;
            overflow:hidden;
        }
        .rating a {
            float:right;
            color: #aaa;
            text-decoration: none;
            -webkit-transition: color .4s;
            -moz-transition: color .4s;
            -o-transition: color .4s;
            transition: color .4s;
        }
        .rating a:hover,
        .rating a:hover ~ a,
        .rating a:focus,
        .rating a:focus ~ a     {
            color: orange;
            cursor: pointer;
        }
        .rating2 {
            direction: rtl;
        }
        .rating2 a {
            float:none
        }

    </style>

    <?php
    $posteur = $bdd->quote($_SESSION['id']);
    $id_actualite= $bdd->quote($_GET['id']);
    $getNewsQuery = $bdd->query("SELECT * FROM `note` WHERE posteur=$posteur AND id_actualite=$id_actualite");
    if( $getNewsQuery->fetch() == false )
    {
       echo '<div class="rating rating2">
            --><a href="show-event'.$_GET['id'].'&stars=5" title="Donner 5/5">★</a><!--
            --><a href="show-event'.$_GET['id'].'&stars=4" title="Donner 4/5">★</a><!--
            --><a href="show-event'.$_GET['id'].'&stars=3" title="Donner 3/5">★</a><!--
            --><a href="show-event'.$_GET['id'].'&stars=2" title="Donner 2/5">★</a><!--
            --><a href="show-event'.$_GET['id'].'&stars=1" title="Donner 1/5">★</a>
        </div>';
    }
    ?>
