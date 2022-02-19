<?php

declare(strict_types=1);

namespace Models;

use Core\Model;

/**
 * Class Client
 */
 class Client extends Model
 {
     /**
      * Product constructor.
      */
      function __construct()
      {
          $this->tableName = 'clients';
          $this->idColumn = 'id';
      }
 }
