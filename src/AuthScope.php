<?php

namespace Muscobytes\AdmitadApi;

use ReflectionClass;
use Muscobytes\AdmitadApi\Trait\ConstantsTrait;

/**
 * Class AuthScope
 * @package Muscobytes\AdmitadApi
 * https://developers.admitad.com/hc/en-us/articles/7930273820689
 */
class AuthScope
{
    use ConstantsTrait;


    public const ALL_SCOPES = 'all';

    /**
     * @var string
     * Gives access to:
     *  - Types of ad spaces
     *    https://developers.admitad.com/hc/en-us/articles/7930496407825-Auxiliary-information#types-of-ad-spaces
     *
     *  - Ad space languages
     *    https://developers.admitad.com/hc/en-us/articles/7930496407825-Auxiliary-information#system-languages
     *
     *  - Ad space categories
     *    https://developers.admitad.com/hc/en-us/articles/7930496407825-Auxiliary-information#categories-of-affiliate-programs
     *
     *  - Ad space regions
     *    https://developers.admitad.com/hc/en-us/articles/7930496407825-Auxiliary-information#ad-space-regions
     *
     *  - List of currencies
     *    https://developers.admitad.com/hc/en-us/articles/7930496407825-Auxiliary-information#system-currencies
     *
     *  - Coupon categories
     *    https://developers.admitad.com/hc/en-us/articles/7930482029585-Coupons#coupon-categories
     */
    public const SCOPE_PUBLIC_DATA = 'public_data';

    /**
     * @var string
     * Gives access to:
     *  - List of ad spaces
     *    https://developers.admitad.com/hc/en-us/articles/7930518139153-Publisher-ad-spaces#list-of-publisher-ad-spaces
     */
    public const SCOPE_WEBSITES = 'websites';

    /**
     * @var string
     * Gives access to:
     *  - Create an ad space
     *    https://developers.admitad.com/hc/en-us/articles/7930518139153-Publisher-ad-spaces#creating-publisher-ad-space
     *
     *  - Edit an ad space
     *    https://developers.admitad.com/hc/en-us/articles/7930518139153-Publisher-ad-spaces#editing-publisher-ad-space
     *
     *  - Ad space confirmation
     *    https://developers.admitad.com/hc/en-us/articles/7930518139153-Publisher-ad-spaces#confirmation-of-publisher-ad-space
     *
     *  - Delete an ad space
     *    https://developers.admitad.com/hc/en-us/articles/7930518139153-Publisher-ad-spaces#deleting-publisher-ad-space
     */
    public const SCOPE_MANAGE_WEBSITES = 'manage_websites';

    /**
     * @var string
     * Gives access to:
     *  - List of affiliate programs
     *    https://developers.admitad.com/hc/en-us/articles/7930565454353-Affiliate-programs#list-affiliate-programs
     */
    public const SCOPE_ADVCAMPAIGNS = 'advcampaigns';

    /**
     * @var string
     * Gives access to:
     *  - List of programs for the ad space
     *    https://developers.admitad.com/hc/en-us/articles/7930565454353-Affiliate-programs#list-for-ad-space
     */
    public const SCOPE_ADV_CAMPAIGNS_FOR_WEBSITE = 'advcampaigns_for_website';

    /**
     * @var string
     * Gives access to:
     *  - Join affiliate programs
     *    https://developers.admitad.com/hc/en-us/articles/7930565454353-Affiliate-programs#connecting-ad-space-to-program
     *
     *  - Unjoin affiliate programs
     *    https://developers.admitad.com/hc/en-us/articles/7930565454353-Affiliate-programs#disconnecting-ad-space
     */
    public const SCOPE_MANAGE_ADVCAMPAIGNS = 'manage_advcampaigns';

    /**
     * @var string
     * Gives access to:
     *  - Banners list
     *    https://developers.admitad.com/hc/en-us/articles/7930477862161-Banners#list-of-banners
     */
    public const SCOPE_BANNERS = 'banners';

    /**
     * @var string
     * Gives access to:
     *  - List of banners for the ad space
     *    https://developers.admitad.com/hc/en-us/articles/7930477862161-Banners#list-of-banners-for-ad-space
     */
    public const SCOPE_MANAGE_BANNERS = 'banners_for_website';

    /**
     * @var string
     * Gives access to:
     *  - List of landing pages
     *    https://developers.admitad.com/hc/en-us/articles/7930499676305-Landing-pages
     */
    public const SCOPE_LANDINGS = 'landings';

