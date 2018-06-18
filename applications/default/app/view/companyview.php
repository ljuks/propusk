<!-- ZnetDK, Starter Web Application for rapid & easy development
See official website http://www.znetdk.fr 
Copyright (C) 2015 Pascal MARTINEZ (contact@znetdk.fr)
--------------------------------------------------------------------
View - CRUD demonstration of ZnetDK (www.demo.znetdk.fr).
-->
<!-- Actions bar -->
<!-- this should go after your </body> -->



<div id='company_actions' class="zdk-action-bar" data-zdk-dialog="company_dlg" data-zdk-datatable="company_table">
    <!-- Action buttons -->
    <button class="zdk-bt-add">Добавить</button>
    <button class="zdk-bt-edit" data-zdk-noselection="Выберите строку для редактирования!">Редактировать</button>
    <button class="zdk-bt-remove" data-zdk-noselection="Выберите строку для удаления!"
            data-zdk-confirm="Удалить запись?:Да:Нет"
            data-zdk-action="companyctrl:remove">Удалить</button>
    <!-- Number of rows per page -->
    <select class="zdk-select-rows" title="Rows">  
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="100">All</option>
    </select>
    <!-- Search form -->
    <div class="zdk-filter-rows">
        <input title="search criteria..." data-zdk-action="companyctrl:suggestions">
        <button class="zdk-bt-clear" title="Reset the search field content..."></button>
        <button class="zdk-bt-search" title="Search the products that match the criteria..."
                data-zdk-novalue="Please, type in a criteria first."></button>
    </div>
</div>
<!-- Datatable -->
<div id="company_table" class="zdk-datatable zdk-synchronize" title="products" data-zdk-action="companyctrl:data"
     data-zdk-paginator="10" data-zdk-columns='[
     {"field":"id", "headerText": "№", "sortable":true},
     {"field":"name", "headerText": "Наименование", "sortable":true},
     {"field":"description", "headerText": "Описание", "sortable":true}]'
     >
</div>
<!-- Form dialog -->
<div id="company_dlg" class="zdk-modal" title="Product" data-zdk-width="340px" data-zdk-confirm="Do you want to cancel your changes?:Yes:No">
    <form class='zdk-form' data-zdk-action="companyctrl:save" data-zdk-datatable="company_table">
        <!--        <label>id</label>
                <input name="id" maxlength="10" required>-->
        <input name="id" type="hidden">
        <label>Наименование</label>
        <input name="name" maxlength="50" required>
        <label>Описание</label>

        <textarea name="description" rows="3" maxlength="100"></textarea>





        <button class="zdk-bt-save zdk-close-dialog" type="submit">Сохранить</button>
        <button class="zdk-bt-cancel zdk-close-dialog" type="button">Отменить</button>
    </form>
</div>
<!-- Styles for the Datatable's columns --> 
<style>
    #company-table tr > td:first-of-type, #company-table thead > th:first-of-type {
        width: 90px;
    }



    #company-table tr > td:last-of-type, #company-table thead > th:last-of-type {
        text-align:right;
        width:80px;
    }
</style>



