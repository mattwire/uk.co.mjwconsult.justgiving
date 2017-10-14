<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit740084673d2cd9e2e47eee4d9f0c4d9f
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Lukasoppermann\\Httpstatus\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Lukasoppermann\\Httpstatus\\' => 
        array (
            0 => __DIR__ . '/..' . '/lukasoppermann/http-status/src',
        ),
    );

    public static $classMap = array (
        'AddImageRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/AddImageRequest.php',
        'AddInterestRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/AddInterestRequest.php',
        'AddPostToPageUpdateRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/AddPostToPageUpdateRequest.php',
        'AddVideoRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/AddVideoRequest.php',
        'Address' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/Address.php',
        'AuthenticateCharityAccountRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/AuthenticateCharityAccountRequest.php',
        'CampaignCoverPhotos' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/RegisterCampaignRequest.php',
        'CampaignLogos' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/RegisterCampaignRequest.php',
        'CampaignPhotos' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/RegisterCampaignRequest.php',
        'ChangePasswordRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/ChangePasswordRequest.php',
        'CreateAccountRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/CreateAccountRequest.php',
        'Event' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/Event.php',
        'FundraisingPageAttributionRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/FundraisingPageAttributionRequest.php',
        'JoinTeamRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/JoinTeamRequest.php',
        'JustGivingClient' => __DIR__ . '/../..' . '/src/JustGivingPHP/JustGivingClient.php',
        'PageImage' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/RegisterPageRequest.php',
        'PageVideo' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/RegisterPageRequest.php',
        'RateContentRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/RateContentRequest.php',
        'RegisterCampaignRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/RegisterCampaignRequest.php',
        'RegisterPageRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/RegisterPageRequest.php',
        'StoryUpdateRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/StoryUpdateRequest.php',
        'Team' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/Team.php',
        'TeamMember' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/Team.php',
        'UpdateFundraisingPageAttributionRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/UpdateFundraisingPageAttributionRequest.php',
        'UpdatePageSmsCodeRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/UpdatePageSmsCodeRequest.php',
        'ValidateAccountRequest' => __DIR__ . '/../..' . '/src/JustGivingPHP/ApiClients/Model/ValidateAccountRequest.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit740084673d2cd9e2e47eee4d9f0c4d9f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit740084673d2cd9e2e47eee4d9f0c4d9f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit740084673d2cd9e2e47eee4d9f0c4d9f::$classMap;

        }, null, ClassLoader::class);
    }
}
