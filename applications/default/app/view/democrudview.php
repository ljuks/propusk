<!-- ZnetDK, Starter Web Application for rapid & easy development
See official website http://www.znetdk.fr 
Copyright (C) 2015 Pascal MARTINEZ (contact@znetdk.fr)
--------------------------------------------------------------------
View - CRUD demonstration of ZnetDK (www.demo.znetdk.fr).
-->
<!-- Actions bar -->
<div class="zdk-action-bar" data-zdk-dialog="demo-crud-dlg" data-zdk-datatable="demo-crud-table">
    <!-- Action buttons -->
    <button class="zdk-bt-add">New</button>
    <button class="zdk-bt-edit" data-zdk-noselection="Please, select first a product to edit!">Edit</button>
    <button class="zdk-bt-remove" data-zdk-noselection="Please, select first a product to remove!"
            data-zdk-confirm="Do you really want to remove the selected product?:Yes:No"
            data-zdk-action="democrudctrl:remove">Remove</button>
    <!-- Number of rows per page -->
    <select class="zdk-select-rows" title="Rows">  
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="100">All</option>
    </select>
    <!-- Search form -->
    <div class="zdk-filter-rows">
        <input title="search criteria..." data-zdk-action="democrudctrl:suggestions">
        <button class="zdk-bt-clear" title="Reset the search field content..."></button>
        <button class="zdk-bt-search" title="Search the products that match the criteria..."
                data-zdk-novalue="Please, type in a criteria first."></button>
    </div>
</div>
<!-- Datatable -->
<div id="demo-crud-table" class="zdk-datatable zdk-synchronize" title="products" data-zdk-action="democrudctrl:data"
     data-zdk-paginator="10" data-zdk-columns='[
     {"field":"name", "headerText": "Product name", "sortable":true},
     {"field":"part_number", "headerText": "Part number", "sortable":true},
     {"field":"description", "headerText": "Description", "sortable":true, "tooltip":true},
     {"field":"price_money", "headerText": "Price", "sortable":true}]'>
</div>
<!-- Form dialog -->
<div id="demo-crud-dlg" class="zdk-modal" title="Product" data-zdk-width="340px" data-zdk-confirm="Do you want to cancel your changes?:Yes:No">
    <form class='zdk-form' data-zdk-action="democrudctrl:save" data-zdk-datatable="demo-crud-table">
        <label>Part number</label>
        <input name="part_number" maxlength="10" required>
        <label>Product name</label>
        <input name="name" maxlength="25" required>
        <label>Description</label>
        <textarea name="description" rows="3" maxlength="200"></textarea>
        <label>Price</label>
        <input name="price" placeholder="format 999.99" pattern="^\d+\.?\d{0,2}$" maxlength="6" required>
        <input name="id" type="hidden">
        <button class="zdk-bt-save zdk-close-dialog" type="submit">Save</button>
        <button class="zdk-bt-cancel zdk-close-dialog" type="button">Cancel</button>
    </form>
</div>
<!-- Styles for the Datatable's columns --> 
<style>
    #demo-crud-table tr > td:first-of-type, #demo-crud-table thead > th:first-of-type {
        width: 190px;
    }

    #demo-crud-table tr > td:nth-of-type(2), #demo-crud-table thead > th:nth-of-type(2) {
        text-align:center;
        width:90px;
    }

    #demo-crud-table tr > td:nth-of-type(3), #demo-crud-table thead > th:nth-of-type(3) {
        text-overflow:ellipsis;
    }

    #demo-crud-table tr > td:last-of-type, #demo-crud-table thead > th:last-of-type {
        text-align:right;
        width:80px;
    }
</style>