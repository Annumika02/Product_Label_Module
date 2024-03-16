<?php


namespace Inventionstar\ProductLabel\Controller\Adminhtml\Index;

use Inventionstar\ProductLabel\Model\ProductLabels;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\Session;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;



#[\AllowDynamicProperties]
class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var ProductLabels
     */
    protected $model;

    /**
     * @var Session
     */
    private $session;

    /**
     * @var Registry
     */
    private $_coreRegistry;

    /**
     * Edit constructor.
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     * @param ProductLabels $model
     * @param Session $session
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        ProductLabels $model,
        Session $session
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->model = $model;
        $this->_coreRegistry = $coreRegistry;
        $this->session = $session;
        parent::__construct($context);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $id = $this->getRequest()->getParam('id');

        if ($id) {
            $this->model->load($id);
            if (!$this->model->getData('rule_id')) {
                $this->messageManager->addErrorMessage(__('This rule is no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
            $this->model->getConditions()->setJsFormObject('inventionstar_product_label_form');

        }

        $data=$this->model->getData();

        if (!empty($data)) {
            $this->model->setData($data);
        }

        $this->_coreRegistry->register('inventionstar_ProductLabel', $this->model);

        $resultPage = $this->initPage($resultPage);
        $resultPage->addBreadcrumb(
            $id ? __('Edit Rule') : __('New Rule'),
            $id ? __('Edit Rule') : __('New Rule')
        );
        $resultPage->getConfig()->getTitle()
            ->prepend($this->model->
            getId() ? $this->model->getName() : __('New Rule'));
          return $resultPage;
    }

    /**
     * @param $resultPage
     * @return mixed
     */
    protected function initPage($resultPage)
    {
        $resultPage->setActiveMenu('Inventionstar_ProductLabel::inventionstar_product_label')
            ->addBreadcrumb(__('Inventionstar'), __('Product Rules'));

        return $resultPage;
    }
}
