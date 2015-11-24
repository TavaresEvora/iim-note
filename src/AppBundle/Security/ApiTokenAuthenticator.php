<?php
namespace AppBundle\Security;

use Doctrine\ORM\EntityManager;
use KnpU\Guard\AbstractGuardAuthenticator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationCredentialsNotFoundException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;


class ApiTokenAuthenticator extends AbstractGuardAuthenticator
{

    private $em;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function getCredentials(Request $request)
    {
        return $request->headers->get('X-TOKEN');
    }
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $user = $this->em->getRepository('AppBundle:User')
        ->findOneBy(array('apiToken' => $credentials));
        // we could just return null, but this allows us to control the message a bit more
        if (!$user) {
            throw new AuthenticationCredentialsNotFoundException();
        }
        return $user;
    }
    public function checkCredentials($credentials, UserInterface $user)
    {
        return 'Connected';
    }
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        return new JsonResponse(
    // you could translate the message
        array('message' => $exception->getMessageKey()),
        403
    );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
    // TODO: Implement onAuthenticationSuccess() method.
    }
    public function supportsRememberMe()
    {
        return false;
    }
    public function start(Request $request, AuthenticationException $authException = null)
    {
        return new JsonResponse(
    // you could translate the message
        array('message' => 'Authentication required'),
        401
        );
    }
}