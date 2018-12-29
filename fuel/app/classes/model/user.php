<?php
class Model_User extends Orm\Model {
    protected static $_properties = array('id', 'name', 'password', 'created');
}