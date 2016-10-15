<?php

namespace AppBundle\Model;

class Paginator
{

    private $itemsCount;
    private $itemsPerPage;
    private $actualPage;

    function __construct($itemsCount, $itemsPerPage, $page)
    {
        $this->itemsCount = $itemsCount;
        $this->itemsPerPage = $itemsPerPage;
        $this->actualPage = (Int) $page;
    }

    public function getItemsCount()
    {
        return $this->itemsCount;
    }

    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    public function getActualPage()
    {
        return $this->actualPage;
    }

    public function setItemsCount($itemsCount)
    {
        $this->itemsCount = $itemsCount;
    }

    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function setActualPage($page)
    {
        $this->actualPage = $page;
    }

    public function getMaxPageNumber()
    {
        $maxPageNumber = $this->getItemsCount() / $this->getItemsPerPage();
        if ($maxPageNumber == 0)
        {
            $maxPageNumber++;
        }
        $roundMaxPageNumber = ceil($maxPageNumber);
        return $roundMaxPageNumber;
    }

    public function getOffset()
    {
        $offset = ($this->getActualPage() - 1) * $this->getItemsPerPage();
        return $offset;
    }

    public function isFirst()
    {
        if ($this->getActualPage() == 1)
        {
            return true;
        }

        return false;
    }

    public function isLast()
    {
        if ($this->getActualPage() == $this->getMaxPageNumber())
        {
            return true;
        }

        return false;
    }

    public function getDataForTemplate()
    {
        return [
            "maxPageNumber" => $this->getMaxPageNumber(),
            "activePage" => $this->getActualPage(),
            "isFirst" => $this->isFirst(),
            "isLast" => $this->isLast()
        ];
    }

}
