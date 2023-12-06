<?php
?>

<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>vues</th>
            <th>commentaires</th>
            <th>date de publication</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article) {
        ?>
            <tr>
                <td><?= $article->getTitle() ?></td>
                <td><?= $article->getView() ?></td>
                <td><?= $article->getView() ?></td>
                <td><?= ucfirst(Utils::convertDateToFrenchFormat($article->getDateCreation())) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>