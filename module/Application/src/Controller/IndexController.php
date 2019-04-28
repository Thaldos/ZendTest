<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Cache\Storage\Adapter\Filesystem;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        // Get Zend cache service :
        $cache = new Filesystem();

        // Get visites by days :
        $hits = json_decode($cache->getItem('visitesbydays'), true);

        return new ViewModel([
            'hits' => $hits,
        ]);
    }
}
