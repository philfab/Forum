<?php

namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class SecurityController extends AbstractController implements ControllerInterface
{
    public function login()
    {
        // formulaire soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // récupérer et valider les datas
            $userName = $_POST['userName'];
            $password = $_POST['password'];

            // vérifier les infos de connexion
            $userManager = new UserManager();
            $user = $userManager->findByUserName($userName);

            if ($user && password_verify($password, $user->getPassword())) {
                // crée une session pour l'user
                \App\Session::setUser($user);

                // rediriger vers la page d'accueil
                $this->redirectTo('home', 'index');
            } else {
                // redirige vers la page de connexion avec message d'erreur
                \App\Session::addFlash('error', "Nom d'utilisateur ou mot de passe incorrect");
                $this->redirectTo('security', 'login');
            }
        }

        // Afficher le formulaire de connexion
        return [
            "view" => VIEW_DIR . "security/login.php",
            "meta_description" => "Connexion"
        ];
    }

    public function register()
    {
        // Si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // récupére les datas du formulaire
            $userName = $_POST['userName'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $email = $_POST['email'];
            $roles = 'ROLE_USER';
            $status = 'active';

            // tableau des datas de l'user
            $data = [
                'userName' => $userName,
                'password' => $password,
                'email' => $email,
                'roles' => $roles,
                'status' => $status,
                'registrationDate' => date('Y-m-d H:i:s')
            ];

            // add l'user à la bdd
            $userManager = new UserManager();
            $userManager->add($data);

            // redirige vers la page de connexion
            $this->redirectTo('security', 'login');
        }

        // affiche le formulaire register
        return [
            "view" => VIEW_DIR . "security/register.php",
            "meta_description" => "Inscription"
        ];
    }

    //l'user se delog
    public function logout()
    {
        // on detruit la session
        session_destroy();

        // direction la page d'accueil
        $this->redirectTo('home', 'index');
    }
}
