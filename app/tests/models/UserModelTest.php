<?php

class UserModelTest extends TestCase {

  public function testUsernameIsRequired()
  {
    $user = new User;
    $input = array(
      'name'     => '',
      'password' => 'testpassword'
    );

    $this->assertFalse($user->validate($input));

    $errors = $user->messages();

    $this->assertCount(1, $errors);

    $this->assertEquals($errors[0], 'The name field is required.');
  }
}
