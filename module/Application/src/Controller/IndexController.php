<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $hits = [];

        // Get numbers of lines by day :
        $contentJson = file_get_contents($fileName);
        if ($contentJson !== false) {
            $content = json_decode($contentJson, true);
            if (empty($content)) {
                $hits = $content;
            }
        }

        return new ViewModel(
            [
                'hits' => $hits,
            ]
        );
    }
}
