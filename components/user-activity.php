<?php 

var_dump($postContr);
if(isset($_POST['user-create-post'])) {
  $postUserId       = $user_info_uid;
  $postContent      = validateInput($_POST['user-post-text']);
  $postVisibility   = $_POST['user-post-privacy'];
  $postTopic        = $_POST['user-post-topic'];
  $postImage        = $_FILES['user-post-img']['name'];
  $postImageTemp    = $_FILES['user-post-img']['tmp_name'];
  move_uploaded_file($postImageTemp, "./images/$postImage");
  $postContr->savePost($postUserId, $postImage, $postContent, $postTopic, $postVisibility);
}

?>
<div class="user-activity shadow-sm mb-2 bg-body rounded">
  <div class="user-activity-top">
    <h2>Activity</h2>
    <small>650 connections</small>
    <!-- if no posts it will say you haven't posted lately
    Recent posts you share or comment on will be displayed here(likes, comments, reactions) -->
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userActivityPost">Start a post</button>
  </div>
  <div class="user-activity-middle">
    <!-- <h3>You haven't posted lately</h3>
    <small>Recent posts you share or comment on will be displayed here</small> -->
    <div class="user-activity-post">
      <div class="user-activity-post-box">
        <div class="user-activity-post-img">
          <img src="" alt="Post Image">
        </div>
        <div class="user-activity-post-details">
          <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
        </div>
      </div>
      <div class="user-activity-post-likes"><i class="fa-solid fa-thumbs-up"></i>19</span></div>
      <div class="user-activity-post-box">
        <div class="user-activity-post-img">
          <img src="" alt="Post Image">
        </div>
        <div class="user-activity-post-details">
          <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
        </div>
      </div>
      <div class="user-activity-post-likes"><i class="fa-solid fa-thumbs-up"></i>19</span></div>
      <div class="user-activity-post-box">
        <div class="user-activity-post-img">
          <img src="" alt="Post Image">
        </div>
        <div class="user-activity-post-details">
          <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
        </div>
      </div>
      <div class="user-activity-post-likes"><i class="fa-solid fa-thumbs-up"></i>19</span></div>
    </div>

  </div>
  <div class="user-activity-page">
    <a href="">Show all Activity <i class="fa-solid fa-arrow-right-long"></i></a>
    <p>Leads to post activity page such as post_activity?user-id=26 e.g</p>
  </div>
</div>

<div class="modal user-create-post fade" id="userActivityPost" tabindex="-1" aria-labelledby="userActivityPost" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-content-close">
        <h2>Create a post</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="user-post-profile">
          <img src="./images/<?php echo $user_info_avatar; ?>" alt="">
          <div>
            <h3><?php echo $username; ?></h3>
            <select name="user-post-privacy" id="user-activity-post-privacy">
              <option value="anyone" selected>Anyone</option>
              <option value="connections">Connections</option>
            </select>
          </div>
        </div>
        <div class="user-post-content">
          <textarea id="user-post-text" placeholder="What do you want to talk about?" name="user-post-text"></textarea>
          <input type="text" name="user-post-topic" class="user-post-topic">
          <img src="" id="user-post-content-img">
        </div>
        <div class="user-post-buttons">
          <a class="user-post-button" id="user-post-hash-button">
            <i class="fa-regular fa-hashtag"></i>
            Add Topic 
          </a>
          <a class="user-post-button" onClick="triggerClickPostImg()">
            <i class="fa-solid fa-image"></i>
            Choose an image
          </a>
          <input type="file" id="postImage" style="display: none;" name="user-post-img" accept="image/png, image/jpeg" onchange="displayPostImage(this)">
          <div class="user-post-button">
            <input type="submit" value="Post" name="user-create-post" class="btn btn-primary">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>