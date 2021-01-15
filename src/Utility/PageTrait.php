<?php

namespace App\Utility;

trait PageTrait
{
    /** @var int */
    protected $page = 1;

    /** @var int */
    protected $perPage = 5;

    public function getPage(): int
    {
        return $this->page ?? 1;
    }

    public function setPage($page): self
    {
        $this->page = (int)$page;
        if ($this->page < 0) {
            $this->page = 1;
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage ?? 5;
    }

    public function setPerPage($perPage): self
    {
        $this->perPage = (int)$perPage;
        if ($this->perPage < 0) {
            $this->perPage = 5;
        }

        return $this;
    }
}