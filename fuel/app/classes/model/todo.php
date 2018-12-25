<?php
class Model_Todo extends Orm\Model {
  # テーブルに定義したすべての列を記述
  protected static $_properties = array('id', 'note', 'created', 'updated');
}