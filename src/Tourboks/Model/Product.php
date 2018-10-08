<?php

namespace Tourboks\Model;

use Tourboks\Url\TourboksUrlManipulator;

class Product
{

    private $_productId;

    private $_difficulty;

    private $_targetGroup;

    private $_isBirthdateRequired;

    private $_startDate;

    private $_endDate;

    private $_startTime;

    private $_duration;

    private $_schedule;

    private $_pricingCategory;

    private $_pricingSubCategory;

    private $_minimumCapacity;

    private $_maximumCapacity;

    private $_exactDate;

    private $_isNameRequired;

    private $_bookingLeadTimeMin;

    private $_bookingLeadTimeMax;

    private $_isIdRequired;

    private $_postCode;

    private $_latitude;

    private $_longitude;

    private $_zoom;

    private $_hasDisabledAccess;

    private $_productStatus;

    private $_city;

    private $_country;

    private $_isBestSeller;

    private $_productUrl;

    private $_hasHotelPickUp;

    private $_supplier;

    private $_reviews;

    private $_categories;

    private $_orderItems;

    private $_variants;

    private $_blockOutDates;

    private $_media;

    private $_wayPoints;

    private $_cancellationPolicy;

    private $_availableServices;

    private $_timeslots;

    private $_pricingSeasons;

    private $_pricings;

    private $_productSchedule;

    private $_extras;

    private $_liveGuides;

    private $_title;

    private $_overview;

    private $_highlights;

    private $_inclusions;

    private $_exclusions;

    private $_itinerary;

    private $_notes;

    private $_gettingThere;

    private $_address;

    private $_timezone;

    private $_persons;

    private $_source;

    private $_isTourboks;

    private $_shortDescription;

    private $_onlinePrice;

    private $_retailPrice;

    private $_netPrice;

    private $_distance;

    private $_rating;

    private $_hasConfirmation;


