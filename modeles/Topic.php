<?php


class Topic {
    private $topic_id;
    private $topic_title;
    private $topic_text;
    private $topic_view;
    private $topic_published;
    private $topic_update_by_post;
    private $cat_id;
    private $member_pseudo;

    public function __construct($topic_id = 0, $topic_title = "", $topic_text = "", $topic_view = 0, $topic_published = null, $topic_update_by_post = null, $cat_id = 0, $member_pseudo = "")
    {
        $this->topic_id = $topic_id;
        $this->topic_title = $topic_title;
        $this->topic_text = $topic_text;
        $this->topic_view = $topic_view;
        $this->topic_published = $topic_published;
        $this->topic_update_by_post = $topic_update_by_post;
        $this->cat_id = $cat_id;
        $this->member_pseudo = $member_pseudo;
    }

    /**
     * @return mixed
     */
    public function getTopicId()
    {
        return $this->topic_id;
    }

    /**
     * @param mixed $topic_id
     * @return Topic
     */
    public function setTopicId($topic_id)
    {
        $this->topic_id = $topic_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTopicTitle()
    {
        return $this->topic_title;
    }

    /**
     * @param mixed $topic_title
     * @return Topic
     */
    public function setTopicTitle($topic_title)
    {
        $this->topic_title = $topic_title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTopicText()
    {
        return $this->topic_text;
    }

    /**
     * @param mixed $topic_text
     * @return Topic
     */
    public function setTopicText($topic_text)
    {
        $this->topic_text = $topic_text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTopicView()
    {
        return $this->topic_view;
    }

    /**
     * @param mixed $topic_view
     * @return Topic
     */
    public function setTopicView($topic_view)
    {
        $this->topic_view = $topic_view;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTopicPublished()
    {
        return $this->topic_published;
    }

    /**
     * @param mixed $topic_published
     * @return Topic
     */
    public function setTopicPublished($topic_published)
    {
        $this->topic_published = $topic_published;
        return $this;
    }

    /**
     * @return null
     */
    public function getTopicUpdateByPost()
    {
        return $this->topic_update_by_post;
    }

    /**
     * @param null $topic_update_by_post
     * @return Topic
     */
    public function setTopicUpdateByPost($topic_update_by_post)
    {
        $this->topic_update_by_post = $topic_update_by_post;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCatId()
    {
        return $this->cat_id;
    }

    /**
     * @param mixed $cat_id
     * @return Topic
     */
    public function setCatId($cat_id)
    {
        $this->cat_id = $cat_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMemberPseudo()
    {
        return $this->member_pseudo;
    }

    /**
     * @param mixed $member_pseudo
     * @return Topic
     */
    public function setMemberPseudo($member_pseudo)
    {
        $this->member_pseudo = $member_pseudo;
        return $this;
    }
}