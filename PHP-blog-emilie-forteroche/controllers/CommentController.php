<?php

class CommentController
{
    /**
     * Ajoute un commentaire.
     * @return void
     */
    public function addComment(): void
    {
        // Récupération des données du formulaire.
        $pseudo = Utils::request("pseudo");
        $content = Utils::request("content");
        $idArticle = Utils::request("idArticle");

        // On vérifie que les données sont valides.
        if (empty($pseudo) || empty($content) || empty($idArticle)) {
            throw new Exception("Tous les champs sont obligatoires. 3");
        }

        // On vérifie que l'article existe.
        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($idArticle);
        if (!$article) {
            throw new Exception("L'article demandé n'existe pas.");
        }

        // On crée l'objet Comment.
        $comment = new Comment([
            'pseudo' => $pseudo,
            'content' => $content,
            'idArticle' => $idArticle
        ]);

        // On ajoute le commentaire.
        $commentManager = new CommentManager();
        $result = $commentManager->addComment($comment);

        // On vérifie que l'ajout a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de l'ajout du commentaire.");
        }

        // On redirige vers la page de l'article.
        Utils::redirect("showArticle", ['id' => $idArticle]);
    }

    public function deleteComment(): void
    {
        // $adminController = new AdminController();
        // $adminController->checkIfUserIsConnected();

        $idArticle = Utils::request("idArticle");
        $idComment = Utils::request("idComment");

        if (empty($idArticle) || empty($idComment)) {
            throw new Exception("Tous les champs sont obligatoires");
        }

        $commentManager = new CommentManager();
        $comment = $commentManager->getCommentById($idComment);
        $delete = $commentManager->deleteComment($comment);

        if (!$delete) {
            throw new Exception("Une erreur est survenue lors de la suppression du commentaire.");
        }

        Utils::redirect("showArticle", ['id' => $idArticle]);
    }
}
