<?php

namespace Lucas\NodeApi\Controller;

use Neos\ContentRepository\Domain\Model\Node;
use Neos\Flow\Mvc\Controller\ActionController;
use Neos\Flow\Mvc\View\JsonView;
use Neos\Neos\View\FusionView;

class ApiController extends ActionController
{
    protected $defaultViewObjectName = JsonView::class;

    /**
     * @param Node $node pass nodes by passing the path: /sites/ujamii-projectpackage/main/node-w7tgzk3629x1p/node-7iftmxgfebsx5/node-0o8m6864vj54s
     * @throws \Exception
     */
    public function renderAction(Node $node)
    {
        $fusionView = new FusionView();
        $fusionView->setControllerContext($this->controllerContext);
        $fusionView->assign('value', $node);
        $fusionView->setFusionPath('/<Neos.Neos:ContentCase>');

        $this->view->assign('value', [
            'node' => $node->findNodePath(),
            'html' => $fusionView->render(),
        ]);
    }
}
