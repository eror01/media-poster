<?php 
$skillsArr = array('react', 'css', 'HTML', 'SQL', 'Marketing', 'Marketing Strategy', 'Communication', 'java');
if(isset($_POST['ui-skills-submit'])) {
  $ui_skills      = $_POST['ui-skills'];
  $ui_json        = json_encode($ui_skills);
  $user->saveUserInfoSkills($ui_json,$userID);
}
$skillArrSingle = json_decode($user->userInfo->userInfoSkills, true);
?>
<div class="user-skills shadow-sm mb-2 bg-body rounded">
  <h2>Skills</h2>
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userInfoSkills"><i class="fa-solid fa-plus"></i></button>
  <div class="user-skills_display">
    <ul>
      <?php foreach($skillArrSingle as $skillSingle) : ?>
        <li>
          <i class="fa-solid fa-clipboard-check"></i>
          <h4><?php echo $skillSingle; ?></h4>
          <!-- <a href=""><i class="fa-regular fa-thumbs-up"></i></a> -->
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

<div class="modal user-info-modal fade" id="userInfoSkills" tabindex="-1" aria-labelledby="userInfoSkills" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-content-close">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="user-info-form">
        <form action="" method="POSt">
          <select class="user-info-skills" multiple="multiple" name="ui-skills[]">
            <option></option>
            <option value="css">CSS</option>
            <option value="react">React</option>
            <option value="hmtl">HTML</option>
            <option value="java">Java</option>
            <option value="sql">SQL</option>
            <option value="php">PHP</option>
            <option value="laravel">Laravel</option>
            <option value="javascript">Javascript</option>
            <option value="marketing">Marketing</option>
            <option value="marketing strategy">Marketing Strategy</option>
            <option value="communication">Communication</option>
            <option value="strategic communications">Strategic Communications</option>
          </select>
          <div class="user-skills-title">
            <p>Some of skills that you can chose</p>
          </div>
          <div class="ui-skills_showcase rounded">
            <?php foreach( $skillsArr as $skill ) { echo "<span class='ui-skill_buble'>{$skill}</span>"; } ?>
          </div>
          <div class="user-info-submit-container">
            <input type="submit" value="Confirm" name="ui-skills-submit" class="btn btn-success w-50">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>