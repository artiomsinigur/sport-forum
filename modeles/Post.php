<?php


use MongoDB\BSON\Timestamp;

class Post {
    private $post_id;
    private $post_text;
    private $post_published;
    private $member_pseudo;
    private $topic_id;

    public function __construct($post_id = 0, $post_text = "", $post_published = null, $member_pseudo = "", $topic_id = 0)
    {
        $this->post_id = $post_id;
        $this->post_text = $post_text;
        $this->post_published = $post_published;
        $this->member_pseudo = $member_pseudo;
        $this->topic_id = $topic_id;
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->post_id;
    }

    /**
     * @param int $post_id
     * @return Post
     */
    public function setPostId(int $post_id): Post
    {
        $this->post_id = $post_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostText(): string
    {
        return $this->post_text;
    }

    /**
     * @param string $post_text
     * @return Post
     */
    public function setPostText(string $post_text): Post
    {
        $this->post_text = $post_text;
        return $this;
    }

    /**
     * @return null
     */
    public function getPostPublished()
    {
        return $this->post_published;
    }

    /**
     * @param null $post_published
     * @return Post
     */
    public function setPostPublished($post_published)
    {
        $this->post_published = $post_published;
        return $this;
    }

    /**
     * @return string
     */
    public function getMemberPseudo(): string
    {
        return $this->member_pseudo;
    }

    /**
     * @param string $member_pseudo
     * @return Post
     */
    public function setMemberPseudo(string $member_pseudo): Post
    {
        $this->member_pseudo = $member_pseudo;
        return $this;
    }

    /**
     * @return int
     */
    public function getTopicId(): int
    {
        return $this->topic_id;
    }

    /**
     * @param int $topic_id
     * @return Post
     */
    public function setTopicId(int $topic_id): Post
    {
        $this->topic_id = $topic_id;
        return $this;
    }
}