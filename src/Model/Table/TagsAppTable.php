<?php
/**
 * Copyright 2009-2014, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2009-2014, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
namespace Tags\Model\Table;

use Cake\ORM\Table;

/**
 * Tags Plugin AppModel
 *
 * @package tags
 */
class TagsAppTable extends Table
{

/**
 * Customized paginateCount method
 *
 * @param array $conditions Query conditions.
 * @param array $extra Extra configuration.
 * @return array
 */
    public function paginateCount($conditions = array(), $extra = array())
    {
        $parameters = compact('conditions');
        if (isset($extra['type']) && isset($this->findMethods[$extra['type']])) {
            $extra['operation'] = 'count';
            return $this->find($extra['type'], array_merge($parameters, $extra));
        } else {
            return $this->find('count', array_merge($parameters, $extra));
        }
    }
}