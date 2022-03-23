<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route ("/manageposts/createpost", name="createpost")
     * @param Request $request
     * @param ManagerRegistry $doctrine
     * @return Response
     */
    public function createpost(Request $request, ManagerRegistry $doctrine): Response
    {
        $post = new Post();

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        $form->getErrors();

        if ($form ->isSubmitted()){
            $em = $doctrine->getManager();

            $em->persist($post);
            $em->flush();

            return $this->redirect($this->generateUrl('manageposts'));
        }

        return $this->render('post/createpost.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route ("/manageposts", name="manageposts")
     * @param PostRepository $postRepository
     * @return Response
     */
    public function manageposts(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();

        return $this->render('post/manageposts.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @Route ("/manageposts/deletepost/{id}", name="deletepost")
     * @param Post $post
     * @param ManagerRegistry $doctrine
     * @return Response
     */
    public function deletepost(Post $post, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();

        $em->remove($post);
        $em->flush();

        $this->addFlash('success', 'Post was removed');

        return $this->redirect($this->generateUrl('manageposts'));
    }

    /**
     * @Route ("/readpost/{id}", name="readpost")
     * @param Post $post
     * @return Response
     */
    public function readpost(Post $post): Response
    {

        return $this->render('post/readpost.html.twig', [
            'posts' => $post
        ]);
    }



}
