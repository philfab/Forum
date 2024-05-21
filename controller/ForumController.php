<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

class ForumController extends AbstractController implements ControllerInterface
{

    public function index()
    {

        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll(["description", "DESC"]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR . "forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    public function topics()
    {
        //liste des topics
        $topicManager = new TopicManager();
        $topics = $topicManager->findAll(["creationDate", "DESC"]);

        return [
            "view" => VIEW_DIR . "forum/listTopics.php",
            "meta_description" => "All Topics List",
            "data" => [
                "topics" => $topics
            ]
        ];
    }
    public function listTopicsByCategory($id)
    {
        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR . "forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : " . $category,
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    }

    public function listPostsByTopic($id)
    {
        $topicManager = new TopicManager();
        $postManager = new PostManager();
        $topic = $topicManager->findOneById($id);
        $posts = $postManager->findPostsByTopic($id);

        return [
            "view" => VIEW_DIR . "forum/listPosts.php",
            "meta_description" => "Liste des posts par topic : " . $topic,
            "data" => [
                "topic" => $topic,
                "posts" => $posts
            ]
        ];
    }

    // on vérifie si l'user est admin , si oui on appelle lockTopic
    public function lockTopic($id, $category)
    {
        // vérification si l'user est admin
        if (Session::isAdmin()) {
            $topicManager = new TopicManager();
            $topic = $topicManager->findOneById($id);

            if ($topic) {
                $isLocked = $topic->getIsLocked() ? 0 : 1;
                $topicManager->updateLockStatus($id, $isLocked);
                // redirection après verrouillage du topic
                $this->redirectTo("forum", $category != "" ? "listTopicsByCategory" : "Topics", $topic->getCategory()->getId());
            } else {
                Session::addFlash("error", "Le sujet n'existe pas.");
                $this->redirectTo("forum", "index");
            }
        } else {
            // redirection et msg d'erreur si l'user n'est pas admin
            Session::addFlash("error", "Vous n'avez pas les droits pour verrouiller ce sujet.");
            $this->redirectTo("forum", "index");
        }
    }

    public function addTopic()
    {
        if ($_POST) {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $categoryId = filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_NUMBER_INT);
            $userId = Session::getUser()->getId();

            $topicManager = new TopicManager();
            $postManager = new PostManager();

            $topicId = $topicManager->add([
                "title" => $title,
                "category_id" => $categoryId,
                "user_id" => $userId,
                "creationDate" => date("Y-m-d H:i:s"),
                "isLocked" => 0
            ]);

            $postText = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $postManager->add([
                "text" => $postText,
                "publishDate" => date("Y-m-d H:i:s"),
                "user_id" => $userId,
                "topic_id" => $topicId,
                "status" => "active"
            ]);

            $this->redirectTo("forum", "listTopicsByCategory", $categoryId);
        }

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findAll(["description", "DESC"]);

        return [
            "view" => VIEW_DIR . "forum/addTopic.php",
            "meta_description" => "Ajouter un nouveau topic",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    public function addPost($id)
    {
        $topicManager = new TopicManager();
        $topic = $topicManager->findOneById($id);

        if ($topic->getIsLocked()) {
            $this->redirectTo("forum", "listPostsByTopic", $id);
        }

        if ($_POST) {
            $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $userId = Session::getUser()->getId();

            $postManager = new PostManager();
            $postManager->add([
                "text" => $text,
                "publishDate" => date("Y-m-d H:i:s"),
                "user_id" => $userId,
                "topic_id" => $id,
                "status" => "active"
            ]);

            $this->redirectTo("forum", "listPostsByTopic", $id);
        }

        return [
            "view" => VIEW_DIR . "forum/addPost.php",
            "meta_description" => "Ajouter un nouveau post",
            "data" => [
                "topicId" => $id
            ]
        ];
    }
}
