DROP TABLE IF EXISTS `civicrm_justgiving_fundraising_page`;

-- /*******************************************************
-- *
-- * civicrm_justgiving_fundraising_page
-- *
-- * Justgiving Fundraising Page
-- *
-- *******************************************************/
CREATE TABLE `civicrm_justgiving_fundraising_page` (


     `id` int unsigned NOT NULL AUTO_INCREMENT  COMMENT 'Unique CiviCRM FundraisingPage ID (Mapped to reference)',
     `page_id` int unsigned    COMMENT 'Justgiving Fundraising Page ID',
     `charity_id` int unsigned    COMMENT 'The charityId argument specifies the charity to create the fundraising page for. (Required)',
     `event_id` int unsigned    COMMENT 'The eventId argument specifies the event to create the fundraising page for. This argument must be omitted if an activityType is specified.',
     `page_short_name` varchar(50)    COMMENT 'The pageShortName argument specifies the url you want to assign the new fundraising page. If the short url is available your page will be available at http://www.justgiving.com/{pageShortName} once it is created. (Required)',
     `page_title` varchar(255)    COMMENT 'The pageTitle argument allows you to provide a title for the page. (Required)',
     `activity_type` varchar(50)    COMMENT 'The activityType argument specifies the type of activity the page is for. This argument must be omitted if an eventId is specified. ActivityTypes: Birthday Wedding OtherCelebration InMemory',
     `target_amount` varchar(50)    COMMENT 'The targetAmount argument allows you to specify a target amount to raise. (Optional)',
     `charity_opt_in` int    COMMENT 'The charityOptIn argument allows you to indicate whether the user wishes to opt in to receive communications from the charity the fundraising page is for. (Required)',
     `event_date` timestamp    COMMENT 'The eventDate argument allows you to specify when the event will take place. Required for event activity types (i.e: Birthday, Wedding, OtherCelebration, InMemory).',
     `event_name` varchar(50)    COMMENT 'The eventName argument allows you to specify a name for the event. Required for event activity types (i.e: Birthday, Wedding, OtherCelebration, InMemory).',
     `attribution` varchar(255)    COMMENT 'The attribution argument allows you to specify who the fundraising page is attributed to. Required for occasion, organised event and in-memory activity types (i.e: all except Birthday, Wedding).',
     `charity_funded` int    COMMENT 'The charityFunded argument specifies whether the charity is contributing in some way to the fundraising, which can affect Gift Aid. For more information about how Gift Aid works http://bit.ly/cZfY1R (Required)',
     `cause_id` int unsigned    COMMENT 'The causeId argument specifies the cause you are creating a fundraising page for. (Optional)',
     `company_appeal_id` int unsigned    COMMENT 'The companyAppealId argument specifies the company appeal you are creating a fundraising page for. (Optional)',
     `expiry_date` timestamp    COMMENT 'The date the page should expire. This is ignored if you are creating a fundraising page for a pre-defined event.',
     `page_story` text    COMMENT 'The Page Story.',
     `page_summary_what` varchar(50)    COMMENT 'The \'I\'m doing action X\' part of the fundraising page summary. (Optional). 50 characters max.',
     `page_summary_why` varchar(50)    COMMENT 'The \'reason Z\' part of the fundraising page summary. (Optional). 50 characters max.',
     `team_id` int unsigned    COMMENT 'The teamId argument specifies the team to which the fundraising page will be associated with.',
     `currency` varchar(4)   DEFAULT 'GBP' COMMENT 'Must be a valid ISO currency code. Will default to GBP if omitted. For a list of valid codes, use the Currency API.',
     `error` varchar(512)    COMMENT 'Error message on page creation'
     ,
     PRIMARY KEY (`id`)



)  ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci  ;