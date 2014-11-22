<?php


namespace Tahoe\CredentialBundle\Factory;

use Tahoe\CredentialBundle\Entity\Credential;

/**
 * Class CredentialFactory
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class CredentialFactory
{
    /**
     * @return Credential
     */
    public static function createNew()
    {
        return new Credential();
    }
}
