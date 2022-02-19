<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Core\View;

/**
 * Class ClientController
 */
 class ClientController extends Controllers
 {

     /**
      * Product index action that shows product list
      *
      * @return void
      */
      public function indexAction(): void
      {
          $this->forward('client/list');
      }

      /**
       * Product list action
       *
       * @return void
       */
       public function listAction(): void
       {
           $this->set('title', "Клієнти");

           $clients = $this->getModel('Client')
                    ->initCollection()
                    ->sort($this->getSortParams())
                    ->getCollection()
                    ->select();
            $this->set('clients', $clients);

            $this->renderLayout();
       }

       /**
        * Single product view action
        *
        * @return void
        */
        public function viewAction(): void
        {
            $this->set('title', "Карточка клієнта");

            $client = $this->getModel('Client');
            $client->initCollection()
                    ->filter(['id', $this->getId()])
                    ->getCollection()
                    ->selectFirst();
            $this->set('clients', $client);
        }

        /**
         * Shows product editing page
         *
         * @return void
         */
         public function editAction(): void
         {
             $model = $this->getModel('Client');
             $this->set('saved', 0);
             $this->set('Title', "Редагування клієнта");
             $id = filter_input(INPUT_POST, 'id');
             if ($id) {
                 $values = $model->getPostValues();
                 $this->set('saved', 1);
                 $model->saveItem($id, $values);
             }
             $this->set('client', $model->getItem($this->getId()));

             $this->renderLayout();
         }

         

 }
