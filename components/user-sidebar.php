<div class="user-connections shadow-sm p-3 mb-2 bg-body rounded">
  People You May Know
</div>
<?php if($user_info_company == 0 ) : ?>
  <div class="user-company shadow-sm p-3 bg-body rounded">
    <p>Create Your <a href="company">Company Page</a></p>
  </div>
<?php else : ?>
  <div class="user-company shadow-sm p-3 bg-body rounded">
    <p>View Your <a href="company-page?page-id=<?php echo $companyId; ?>">Company Page</a></p>
  </div>
<?php endif; ?>