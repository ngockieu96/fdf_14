<?php

namespace App\Services;

use App\User;
use App\Models\SocialAccount;
use Laravel\Socialite\Contracts\Provider;
use App\Repositories\SocialAccount\SocialAccountRepository;
use App\Repositories\User\UserRepositoryInterface;

class SocialAccountService
{
    protected $socialAccountRepository;
    protected $userRepository;

    public function __construct(SocialAccountRepository $socialAccountRepository, UserRepositoryInterface $userRepository)
    {
        $this->socialAccountRepository = $socialAccountRepository;
        $this->userRepository = $userRepository;
    }

    public function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);
        $account = $this->socialAccountRepository->getAccount($providerName, $providerUser);

        if ($account) {
            return $account->user;
        }

        $account = new $this->socialAccountRepository([
            'provider_user_id' => $providerUser->getId(),
            'provider' => $providerName,
        ]);
        $user = $userRepository->getUserWithEmail($providerUser);

        if (!$user) {
            $datas = [
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
            ];
            $user = $userRepository->createUserSocial($datas);
        }

        $account->user()->associate($user);
        $account->save();

        return $user;
    }
}
