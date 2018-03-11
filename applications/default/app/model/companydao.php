<?php
/**
 * ZnetDK, Starter Web Application for rapid & easy development
 * See official website http://www.znetdk.fr 
 * Copyright (C) 2015 Pascal MARTINEZ (contact@znetdk.fr)
 * --------------------------------------------------------------------
 * Model - CRUD demonstration of ZnetDK (www.demo.znetdk.fr).
 */
namespace app\model;

class CompanyDAO extends \DAO {

    protected function initDaoProperties() {
        $this->table = "company";
//        $this->moneyColumns = array('price');
    }

    public function setKeywordAsFilter($keyword) {
        $this->filterClause  = " WHERE LOWER(name) LIKE LOWER(?)"
            . " OR LOWER(description) LIKE LOWER(?)";
            
        $this->setFilterCriteria($keyword, $keyword);
    }
    
    public function setNameAsFilter($name) {
        $this->filterClause = " WHERE LOWER(name) LIKE LOWER(?)";
        $this->setFilterCriteria($name);
    }
    
  
}