    /**
     * @var string
     * Gives access to:
     *  - List of notifications
     *    https://developers.admitad.com/hc/en-us/articles/7930503340945-Announcements-List-of-notifications
     */
    public const SCOPE_ANNOUNCEMENTS = 'announcements';

    /**
     * @var string
     * Gives access to:
     *  - List of referrals
     *    https://developers.admitad.com/hc/en-us/articles/7930430106129-Referrals
     */
    public const SCOPE_REFERRALS = 'referrals';

    /**
     * @var array
     * Gives access to:
     *  - List of coupons
     *    https://developers.admitad.com/hc/en-us/articles/7930482029585-Coupons#list-of-coupons
     */
    public const SCOPE_COUPONS = 'coupons';

    /**
     * @var string
     * Gives access to:
     *  - List of coupons for the ad space
     *    https://developers.admitad.com/hc/en-us/articles/7930482029585-Coupons#list-of-coupons-for-the-ad-space
     */
    public const SCOPE_COUPONS_FOR_WEBSITE = 'coupons_for_website';

    /**
     * @var string
     * Gives access to:
     *  - Info about the publisher (name, language)
     *    https://developers.admitad.com/hc/en-us/articles/7930491122321-User-information#information-about-the-publisher
     */
    public const SCOPE_PRIVATE_DATA = 'private_data';

    /**
     * @var string
     * Gives access to:
     *  - Info about the publisher (name, language, email)
     *    https://developers.admitad.com/hc/en-us/articles/7930491122321-User-information#information-about-the-publisher
     */
    public const SCOPE_PRIVATE_DATA_EMAIL = 'private_data_email';

    /**
     * @var string
     * Gives access to:
     *  - Info about the publisher (name, language, phone number)
     *    https://developers.admitad.com/hc/en-us/articles/7930491122321-User-information#information-about-the-publisher
     */
    public const SCOPE_PRIVATE_DATA_PHONE = 'private_data_phone';

    /**
     * @var string
     * Gives access to:
     *  - Info about the publisher balance
     *    https://developers.admitad.com/hc/en-us/articles/7930491122321-User-information#information-about-the-publisher-balance
     */
    public const SCOPE_PRIVATE_DATA_BALANCE = 'private_data_balance';

    /**
     * @var string
     * Gives access to:
     *  - Check links
     *    https://developers.admitad.com/hc/en-us/articles/7930461938193-Checking-links
     */
    public const SCOPE_VALIDATE_LINKS = 'validate_links';

    /**
     * @var string
     * Gives access to:
     *  - Deeplink generator
     *    https://developers.admitad.com/hc/en-us/articles/7930476170001-Deeplink-generator
     */
    public const SCOPE_DEEPLINK_GENERATOR = 'deeplink_generator';

    /**
     * @var string
     * Gives access to:
     *  - Publisher reports
     *    https://developers.admitad.com/hc/en-us/articles/7930541032849-Publisher-reports
     */
    public const SCOPE_STATISTICS = 'statistics';

    /**
     * @var string
     * Gives access to:
     *  - List of Postback URLs
     *    https://developers.admitad.com/hc/en-us/articles/7930526263441-Postback-URLs#list-of-postback-urls
     */
    public const SCOPE_OPT_CODES = 'opt_codes';

    /**
     * @var string
     * Gives access to:
     *  - Create Postback URL by action
     *    https://developers.admitad.com/hc/en-us/articles/7930526263441-Postback-URLs#create-postback-url-by-action
     *
     *  - Editing Postback URL by action
     *    https://developers.admitad.com/hc/en-us/articles/7930526263441-Postback-URLs#editing-by-action
     *
     *  - Creating of Postback URLs by the program status change
     *    https://developers.admitad.com/hc/en-us/articles/7930526263441-Postback-URLs#creating-by-program-status-change
     *
     *  - Editing Postback URL by the program change status
     *    https://developers.admitad.com/hc/en-us/articles/7930526263441-Postback-URLs#editing-by-program-change-status
     *
     *  - Removing Postback URLs
     *    https://developers.admitad.com/hc/en-us/articles/7930526263441-Postback-URLs#removing-postback-urls
     */
    public const SCOPE_MANAGE_OPT_CODES = 'manage_opt_codes';

