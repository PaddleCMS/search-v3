<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\ValueObjects;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

final class Organizer
{
    /**
     * @var string|null
     * @Type("string")
     * @SerializedName("@id")
     */
    private $id;

    /**
     * @var TranslatedString|null
     * @Type("CultuurNet\SearchV3\ValueObjects\TranslatedString")
     */
    private $name;

    /**
     * @var string|null
     * @Type("string")
     */
    private $mainLanguage;

    /**
     * @var string|null
     * @Type("string")
     */
    private $url;

    /**
     * @var string|null
     * @Type("string")
     */
    private $creator;

    /**
     * @var \DateTime|null
     * @Type("DateTime")
     */
    private $created;

    /**
     * @var string|null
     * @Type("string")
     */
    private $workflowStatus;

    /**
     * @var array
     * @Type("array<string>")
     */
    private $languages = [];

    /**
     * @var array
     * @Type("array<string>")
     */
    private $completedLanguages = [];

    /**
     * @var \DateTime|null
     * @Type("DateTime")
     */
    private $modified;

    /**
     * @var array
     * @Type("array<string>")
     */
    private $labels = [];

    /**
     * @var string
     */
    private $email;

    /**
     * @var ContactPoint|null
     * @Type("CultuurNet\SearchV3\ValueObjects\ContactPoint")
     */
    private $contactPoint;

    /**
     * @var string[]
     * @Type("array<string>")
     */
    private $hiddenLabels = [];

    /**
     * @var array
     * @Type("array<string>")
     */
    private $regions = [];

    /**
     * @var string|null
     * @Type("string")
     */
    private $image;

    /**
     * @var TranslatedAddress|null
     * @Type("CultuurNet\SearchV3\ValueObjects\TranslatedAddress")
     */
    private $address;

    /**
     * @var GeoPoint
     * @Type("CultuurNet\SearchV3\ValueObjects\GeoPoint")
     */
    private $geo;

    /**
     * @var TranslatedString|null
     * @Type("CultuurNet\SearchV3\ValueObjects\TranslatedString")
     */
    private $description;

    /**
     * @var array
     * @Type("array<CultuurNet\SearchV3\ValueObjects\MediaObject>")
     */
    private $images = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getCdbid(): ?string
    {
        if (is_null($this->id)) {
            return null;
        }

        $id_parts = explode('/', rtrim($this->id, '/'));
        return end($id_parts);
    }

    public function getName(): ?TranslatedString
    {
        return $this->name;
    }

    public function setName(TranslatedString $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): array
    {
        return $this->email;
    }

    public function setEmail(array $email): void
    {
        $this->email = $email;
    }

    public function getContactPoint(): ?ContactPoint
    {
        return $this->contactPoint;
    }

    public function setContactPoint(ContactPoint $contactPoint): void
    {
        $this->contactPoint = $contactPoint;
    }

    public function getHiddenLabels(): array
    {
        return $this->hiddenLabels;
    }

    public function setHiddenLabels(array $hiddenLabels): void
    {
        $this->hiddenLabels = $hiddenLabels;
    }

    public function getAddress(): ?TranslatedAddress
    {
      return $this->address;
    }

    public function setAddress(TranslatedAddress $address): void
    {
      $this->address = $address;
    }

    public function getGeo(): ?GeoPoint
    {
      return $this->geo;
    }

    public function setGeo(GeoPoint $geo): void
    {
      $this->geo = $geo;
    }

    public function getMainLanguage(): ?string
    {
      return $this->mainLanguage;
    }

    public function setMainLanguage(?string $mainLanguage): void
    {
      $this->mainLanguage = $mainLanguage;
    }

    public function getUrl(): ?string
    {
      return $this->url;
    }

    public function setUrl(?string $url): void
    {
      $this->url = $url;
    }

    public function getCreator(): ?string
    {
      return $this->creator;
    }

    public function setCreator(?string $creator): void
    {
      $this->creator = $creator;
    }

    public function getCreated(): ?\DateTime
    {
      return $this->created;
    }

    public function setCreated(?\DateTime $created): void
    {
      $this->created = $created;
    }

    public function getWorkflowStatus(): ?string
    {
      return $this->workflowStatus;
    }

    public function setWorkflowStatus(?string $workflowStatus): void
    {
      $this->workflowStatus = $workflowStatus;
    }

    public function getLanguages(): array
    {
      return $this->languages;
    }

    public function setLanguages(array $languages): void
    {
      $this->languages = $languages;
    }

    public function getCompletedLanguages(): array
    {
      return $this->completedLanguages;
    }

    public function setCompletedLanguages(array $completedLanguages): void
    {
      $this->completedLanguages = $completedLanguages;
    }

    public function getModified(): ?\DateTime
    {
      return $this->modified;
    }

    public function setModified(?\DateTime $modified): void
    {
      $this->modified = $modified;
    }

    public function getLabels(): array
    {
      return $this->labels;
    }

    public function setLabels(array $labels): void
    {
      $this->labels = $labels;
    }

    public function getRegions(): array
    {
      return $this->regions;
    }

    public function setRegions(array $regions): void
    {
      $this->regions = $regions;
    }

    public function getImage(): ?string
    {
      return $this->image;
    }

    public function setImage(?string $image): void
    {
      $this->image = $image;
    }

    public function getDescription(): ?TranslatedString
    {
      return $this->description;
    }

    public function setDescription(?TranslatedString $description): void
    {
      $this->description = $description;
    }

    public function getImages(): array
    {
      return $this->images;
    }

    public function setImages(array $images): void
    {
      $this->images = $images;
    }
}
