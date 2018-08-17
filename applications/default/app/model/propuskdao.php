<?php
/**
 * ZnetDK, Starter Web Application for rapid & easy development
 * See official website http://www.znetdk.fr 
 * Copyright (C) 2015 Pascal MARTINEZ (contact@znetdk.fr)
 * --------------------------------------------------------------------
 * Model - CRUD demonstration of ZnetDK (www.demo.znetdk.fr).
 */
namespace app\model;

class PropuskDAO extends \DAO {

    protected function initDaoProperties() {
        $this->table = "permit";
//        $this->moneyColumns = array('price');
    }

    public function setKeywordAsFilter($keyword) {
        $this->filterClause  = " WHERE LOWER(mycompany) LIKE LOWER(?)"
            . " OR LOWER(num) LIKE LOWER(?)"
            . " OR LOWER(company) LIKE LOWER(?)"
            . " OR LOWER(user) LIKE LOWER(?)";
        $this->setFilterCriteria($keyword, $keyword, $keyword, $keyword);
    }
    
    public function setNameAsFilter($name) {
        $this->filterClause = " WHERE LOWER(num) LIKE LOWER(?)";
        $this->setFilterCriteria($name);
    }
    
    
     public function setDateAsFilter($date) {
        $this->filterClause = " WHERE dtstamp = ?";
        $this->setFilterCriteria($date);
    } 
}