    /**
     * @var string
     * Gives access to:
     *  - List of ReTag tags
     *    https://developers.admitad.com/hc/en-us/articles/7930559451921-Retag#list-retag-tags
     *
     *  - Available program levels
     *    https://developers.admitad.com/hc/en-us/articles/7930559451921-Retag#available-program-levels
     */
    public const SCOPE_WEBMASTER_RETAG = 'webmaster_retag';

    /**
     * @var string
     * Gives access to:
     *  - Create ReTag tags
     *    https://developers.admitad.com/hc/en-us/articles/7930559451921-Retag#create-retag-tags
     *
     *  - Edit ReTag tags
     *    https://developers.admitad.com/hc/en-us/articles/7930559451921-Retag#edit-retag-tags
     *
     *  - Delete ReTag tags
     *    https://developers.admitad.com/hc/en-us/articles/7930559451921-Retag#delete-retag-tags
     */
    public const SCOPE_MANAGE_WEBMASTER_RETAG = 'manage_webmaster_retag';

    /**
     * @var string
     * Gives access to:
     *  - List of broken links
     *    https://developers.admitad.com/hc/en-us/articles/7930560103825-Broken-links#list-of-broken-links
     */
    public const SCOPE_BROKEN_LINKS = 'broken_links';

    /**
     * @var string
     * Gives access to:
     *  - Fixing broken links
     *    https://developers.admitad.com/hc/en-us/articles/7930560103825-Broken-links#fixing-broken-links
     */
    public const SCOPE_MANAGE_BROKEN_LINKS = 'manage_broken_links';

    /**
     * @var string
     * Gives access to:
     *  - List of lost orders
     *    https://developers.admitad.com/hc/en-us/articles/7930561450001-Lost-orders#list-of-lost-orders
     */
    public const SCOPE_LOST_ORDERS = 'lost_orders';

    /**
     * @var string
     * Gives access to:
     *  - Creation of lost order
     *    https://developers.admitad.com/hc/en-us/articles/7930561450001-Lost-orders#creation-of-lost-order
     */
    public const SCOPE_MANAGE_LOST_ORDERS = 'manage_lost_orders';

    /**
     * @var string
     * Gives access to:
     *  - List of broker applications
     *    https://developers.admitad.com/hc/en-us/articles/7930562954641#list-of-broker-applications
     */
    public const SCOPE_BROKER_APPLICATION = 'broker_application';

    /**
     * @var string
     * Gives access to:
     *  - Creating broker applications
     *    https://developers.admitad.com/hc/en-us/articles/7930562954641#creating-broker-applications
     */
    public const SCOPE_MANAGE_BROKER_APPLICATION = 'manage_broker_application';

    /** @var string
     * Gives access to:
     *  - Calculation of the reward for AliExpress products
     *    https://developers.admitad.com/hc/en-us/articles/7930627976849-AliExpress
     */
    public const SCOPE_ALIEXPRESS_COMMISSION = 'aliexpress_commission';

    /**
     * @var string
     * Gives access to:
     *  - Receiving the list of active or scheduled vendor bonuses
     *    https://developers.admitad.com/hc/en-us/articles/7930626636049-Vendor-bonuses
     */
    public const SCOPE_VENDOR_TOOL = 'vendor_tool';

    /**
     * @var string
     * Gives access to:
     *  - URL shortener
     *    https://developers.admitad.com/hc/en-us/articles/7930589315601-URL-shortener
     */
    public const SCOPE_URL_SHORTENER = 'short_link';

    /**
     * @var string
     * Gives access to:
     *  - Receiving notification list
     *    https://developers.admitad.com/hc/en-us/articles/7930641299601-Notifications#receiving-notification-list
     */
    public const SCOPE_WEB_NOTIFICATOR = 'web_notificator';

    public array $scopes = [];


    public function __construct(string|array $scopes = [])
    {
        if ($scopes === self::ALL_SCOPES) {
            $scopes = self::getConstantsWithPrefix('SCOPE_');
        }
        $this->setScopes($scopes);
    }


    public function setScopes(array $scopes): void
    {
        $this->scopes = array_map(function ($scope) {
            if (!in_array($scope, self::getConstantsWithPrefix('SCOPE_'))) {
                throw new \InvalidArgumentException("Scope {$scope} is not valid");
            }
            return $scope;
        }, $scopes);
    }


    public function getScopes(): string
    {
        return implode(chr(32), $this->scopes);
    }
}