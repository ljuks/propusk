<?php
/**
 * ZnetDK, Starter Web Application for rapid & easy development
 * See official website http://www.znetdk.fr 
 * Copyright (C) 2015 Pascal MARTINEZ (contact@znetdk.fr)
 * --------------------------------------------------------------------
 * Controller - CRUD demonstration of ZnetDK (www.demo.znetdk.fr).
 */

namespace app\controller;

class CompanyCtrl extends \AppController {

    static protected function action_save() {
        // 1) Read POST parameter's values
        $request = new \Request();
  //      $row = $request->getValuesAsMap('id', 'user', 'date', 'name', 'mycompany', 'company', 'validto', 'description', 'price', 'approved', 'dtstamp');
    $row = $request->getValuesAsMap('id', 'name' , 'description' );
       
        // 2) Store values into the database
        $copmanyDAO = new \app\model\CompanyDAO();
        $response = new \Response();
        try {
            $productID = $copmanyDAO->store($row);
            $response->setSuccessMessage(LA_DEMO_DIALOG_SAVE, 
                    \General::getFilledMessage(LA_DEMO_INFO_MSG_SAVE, $productID));
        } catch (\PDOException $ex) {
            $response->setFailedMessage(LA_DEMO_DIALOG_SAVE,
            \General::getFilledMessage(LA_DEMO_ERROR_MSG_SAVE, $request->id
                    , $ex->getCode()));
        }

        // 3) Return JSON response
        return $response;
    }

    static protected function action_remove() {
        // 1) Get row ID from the POST parameter
        $request = new \Request();
        $rowID = $request->id;

        // 2) Remove the specified row from the database 
        $copmanyDAO = new \app\model\CompanyDAO();
        $response = new \Response();
        try {
            $copmanyDAO->remove($rowID);
            $response->setSuccessMessage(LA_DEMO_DIALOG_REMOVE, LA_DEMO_INFO_MSG_REMOVE);
        } catch (\PDOException $ex) {
            $response->setFailedMessage(LA_DEMO_DIALOG_REMOVE,
                    \General::getFilledMessage(LA_DEMO_ERROR_MSG_REMOVE, $rowID, $ex->getCode()));
        }

        // 3) Return JSON response
        return $response;
    }

    static protected function action_data() {
        // 1) Read POST parameters
        $request = new \Request();
        // --> Pagination
        $first = $request->first; $rows = $request->rows;
        // --> Sort criteria
        $sortField = $request->sortfield; $sortOrder = $request->sortorder;
        $sortCriteria = is_null($sortField) ? 'id' : $sortField . (is_null($sortOrder) ? ' ASC' : $sortOrder == 1 ? ' ASC' : ' DESC');
        // --> Filter criteria
        $criteria = $request->search_criteria;
        $keyword = '%' . $criteria . '%';
       // 2) Request rows from the database
        $response = new \Response();
        $copmanyDAO = new \app\model\CompanyDAO();
        $copmanyDAO->setKeywordAsFilter($keyword);
        $propuskFound = array();
        try {
            $response->total = $copmanyDAO->getCount();
            $copmanyDAO->setSortCriteria($sortCriteria);
            $copmanyDAO->setLimit($first, $rows);
           while($row = $copmanyDAO->getResult()) {
                $propuskFound[] = $row;
            }
            $response->rows = $propuskFound;
            $response->success = TRUE;
        } catch (\PDOException $ex) {
            $response->setFailedMessage("Request data", "Unable to request the propusk (error '" . $ex->getCode() . "')");
        }
       // 3) Return JSON response
        return $response;
    }

    static protected function action_suggestions() {
        // 1) Read POST parameters */
        $request = new \Request();
        
        // 2) Request the rows matching the criterium from the database
        $copmanyDAO = new \app\model\CompanyDAO();
        $copmanyDAO->setNameAsFilter('%' . $request->criteria . '%');
        $copmanyDAO->setSortCriteria('name');
        $copmanyDAO->setLimit(0, 10);
        
        $response = new \Response();
        $previousSuggestion = '';
        $suggestions = array();
        try {
            while($row = $copmanyDAO->getResult()) {
                if ($row['name'] !== $previousSuggestion) {
                    $suggestions[]['label'] = $row['name'];
                    $previousSuggestion = $row['name'];
                }
            }
            $response->setResponse($suggestions);
        } catch (\PDOException $ex) {
            $response->setFailedMessage("Request suggestions", "Unable to request the propusk (error '" . $ex->getCode() . "')");
        }

        // 3) Return JSON response
        return $response;
    }
    
    static public function getlist(){
        $companyDAO = new \app\model\CompanyDAO();
        $list = '(';
        while ($Row = $companyDAO->getResult()) {
            $list += $Row['name'];
            $list += ', ';
        }
        $list="('1', '2', '3')";
        return $list;
    }

}
