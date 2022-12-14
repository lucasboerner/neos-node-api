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
     * @param Node $node
     * @return string
     * @throws \Exception
     */
    private function renderNode(Node $node): string
    {
        $fusionView = new FusionView();
        $fusionView->setControllerContext($this->controllerContext);
        $fusionView->assign('value', $node);
        $fusionView->setFusionPath('/<Neos.Neos:ContentCase>');

        return $fusionView->render();
    }

    /**
     * Returns the rendered html of node
     *
     * @param Node $node pass a node by passing the path: /sites/ujamii-projectpackage/main/node-w7tgzk3629x1p/node-7iftmxgfebsx5/node-0o8m6864vj54s
     * @throws \Exception
     */
    public function renderAction(Node $node): void
    {
        $this->view->assign('value', [
            'node' => $node->findNodePath(),
            'html' => $this->renderNode($node),
        ]);
    }

    /**
     * Returns the properties of a node
     *
     * @param Node $node pass a node by passing the path: /sites/ujamii-projectpackage/main/node-w7tgzk3629x1p/node-7iftmxgfebsx5/node-0o8m6864vj54s
     * @throws \Neos\ContentRepository\Exception\NodeException
     * @throws \Neos\ContentRepository\Exception\NodeTypeNotFoundException
     * @throws \Neos\Flow\Property\Exception
     * @throws \Neos\Flow\Security\Exception
     */
    public function propertiesAction(Node $node): void
    {
        $properties = $node->getProperties(true);

        $this->view->assign('value', [
            'node' => $node->findNodePath(),
            'properties' => $properties,
        ]);
    }

    /**
     * @param \Neos\ContentRepository\Domain\Model\Node $node
     * @param int $offset how many nodes should be cut away at the beginning
     * @param int $length how many nodes should be rendered
     * @throws \Exception
     */
    public function renderChildrenAction(Node $node, int $offset = 0, int $length = 10): void
    {
        $children = $node->findChildNodes();

        $children = array_slice($children->toArray(), $offset, $length);

        $result = [];

        foreach ($children as $child) {
            $result[$child->findNodePath()->jsonSerialize()] = $this->renderNode($child);
        }

        $this->view->assign('value', [
            'node' => $node->findNodePath(),
            'children' => $result
        ]);
    }
}
