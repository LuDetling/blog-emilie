<?php
?>

<table class="content-monitoring" rules>
    <thead>
        <tr>
            <th>
                <a href="
                    <?php
                    if (empty($_GET["tri"]) || $_GET["tri"] != 'titleasc') {
                        echo "index.php?action=monitoring&tri=titleasc";
                    } else {
                        echo "index.php?action=monitoring&tri=titledesc";
                    }
                    ?>">title</a>
            </th>
            <th>
                <a href="
                    <?php
                    if (empty($_GET["tri"]) || $_GET["tri"] != 'viewasc') {
                        echo "index.php?action=monitoring&tri=viewasc";
                    } else {
                        echo "index.php?action=monitoring&tri=viewdesc";
                    }
                    ?>">vues</a>
            </th>
            <th>commentaires</th>
            <th>
                <a href="
                    <?php
                    if (empty($_GET["tri"]) || $_GET["tri"] != 'dateasc') {
                        echo "index.php?action=monitoring&tri=dateasc";
                    } else {
                        echo "index.php?action=monitoring&tri=datedesc";
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
                <td><?= count($comments[$key]) ?></td>
                <td><?= ucfirst(Utils::convertDateToFrenchFormat($article->getDateCreation())) ?></td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>