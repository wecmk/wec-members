<?php


namespace App\Services\Attachment;

use App\Entity\AttachmentMetadata;
use App\Entity\Event;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class AttachmentService
{
    /* @var $logger LoggerInterface */

    private $logger;

    /* @var $repository ObjectManager */
    private $repository;

    /** @var EntityManagerInterface $em */
    private $em;

    public function __construct(LoggerInterface $logger, EntityManagerInterface $em)
    {
        $this->logger = $logger;
        $this->em = $em;
        $this->repository = $em->getRepository(AttachmentMetadata::class);
    }

    public function delete($id)
    {
        $attachment = $this->em->getRepository(AttachmentMetadata::class)->find($id);
        $this->em->remove($attachment);
        $this->em->flush();
        return true;
    }
}
