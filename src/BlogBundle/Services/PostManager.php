<?php

namespace BlogBundle\Services;

use BlogBundle\Entity\Post;

/**
 * Service "blog.post_manager"
 */
class PostManager
{
    /**
     * @var BlogService
     */
    protected $blogService;

    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * @param BlogService $blogService
     * @param \Swift_Mailer $mailer
     */
    public function __construct(BlogService $blogService, \Swift_Mailer $mailer)
    {
        $this->blogService = $blogService;
        $this->mailer = $mailer;
    }

    /**
     * @param Post $post
     */
    public function managePost(Post $post)
    {
        // do something with post(business logic)
        $result = $this->blogService->doSomething($post);

        if ($result) {
            $this->sendEmailAfterDoSomething($post);
        }
    }

    /**
     * @param Post $post
     */
    protected function sendEmailAfterDoSomething(Post $post)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('send@example.com')
            ->setTo('recipient@example.com');

        $this->mailer->send($message);
    }
}