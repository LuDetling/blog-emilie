<?php
$urlTri = "index.php?action=monitoring&tri="
?>

<table class="content-monitoring" rules>
    <thead>
        <tr>
            <th>
                <a href="
                    <?php
                    if (empty($_GET["tri"]) || $_GET["tri"] != 'titleasc') {
                        echo $urlTri . "titleasc";
                    } else {
                        echo $urlTri . "titledesc";
                    }
                    ?>">title</a>
            </th>
            <th>
                <a href="
                    <?php
                    if (empty($_GET["tri"]) || $_GET["tri"] != 'viewasc') {
                        echo $urlTri . "viewasc";
                    } else {
                        echo $urlTri . "viewdesc";
                    }
                    ?>">vues</a>
            </th>
            <th>
                <a href="
                    <?php
                    if (empty($_GET["tri"]) || $_GET["tri"] != 'commentasc') {
                        echo $urlTri . "commentasc";
                    } else {
                        echo $urlTri . "commentdesc";
                    }
                    ?>">commentaires</a>
            </th>
            <th>
                <a href="
                    <?php
                    if (empty($_GET["tri"]) || $_GET["tri"] != 'dateasc') {
                        echo $urlTri . "dateasc";
                    } else {
                        echo $urlTri . "datedesc";
                    }
                    ?>">date de publication</a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $key => $article) {
        ?>
            <tr>
                <td><?= $article->getTitle() ?></td>
                <td><?= $article->getView() ?></td>
                <td><?= $article->getNbComments() ?></td>
                <td><?= ucfirst(Utils::convertDateToFrenchFormat($article->getDateCreation())) ?></td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>