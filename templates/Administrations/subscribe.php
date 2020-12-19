<h1>Subscribe</h1>
<?php echo $this->Form->create($user); ?>
<fieldset>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <?php echo $this->Form->text('email', ['class' => 'form-control', 'id' => 'exampleInputEmail1', 'aria-describedby' => "emailHelp"]) ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <?php echo $this->Form->password('password', ['class' => 'form-control', 'id' => 'exampleInputPassword1']) ?>
  </div>
  <?php echo $this->Form->button('Submit', ['class' => 'btn btn-primary']); ?>
</fieldset>
<?php echo $this->Form->end(); ?>