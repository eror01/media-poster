<?php 

class Post extends Db  {
  
  public $postId;
  public $postUserId;
  public $postImage;
  public $postContent;
  public $postLikes;
  public $postComment;
  public $postCommentCount;
  public $postTopic;
  public $postVisibility;
  public $postCreatedAt;

  public function setPostInfo($postId, $postUserId, $postImage, $postContent, $postTopic, $postVisibility, $postCreatedAt) {
    $this->$postId = $postId;
    $this->$postUserId = $postUserId;
    $this->$postImage = $postImage;
    $this->$postContent = $postContent;
    $this->$postTopic = $postTopic;
    $this->$postVisibility = $postVisibility;
    $this->$postCreatedAt = $postCreatedAt;
  }

  public function getPostInfo() {
    return $this->$postId;
    return $this->$postUserId;
    return $this->$postImage;
    return $this->$postContent;
    return $this->$postLikes;
    return $this->$postComment;
    return $this->$postCommentCount;
    return $this->$postTopic;
    return $this->$postVisibility;
    return $this->$postCreatedAt;
  }

  public function createPost($postUserId, $postImage, $postContent, $postTopic, $postVisibility) {
    $stmt = $this->connect()->prepare("
    INSERT INTO post(post_user_id, post_image, post_content, post_topic, post_visibility) VALUES(?,?,?,?, ?);");
    $stmt->execute(array($postUserId, $postImage, $postContent, $postTopic, $postVisibility));
  }

}