    function __construct($product)
    {
        $this->setProductId($product['id']);
        $this->setShortDescription($product['shortDescription']);
        $this->setOnlinePrice($product['onlinePrice']);
        $this->setRetailPrice($product['retailPrice']);
        $this->setNetPrice($product['netPrice']);

        $this->setProductStatus($product['hasConfirmation']);
        $this->setProductStatus($product['productStatus']);
        $this->setLatitude($product['latitude']);
        $this->setLongitude($product['longitude']);
        $this->setZoom($product["zoom"]);
        $this->setProductUrl($product["seoUrl"]);
        $this->setStartDate($product["startDate"]);
        $this->setEndDate($product["endDate"]);
        $this->setStartTime($product["startTime"]);
        if ($product["timeslots"] && count($product["timeslots"]) > 0 ) {
            $timeslots = [];
            foreach ($product["timeslots"] as $timeslot) {
                $timeslots[] = new Timeslot($timeslot);
            }
            $this->setTimeslots($timeslots);
        }
        if ($product["pricingSeasons"] && count($product["pricingSeasons"]) > 0 ) {
            $pricingSeasons = [];
            foreach ($product["pricingSeasons"] as $pricingSeason) {
                $pricingSeasons[] = new PricingSeason($pricingSeason);
            }
            $this->setPricingSeasons($pricingSeasons);
        }
        if ($product["pricings"] && count($product["pricings"]) > 0 ) {
            $pricings = [];
            foreach ($product["pricings"] as $pricing) {
                $pricings[] = new Pricing($pricing);
            }
            $this->setPricings($pricings);
        }
        $this->setPostCode($product["postCode"]);
        $this->setDuration($product["duration"]);
        $this->setMinimumCapacity($product["minimumCapacity"]);
        $this->setMaximumCapacity($product["maximumCapacity"]);
        $this->setExactDate($product["exactDate"]);
        $this->setDifficulty($product["difficulty"]);
        $this->setBookingLeadTimeMin($product["bookingLeadTimeMin"]);
        $this->setBookingLeadTimeMax($product["bookingLeadTimeMax"]);
        $this->setIsBestSeller($product["isBestSeller"]);
        $this->setIsBirthdateRequired($product["isBirthdateRequired"]);
        $this->setIsIdRequired($product["isIdRequired"]);
        $this->setHasHotelPickUp($product["hasHotelPickup"]);
        $this->setIsNameRequired($product["isNameRequired"]);
        $this->setPricingCategory($product["category"]);
        $this->setPricingSubCategory($product["subCategory"]);
        if ($product["schedule"] && count($product["schedule"]) > 0 ) {
            $schedules = [];
            foreach ($product["schedule"] as $schedule) {
                $schedules[] = new Schedule($schedule);
            }
            $this->setSchedule($schedules);
        }
        if ($product["variants"] && count($product["variants"]) > 0 ) {
            $variants = [];
            foreach ($product["variants"] as $variant) {
                $variants[] = new Variant($variant);
            }
            $this->setVariants($variants);
        }
        if ($product["extras"] && count($product["extras"]) > 0 ) {
            $extras = [];
            foreach ($product["extras"] as $extra) {
                $extras[] = new Extra($extra);
            }
            $this->setExtras($extras);
        }
        if ($product["blockOutDates"] && count($product["blockOutDates"]) > 0 ) {
            $blockOutDates = [];
            foreach ($product["blockOutDates"] as $blockOutDate) {
                $blockOutDates[] = new BlockOutDate($blockOutDate);
            }
            $this->setBlockOutDates($blockOutDates);
        }
        if ($product["media"] && count($product["media"]) > 0 ) {
            $medias = [];
            foreach ($product["media"] as $media) {
                $medias[] = new Media($media);
            }
            $this->setMedia($medias);
        }
        if ($product["waypoints"] && count($product["waypoints"]) > 0 ) {
            $waypoints = [];
            foreach ($product["waypoints"] as $waypoint) {
                $waypoints[] = new Waypoint($waypoint);
            }
            $this->setWayPoints($waypoints);
        }
        if ($product["cancellationPolicy"] && count($product["cancellationPolicy"]) > 0 ) {
            $cancellationPolicies = [];
            foreach ($product["cancellationPolicy"] as $cancellationPolicy) {
                $cancellationPolicies[] = new CancellationPolicy($cancellationPolicy);
            }
            $this->setCancellationPolicy($cancellationPolicies);
        }
        if ($product["availableServices"] && count($product["availableServices"]) > 0 ) {
            $availableServices = [];
            foreach ($product["availableServices"] as $availableService) {
                $availableServices[] = new AvailableService($availableService);
            }
            $this->setAvailableServices($availableServices);
        }
        if ($product["liveGuides"] && count($product["liveGuides"]) > 0 ) {
            $liveGuides = [];
            foreach ($product["liveGuides"] as $liveGuide) {
                $liveGuides[] = new LiveGuide($liveGuide);
            }
            $this->setLiveGuides($liveGuides);
        }
        $this->setHasDisabledAccess($product["hasDisabledAccess"]);
        $this->setTargetGroup($product["targetGroup"]);
        $this->setTitle($product["title"]);
        $this->setOverview($product["overview"]);
        $this->setHighlights($product["highlights"]);
        $this->setInclusions($product["inclusion"]);
        $this->setExclusions($product["exclusion"]);
        $this->setItinerary($product["itinarery"]);
        $this->setGettingThere($product["gettingThere"]);
        $this->setNotes($product["notes"]);
        $this->setAddress($product["address"]);
        $this->setTimezone($product["timezone"]);
        $this->setCity($product["city"]);
        $this->setCountry($product["country"]);
        if (($product["categories"] && count($product["categories"]) > 0) || ($product["cats"] && count($product["cats"]) > 0)) {
            $productCategories = $product["categories"] ?: $product["cats"];
            $categories = [];
            foreach ($productCategories as $category) {
                $categories[] = new Category($category);
            }
            $this->setCategories($categories);
        }
        if ($product["persons"] && count($product["persons"]) > 0 ) {
            $persons = [];
            foreach ($product["persons"] as $person) {
                $persons[] = new Person($person);
            }
            $this->setPersons($persons);
        }
        if ($product["persons"] && count($product["persons"]) > 0 ) {
            $reviews = [];
            foreach ($product["reviews"] as $review) {
                $reviews[] = new Review($review);
            }
            $this->setReviews($reviews);
        }
        $this->setSource($product["source"]);
        $this->setIsTourboks($product["isTourboks"]);
        $this->setDistance($product["distance"]);
        $this->setRating($product["rating"]);
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->_productId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->_productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getDifficulty()
    {
        return $this->_difficulty;
    }

    /**
     * @param mixed $difficulty
     */
    public function setDifficulty($difficulty)
    {
        $this->_difficulty = $difficulty;
    }

    /**
     * @return mixed
     */
    public function getTargetGroup()
    {
        return $this->_targetGroup;
    }

    /**
     * @param mixed $targetGroup
     */
    public function setTargetGroup($targetGroup)
    {
        $this->_targetGroup = $targetGroup;
    }

    /**
     * @return mixed
     */
    public function getIsBirthdateRequired()
    {
        return $this->_isBirthdateRequired;
    }

    /**
     * @param mixed $isBirthdateRequired
     */
    public function setIsBirthdateRequired($isBirthdateRequired)
    {
        $this->_isBirthdateRequired = $isBirthdateRequired;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->_startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->_startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->_endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->_endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->_startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime)
    {
        $this->_startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->_duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->_duration = $duration;
    }

    /**
     * @return \Tourboks\Model\Schedule[]
     */
    public function getSchedule()
    {
        return $this->_schedule;
    }

    /**
     * @param mixed $schedule
     */
    public function setSchedule($schedule)
    {
        $this->_schedule = $schedule;
    }

    /**
     * @return mixed
     */
    public function getPricingCategory()
    {
        return $this->_pricingCategory;
    }

    /**
     * @param mixed $pricingCategory
     */
    public function setPricingCategory($pricingCategory)
    {
        $this->_pricingCategory = $pricingCategory;
    }

    /**
     * @return mixed
     */
    public function getPricingSubCategory()
    {
        return $this->_pricingSubCategory;
    }

    /**
     * @param mixed $pricingSubCategory
     */
    public function setPricingSubCategory($pricingSubCategory)
    {
        $this->_pricingSubCategory = $pricingSubCategory;
    }

    /**
     * @return mixed
     */
    public function getMinimumCapacity()
    {
        return $this->_minimumCapacity;
    }

    /**
     * @param mixed $minimumCapacity
     */
    public function setMinimumCapacity($minimumCapacity)
    {
        $this->_minimumCapacity = $minimumCapacity;
    }

    /**
     * @return mixed
     */
    public function getMaximumCapacity()
    {
        return $this->_maximumCapacity;
    }

    /**
     * @param mixed $maximumCapacity
     */
    public function setMaximumCapacity($maximumCapacity)
    {
        $this->_maximumCapacity = $maximumCapacity;
    }

    /**
     * @return mixed
     */
    public function getExactDate()
    {
        return $this->_exactDate;
    }

    /**
     * @param mixed $exactDate
     */
    public function setExactDate($exactDate)
    {
        $this->_exactDate = $exactDate;
    }

    /**
     * @return mixed
     */
    public function getIsNameRequired()
    {
        return $this->_isNameRequired;
    }

    /**
     * @param mixed $isNameRequired
     */
    public function setIsNameRequired($isNameRequired)
    {
        $this->_isNameRequired = $isNameRequired;
    }

    /**
     * @return mixed
     */
    public function getBookingLeadTimeMin()
    {
        return $this->_bookingLeadTimeMin;
    }

    /**
     * @param mixed $bookingLeadTimeMin
     */
    public function setBookingLeadTimeMin($bookingLeadTimeMin)
    {
        $this->_bookingLeadTimeMin = $bookingLeadTimeMin;
    }

    /**
     * @return mixed
     */
    public function getBookingLeadTimeMax()
    {
        return $this->_bookingLeadTimeMax;
    }

    /**
     * @param mixed $bookingLeadTimeMax
     */
    public function setBookingLeadTimeMax($bookingLeadTimeMax)
    {
        $this->_bookingLeadTimeMax = $bookingLeadTimeMax;
    }

    /**
     * @return mixed
     */
    public function getisIdRequired()
    {
        return $this->_isIdRequired;
    }

    /**
     * @param mixed $isIdRequired
     */
    public function setIsIdRequired($isIdRequired)
    {
        $this->_isIdRequired = $isIdRequired;
    }

    /**
     * @return mixed
     */
    public function getPostCode()
    {
        return $this->_postCode;
    }

    /**
     * @param mixed $postCode
     */
    public function setPostCode($postCode)
    {
        $this->_postCode = $postCode;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->_latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->_latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->_longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->_longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getZoom()
    {
        return $this->_zoom;
    }

    /**
     * @param mixed $zoom
     */
    public function setZoom($zoom)
    {
        $this->_zoom = $zoom;
    }

    /**
     * @return mixed
     */
    public function getHasDisabledAccess()
    {
        return $this->_hasDisabledAccess;
    }

    /**
     * @param mixed $hasDisabledAccess
     */
    public function setHasDisabledAccess($hasDisabledAccess)
    {
        $this->_hasDisabledAccess = $hasDisabledAccess;
    }

    /**
     * @return mixed
     */
    public function getProductStatus()
    {
        return $this->_productStatus;
    }

    /**
     * @param mixed $productStatus
     */
    public function setProductStatus($productStatus)
    {
        $this->_productStatus = $productStatus;
    }

    /**
     * @return int
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @param int $city
     */
    public function setCity($city)
    {
        $this->_city = $city;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->_country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->_country = $country;
    }

    /**
     * @return mixed
     */
    public function getisBestSeller()
    {
        return $this->_isBestSeller;
    }

    /**
     * @param mixed $isBestSeller
     */
    public function setIsBestSeller($isBestSeller)
    {
        $this->_isBestSeller = $isBestSeller;
    }

    /**
     * @return mixed
     */
    public function getProductUrl()
    {
        return $this->_productUrl;
    }

    /**
     * @param mixed $productUrl
     */
    public function setProductUrl($productUrl)
    {
        $this->_productUrl = $productUrl;
    }

    /**
     * @return mixed
     */
    public function getHasHotelPickUp()
    {
        return $this->_hasHotelPickUp;
    }

    /**
     * @param mixed $hasHotelPickUp
     */
    public function setHasHotelPickUp($hasHotelPickUp)
    {
        $this->_hasHotelPickUp = $hasHotelPickUp;
    }

    /**
     * @return mixed
     */
    public function getSupplier()
    {
        return $this->_supplier;
    }

    /**
     * @param mixed $supplier
     */
    public function setSupplier($supplier)
    {
        $this->_supplier = $supplier;
    }

    /**
     * @return mixed
     */
    public function getReviews()
    {
        return $this->_reviews;
    }

    /**
     * @param mixed $reviews
     */
    public function setReviews($reviews)
    {
        $this->_reviews = $reviews;
    }

    /**
     * @return \Tourboks\Model\Category[]
     */
    public function getCategories()
    {
        return $this->_categories;
    }

    /**
     * @param mixed $categories
     */
    public function setCategories($categories)
    {
        $this->_categories = $categories;
    }

    /**
     * @return mixed
     */
    public function getOrderItems()
    {
        return $this->_orderItems;
    }

    /**
     * @param mixed $orderItems
     */
    public function setOrderItems($orderItems)
    {
        $this->_orderItems = $orderItems;
    }

    /**
     * @return \Tourboks\Model\Variant[]
     */
    public function getVariants()
    {
        return $this->_variants;
    }

    /**
     * @param mixed $variants
     */
    public function setVariants($variants)
    {
        $this->_variants = $variants;
    }

    public function getBlockOutDates()
    {
        return $this->_blockOutDates;
    }

    /**
     * @param mixed $blockOutDates
     */
    public function setBlockOutDates($blockOutDates)
    {
        $this->_blockOutDates = $blockOutDates;
    }

    /**
     * @return \Tourboks\Model\Media[]
     */
    public function getMedia()
    {
        return $this->_media;
    }

    /**
     * @param mixed $media
     */
    public function setMedia($media)
    {
        $this->_media = $media;
    }

    /**
     * @return \Tourboks\Model\Waypoint[]
     */
    public function getWayPoints()
    {
        return $this->_wayPoints;
    }

    /**
     * @param mixed $wayPoints
     */
    public function setWayPoints($wayPoints)
    {
        $this->_wayPoints = $wayPoints;
    }

    /**
     * @return \Tourboks\Model\CancellationPolicy[]
     */
    public function getCancellationPolicy()
    {
        return $this->_cancellationPolicy;
    }

    /**
     * @param mixed $cancellationPolicy
     */
    public function setCancellationPolicy($cancellationPolicy)
    {
        $this->_cancellationPolicy = $cancellationPolicy;
    }

    /**
     * @return \Tourboks\Model\AvailableService[]
     */
    public function getAvailableServices()
    {
        return $this->_availableServices;
    }

    /**
     * @param mixed $availableServices
     */
    public function setAvailableServices($availableServices)
    {
        $this->_availableServices = $availableServices;
    }

    /**
     * @return \Tourboks\Model\Timeslot[]
     */
    public function getTimeslots()
    {
        return $this->_timeslots;
    }

    /**
     * @param mixed $timeslots
     */
    public function setTimeslots($timeslots)
    {
        $this->_timeslots = $timeslots;
    }

    /**
     * @return \Tourboks\Model\PricingSeason[]
     */
    public function getPricingSeasons()
    {
        return $this->_pricingSeasons;
    }

    /**
     * @param mixed $pricingSeasons
     */
    public function setPricingSeasons($pricingSeasons)
    {
        $this->_pricingSeasons = $pricingSeasons;
    }

    /**
     * @return \Tourboks\Model\Pricing[]
     */
    public function getPricings()
    {
        return $this->_pricings;
    }

    /**
     * @param mixed $pricings
     */
    public function setPricings($pricings)
    {
        $this->_pricings = $pricings;
    }

    /**
     * @return mixed
     */
    public function getProductSchedule()
    {
        return $this->_productSchedule;
    }

    /**
     * @param mixed $productSchedule
     */
    public function setProductSchedule($productSchedule)
    {
        $this->_productSchedule = $productSchedule;
    }

    /**
     * @return mixed
     */
    public function getExtras()
    {
        return $this->_extras;
    }

    /**
     * @param mixed $extras
     */
    public function setExtras($extras)
    {
        $this->_extras = $extras;
    }

    /**
     * @return \Tourboks\Model\LiveGuide[]
     */
    public function getLiveGuides()
    {
        return $this->_liveGuides;
    }

    /**
     * @param mixed $liveGuides
     */
    public function setLiveGuides($liveGuides)
    {
        $this->_liveGuides = $liveGuides;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * @return mixed
     */
    public function getOverview()
    {
        return $this->_overview;
    }

    /**
     * @param mixed $overview
     */
    public function setOverview($overview)
    {
        $this->_overview = $overview;
    }

    /**
     * @return mixed
     */
    public function getHighlights()
    {
        return $this->_highlights;
    }

    /**
     * @param mixed $highlights
     */
    public function setHighlights($highlights)
    {
        $this->_highlights = $highlights;
    }

    /**
     * @return mixed
     */
    public function getInclusions()
    {
        return $this->_inclusions;
    }

    /**
     * @param mixed $inclusions
     */
    public function setInclusions($inclusions)
    {
        $this->_inclusions = $inclusions;
    }

    /**
     * @return mixed
     */
    public function getExclusions()
    {
        return $this->_exclusions;
    }

    /**
     * @param mixed $exclusions
     */
    public function setExclusions($exclusions)
    {
        $this->_exclusions = $exclusions;
    }

    /**
     * @return mixed
     */
    public function getItinerary()
    {
        return $this->_itinerary;
    }

    /**
     * @param mixed $itinerary
     */
    public function setItinerary($itinerary)
    {
        $this->_itinerary = $itinerary;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->_notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes)
    {
        $this->_notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getGettingThere()
    {
        return $this->_gettingThere;
    }

    /**
     * @param mixed $gettingThere
     */
    public function setGettingThere($gettingThere)
    {
        $this->_gettingThere = $gettingThere;
    }


    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->_address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->_address = $address;
    }

    /**
     * @return mixed
     */
    public function getTimezone()
    {
        return $this->_timezone;
    }

    /**
     * @param mixed $timezone
     */
    public function setTimezone($timezone)
    {
        $this->_timezone = $timezone;
    }

    /**
     * @return \Tourboks\Model\Person[]
     */
    public function getPersons()
    {
        return $this->_persons;
    }

    /**
     * @param mixed $persons
     */
    public function setPersons($persons)
    {
        $this->_persons = $persons;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->_source;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->_source = $source;
    }

    /**
     * @return mixed
     */
    public function getIsTourboks()
    {
        return $this->_isTourboks;
    }

    /**
     * @param mixed $isTourboks
     */
    public function setIsTourboks($isTourboks)
    {
        $this->_isTourboks = $isTourboks;
    }

    /**
     * @return mixed
     */
    public function getShortDescription()
    {
        return $this->_shortDescription;
    }

    /**
     * @param mixed $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->_shortDescription = $shortDescription;
    }

    /**
     * @return mixed
     */
    public function getOnlinePrice()
    {
        return $this->_onlinePrice;
    }

    /**
     * @param mixed $onlinePrice
     */
    public function setOnlinePrice($onlinePrice)
    {
        $this->_onlinePrice = $onlinePrice;
    }

    /**
     * @return mixed
     */
    public function getRetailPrice()
    {
        return $this->_retailPrice;
    }

    /**
     * @param mixed $retailPrice
     */
    public function setRetailPrice($retailPrice)
    {
        $this->_retailPrice = $retailPrice;
    }

    /**
     * @return mixed
     */
    public function getNetPrice()
    {
        return $this->_netPrice;
    }

    /**
     * @param mixed $netPrice
     */
    public function setNetPrice($netPrice)
    {
        $this->_netPrice = $netPrice;
    }

    /**
     * @return mixed
     */
    public function getDistance()
    {
        return $this->_distance;
    }

    /**
     * @param mixed $distance
     */
    public function setDistance($distance)
    {
        $this->_distance = $distance;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->_rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->_rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getHasConfirmation()
    {
        return $this->_hasConfirmation;
    }

    /**
     * @param mixed $hasConfirmation
     */
    public function setHasConfirmation($hasConfirmation)
    {
        $this->_hasConfirmation = $hasConfirmation;
    }
}