<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Contact;
use AppBundle\Entity\User;
use AppBundle\Entity\Comments;
use AppBundle\Entity\score;
use AppBundle\Entity\jeux;
use AppBundle\Form\ContactType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\SecurityContextInterface;

class MainController extends Controller {
//fonction mes projets avec la route /mes_projet avec le template twing index.html.twig

    /**
     * @Route("/mes_projet", name="index")
     * 
     */
    public function indexAction() {
        return $this->render('Main/index.html.twig', array('tableau' => array(
                        'test 1',
                        'test 2',
                        ' test 3 '
        )));
    }

//fonction cvAction avec la route /cv avec le template twing cv.html.twig

    /**
     * @Route("/cv", name="cv")
     * 
     */
    public function cvAction() {
        return $this->render('Main/cv.html.twig');
    }

//fonction contactAction avec création de formulaire envoyé à la bd et par mail avec la class mailer avec la route /contact avec le template twing contact.html.twig

    /**
     * @Route("/contact", name="contact")
     * 
     */
    public function contactAction(Request $request) {
       //Instanciation de l'entity
         $contact = new Contact();
        //création du formulaire avec la class ContactType
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        //test si le formulaire est valide et s'il est submit
        if ($form->isSubmitted()and $form->isValid()) {
            //si oui alors enregistre les données du formulaire dans les variablse correspondante  
            $name = $form['name']->getData();
            $telephone = $form['telephone']->getData();
            $email = $form['email']->getData();
            $suject = $form['suject']->getData();
            $message = $form['message']->getData();
            //J'utilise la class mailer de symfony pour envoyer les données par mail 
            $message1 = \Swift_Message::newInstance()
                    ->setSubject($suject)
                    ->setFrom('frederidupont95@gmail.com')
                    ->setTo($email)
                    ->setBody($this->renderView('Main/sendmail.html.twig', array('name' => $name, 'telephone' => $telephone, 'email' => $email, 'suject' => $suject, 'message' => $message)), 'text/html');
            $this->get('mailer')->send($message1);
            // du coup j'enregistre les données sur ma bd alwaysdata
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            // Ajout d'un message flash
            $this->addFlash('info', 'Message Envoyer');
            //affichage du message de confirmation d'envoi de contacte
            return $this->render('Main/confirmation.html.twig', array('name' => $name, 'telephone' => $telephone, 'email' => $email, 'suject' => $suject, 'message' => $message));
        } else {
            //sinon affiche sa
            return $this->render('Main/contact.html.twig', array(
                        'form' => $form->createView()
            ));
        }
        //route du fichier contact.html.twig
        return $this->render('Main/contact.html.twig', array(
                    'form' => $form->createView()
        ));
    }

//fonction testLinkAction avec la route /home avec le template twing test.html.twig

    /**
     * @Route("/", name="home")
     * @return type
     */
    public function testLinkAction() {
        return $this->render('Main/test-link.html.twig');
        //return $this->render('AppBundle:Main:test-link.html.twig');
    }

//fonction testRedirectAction avec la route /test-redirect avec redirect to route a index

    /**
     * @Route("/test-redirect")
     * @return type
     */
    public function testRedirectAction() {
        return $this->redirectToRoute('index', array('name' => 'Eric', 'age' => 34));
    }

//fonction testErrorAction avec la route /test-error 

    /**
     * @Route("/test-error")
     */
    public function testErrorAction() {
        // throw $this->createNotFoundException("La page et null" );
        $response = new Response("Une erreur est survenue");
        $response->setStatusCode(500);
        return $response;
    }

    public function menuAction() {
        $request = $this->get('request_stack');
        $masterRequest = $requestStack->getMasterRequest();
        $route = null;
        if ($masterRequest) {
            $route = $masterRequest->attributes->get('_route');
        }
        return $this->render('Main/contact.html.twig');
    }

//fonction inscriptionAction avec comme argument Resquest $request pour les requètes sql avec creation de formulaire envoyer à la bd avec la route /inscription avec le template twing inscription.html.twig

