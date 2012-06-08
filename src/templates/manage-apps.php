<div class="manage credentials">

  <?php echo $navigation; ?>
  
  <h3>Your OAuth Applications</h3>
  <p>
    You've granted these applications access to your OpenPhoto account. Clicking <strong>revoke</strong> cannot be undone and you may have to reapprove the application.
  </p>
  <p>
    <a href="/v1/oauth/authorize?oauth_callback=<?php $this->utility->safe(sprintf('%s://%s%s', $this->utility->getProtocol(false), $_SERVER['HTTP_HOST'], '/manage/apps/callback')); ?>&name=<?php $this->utility->safe(urlencode('Self Generated App')); ?>" class="btn btn-primary">Create a new app</a>
  </p>
  <table class="table well">
    <thead>
      <tr>
        <th>Application Name</th>
        <th></th>
      </tr>
    </thead>
    <?php 
      $appCount=0;
      foreach($credentials as $credential) {
      $appCount++;
     ?>
      <tr>
        <td><?php $this->utility->safe($credential['name']); ?></td>
        <td><a href="/oauth/<?php $this->utility->safe($credential['id']); ?>/delete" class="credential-delete-click">Revoke</a></td>
      </tr>
    <?php } 
      if($appCount ==0){?>
      <td>No Apps found</td>
      <?php }
    }?>
  </table>
</div>
