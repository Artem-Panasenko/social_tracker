<?php

namespace BlogBundle\Services;


use BlogBundle\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

/**
 * Service "blog.blog_service"
 */
class BlogService
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param EntityManagerInterface $em
     * @param LoggerInterface $logger
     */
    public function __construct(EntityManagerInterface $em, LoggerInterface $logger)
    {
        $this->entityManager = $em;
        $this->logger = $logger;        
    }

    /**
     * @param Post $post
     * @return bool
     */
    public function doSomething(Post $post)
    {
        $this->logger->info(sprintf('Do something with post ID#%s', $post->getId()));
        // bla bla bla stupid example
        $this->entityManager->getRepository('BlogBundle:Post')->find($post->getId());
        // tra ta ta
        $this->logger->info('Finish');

        return true;
    }
}