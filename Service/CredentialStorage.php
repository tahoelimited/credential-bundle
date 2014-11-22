<?php

namespace Tahoe\CredentialBundle\Service;

use Doctrine\ORM\EntityManager;
use Tahoe\CredentialBundle\Entity\Credential;
use Tahoe\CredentialBundle\Factory\CredentialFactory;
use Tahoe\CredentialBundle\Repository\CredentialRepository;

/**
 * Class CredentialStorage
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class CredentialStorage
{
    /**
     * @var EntityManager
     */
    protected $entityManager;
    /**
     * @var CredentialRepository
     */
    protected $repository;
    /**
     * @var CredentialFactory
     */
    protected $factory;
    /**
     * @var TokenGenerator
     */
    protected $tokenGenerator;

    function __construct($entityManager, $repository, $factory, $tokenGenerator)
    {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
        $this->factory = $factory;
        $this->tokenGenerator = $tokenGenerator;
    }

    /**
     * @param int    $id
     * @param string $readToken
     *
     * @return array|bool
     */
    public function fetchCredentialData($id, $readToken)
    {
        /** @var Credential $credential */
        $credential = $this->repository->findOneBy(
            array(
                'id' => $id,
                'readToken' => $readToken
            )
        );

        if ($credential) {
            return $credential->getData();
        }

        return false;
    }

    /**
     * @param $data
     *
     * @return Credential
     */
    public function addCredential($data)
    {
        $credential = $this->factory->createNew();

        $credential->setWriteToken($this->tokenGenerator->getRandomString(128, 'write_token_not_so_random_seed'));
        $credential->setReadToken($this->tokenGenerator->getRandomString(128, 'read_token_not_so_random_seed'));

        $credential->setData($data);

        $this->entityManager->persist($credential);
        $this->entityManager->flush();

        return $credential;
    }
}
