<?php


class Category {
    private $cat_id;
    private $cat_name;
    private $cat_text;
    private $cat_ordre;

    public function __construct($cat_id = 0, $cat_name = "", $cat_text = "", $cat_ordre = 0)
    {
        $this->cat_id = $cat_id;
        $this->cat_name = $cat_name;
        $this->cat_text = $cat_text;
        $this->cat_ordre = $cat_ordre;
    }

    /**
     * @return int
     */
    public function getCatId(): int
    {
        return $this->cat_id;
    }

    /**
     * @param int $cat_id
     * @return Category
     */
    public function setCatId(int $cat_id): Category
    {
        $this->cat_id = $cat_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCatName(): string
    {
        return $this->cat_name;
    }

    /**
     * @param string $cat_name
     * @return Category
     */
    public function setCatName(string $cat_name): Category
    {
        $this->cat_name = $cat_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCatText(): string
    {
        return $this->cat_text;
    }

    /**
     * @param string $cat_text
     * @return Category
     */
    public function setCatText(string $cat_text): Category
    {
        $this->cat_text = $cat_text;
        return $this;
    }

    /**
     * @return int
     */
    public function getCatOrdre(): int
    {
        return $this->cat_ordre;
    }

    /**
     * @param int $cat_ordre
     * @return Category
     */
    public function setCatOrdre(int $cat_ordre): Category
    {
        $this->cat_ordre = $cat_ordre;
        return $this;
    }
}