    /**
     * @Route("/inscription", name="inscription")
     * @return type
     */
    public function inscriptionAction(Request $request) {
        $user = new \AppBundle\Entity\User();
        //création du formulaire avec la description des champs 
        $form = $this->createFormBuilder($user)
                ->add('username', TextType::class, array('label' => 'UserName', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
                ->add('email', TextType::class, array('label' => 'Email', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
                ->add('password', TextType::class, array('label' => 'Mot de passe', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
                ->add('Save', SubmitType::class, array('label' => 'submit', 'attr' => array('class' => 'btn btn-danger', 'style' => 'margin-top:15px')))
                ->getForm();
        $form->handleRequest($request);
        //test si le formulaire est valide et s'il est submit
        if ($form->isSubmitted() && $form->isValid()) {
            //si oui alors enregistre les données du formulaire dans les variables correspondante   
            $username = $form['username']->getData();
            $email = $form['email']->getData();
            $password = $form['password']->getData();
            $password = password_hash($password, PASSWORD_BCRYPT);
            // du coup j'enregistre les données sur ma bd alwaysdata
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setEmail($email);


            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            //si tout se passe bien alors affiche cette page 
            return $this->render('Main/confirmation1.html.twig');
        } else {
            //sinon affiche sa
            return $this->render('Main/inscription.html.twig', array(
                        'form' => $form->createView()
            ));
        }
        //route du fichier contact.html.twig
        return $this->render('Main/inscription.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    //fonction loginAction avec la route /login   

    /**
     * @Route("/perso", name="perso")
     * 
     */
    public function confirAction(Request $request) {
               
                $comment = new Comments();
        //création du formulaire avec la description des champs 
        $form = $this->createFormBuilder($comment)
                ->add('utilisateur', TextType::class, array('label' => 'Utilisateur', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
                ->add('jeux', EntityType::class, array(
                    'class'=> 'AppBundle:jeux',
                    'choice_label'=>'nom_jeu',
                    'expanded'=>FALSE,
                    'multiple'=>FALSE,
                    'attr' => array( 'class' => 'form-control','style' => 'margin-bottom:15px'    
                    )))
                ->add('message', TextType::class, array('label' => 'Message', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
                
                ->add('Save', SubmitType::class, array('label' => 'submit', 'attr' => array('class' => 'btn btn-danger', 'style' => 'margin-top:15px')))
                ->getForm();
        $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
            //si oui alors enregistre les données du formulaire dans les variables correspondante   
            $nom = $form['utilisateur']->getData();
            $jeux = $form['jeux']->getData();
            $message = $form['message']->getData();
     
            // du coup j'enregistre les données sur ma bd alwaysdata
            $comment->setUtilisateur($nom);
            $comment->setJeux($jeux);
            $comment->setMessage($message);


            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
            //si tout se passe bien alors affiche cette page 
             return $this->render('Main/my2.html.twig', array(
                        'form' => $form->createView()
            ));
      }   else {
           return $this->render('Main/my.html.twig', array(
                        'form' => $form->createView()
            ));
        
    }}

    /**
     * @Route("/login", name="login_route")
     * 
     */
    public function loginAction(Request $request) {
        $user = new User();
        $user = $this->getUser();
        //Si l'utilisateur est identifié alors redirection
        if ($this->get('security.authorization_checker')
                        ->isGranted('IS_AUTHENTICATED_REMEMBERED')
        ) {
            return $this->redirectToRoute('perso');
        }
        //Sinon récupération des erreurs et affichage du formulaire de login
        $authenticationUtils = $this->get('security.authentication_utils');
        return $this->render(
                    'Main/login.html.twig', [
                    'lastUserName' => $authenticationUtils->getLastUserName(),
                    'error' => $authenticationUtils->getLastAuthenticationError()
                        ]
        );
    }
    
      /**
     * @Route("/perso/serpent", name="my")
     * 
     */
    public function persoAction() {
        return $this->render('Main/myperso.html.twig');
    }
    /**
     * @Route("/perso/casse", name="casse")
     * 
     */
    public function casseAction() {
        return $this->render('Main/case-brique/casse-brique.html.twig');
    }
    /**
     * @Route("/perso/score", name="score")
     * 
     */
    public function score(Request $request) {
        
    }

}
