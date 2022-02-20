<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Core\View;

/**
 * Class CustomerController
 */
 class CustomerController extends Controller
 {

     /**
      * Customer index action that shows customer list
      *
      * @return void
      */
      public function indexAction(): void
      {
          $this->forward('customer/list');
      }

      /**
       * Customer list action
       *
       * @return void
       */
       public function listAction(): void
       {
           $this->set('title', "Клієнти");

           $customers = $this->getModel('Customer')
                    ->initCollection()
                    //->sort($this->getSortParams())
                    ->getCollection()
                    ->select();
            $this->set('customers', $customers);

            $this->renderLayout();
       }

       /**
        * Single customer view action
        *
        * @return void
        */
        public function viewAction(): void
        {
            $this->set('title', "Карточка клієнта");

            $client = $this->getModel('Customer');
            $client->initCollection()
                    ->filter(['id', $this->getId()])
                    ->getCollection()
                    ->selectFirst();
            $this->set('customers', $customer);
        }

        /**
         * Shows customer editing page
         *
         * @return void
         */
         public function editAction(): void
         {
             $model = $this->getModel('Customer');
             $this->set('saved', 0);
             $this->set('Title', "Редагування клієнта");
             $id = filter_input(INPUT_POST, 'id');
             if ($id) {
                 $values = $model->getPostValues();
                 $this->set('saved', 1);
                 $model->saveItem($id, $values);
             }
             $this->set('customer', $model->getItem($this->getId()));

             $this->renderLayout();
         }

         /**
          * Shows customer add page
          *
          * @return void
          */
          public function addAction(): void
          {
              $model = $this->getModel('Customer');
              $this->set('title', "Додавання клієнта");
              if ($values = $model->getPostValues()) {
                  $model->addItem($values);
              }
              $this->renderLayout();
          }

          /**
           * @return mixed
           */
          public function getId()
          {
              return filter_input(INPUT_GET, 'id');
          }

 }
