<?php

namespace ApiPlatform\Demo\Model;

class BooksGetResponse200HydraSearch
{
    /**
     * 
     *
     * @var string
     */
    protected $@type;
    /**
     * 
     *
     * @var string
     */
    protected $hydra:template;
    /**
     * 
     *
     * @var string
     */
    protected $hydra:variableRepresentation;
    /**
     * 
     *
     * @var BooksGetResponse200HydraSearchHydraMappingItem[]
     */
    protected $hydra:mapping;
    /**
     * 
     *
     * @return string
     */
    public function get@type() : string
    {
        return $this->@type;
    }
    /**
     * 
     *
     * @param string $@type
     *
     * @return self
     */
    public function set@type(string $@type) : self
    {
        $this->@type = $@type;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getHydra:template() : string
    {
        return $this->hydra:template;
    }
    /**
     * 
     *
     * @param string $hydra:template
     *
     * @return self
     */
    public function setHydra:template(string $hydra:template) : self
    {
        $this->hydra:template = $hydra:template;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getHydra:variableRepresentation() : string
    {
        return $this->hydra:variableRepresentation;
    }
    /**
     * 
     *
     * @param string $hydra:variableRepresentation
     *
     * @return self
     */
    public function setHydra:variableRepresentation(string $hydra:variableRepresentation) : self
    {
        $this->hydra:variableRepresentation = $hydra:variableRepresentation;
        return $this;
    }
    /**
     * 
     *
     * @return BooksGetResponse200HydraSearchHydraMappingItem[]
     */
    public function getHydra:mapping() : array
    {
        return $this->hydra:mapping;
    }
    /**
     * 
     *
     * @param BooksGetResponse200HydraSearchHydraMappingItem[] $hydra:mapping
     *
     * @return self
     */
    public function setHydra:mapping(array $hydra:mapping) : self
    {
        $this->hydra:mapping = $hydra:mapping;
        return $this;
    }
}