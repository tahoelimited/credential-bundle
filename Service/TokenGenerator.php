<?php


namespace Tahoe\CredentialBundle\Service;

/**
 * Class TokenGenerator
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class TokenGenerator
{
    /**
     * @param int    $length
     * @param string $seed
     *
     * @return string
     */
    public function getRandomString($length = 128, $seed = '')
    {
        return substr(hash('sha512', uniqid() . mt_rand(0, 99999) . $seed), 0, $length);
    }
}
