<?php
/**
 * Developer: Hemant Singh Magento 2x Developer
 * Category:  Wishusucess_GetOrders 
 * Website:   http://www.wishusucess.com/
 */
namespace Wishusucess\GetOrders\Controller\Index;
class Index extends \Magento\Framework\App\Action\Action {

  /** @var \Magento\Framework\View\Result\PageFactory  */
      protected $resultPageFactory;
      protected $_orderCollectionFactory;
      protected $orderRepository;
      protected $data;

       
      public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        array $data = []
    ) {
        $this->orderRepository = $orderRepository;
        $this->data = $data;

        parent::__construct($context);
    }
    
    public function execute() {
        echo "<pre>";
        $orderid = 12; // its called increment id
        $order = $this->orderRepository->get($orderid);
        $object['order_info'] = $order->getData();
        $object['payment_info'] =$order->getPayment()->getData();
        $object['shipping_info'] =$order->getShippingAddress()->getData();
        $object['billing_info'] =$order->getBillingAddress()->getData();
        $object['incrementid'] =$order->getIncrementId();
        $object['grandtotal'] =$order->getGrandTotal();
        $object['subtotal'] =$order->getSubtotal();
        $object['customerid'] =$order->getCustomerId();
        $object['customeremail'] =$order->getCustomerEmail();
        $object['customerfirstname'] =$order->getCustomerFirstname();
        $object['customerlastname'] =$order->getCustomerLastname();

        print_r($object)

        // print_r(json_decode(json_encode($object), true));
         
               die();
                      
                  }
          
      }