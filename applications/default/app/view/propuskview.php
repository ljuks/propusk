<!-- ZnetDK, Starter Web Application for rapid & easy development
See official website http://www.znetdk.fr 
Copyright (C) 2015 Pascal MARTINEZ (contact@znetdk.fr)
--------------------------------------------------------------------
View - CRUD demonstration of ZnetDK (www.demo.znetdk.fr).
-->
<!-- Actions bar -->
<!-- this should go after your </body> -->
<link rel="stylesheet" type="text/css" href="/jquery.datetimepicker.css"/>

<script src="/jquery.datetimepicker.js"></script>


<div id='propusk_actions' class="zdk-action-bar" data-zdk-dialog="propusk_dlg" data-zdk-datatable="propusk_table">
    <!-- Action buttons -->
    <button class="zdk-bt-add">New</button>
    <button class="zdk-bt-edit" data-zdk-noselection="Please, select first a product to edit!">Edit</button>
    <button class="zdk-bt-remove" data-zdk-noselection="Please, select first a product to remove!"
            data-zdk-confirm="Do you really want to remove the selected product?:Yes:No"
            data-zdk-action="propuskctrl:remove">Remove</button>
    <!-- Number of rows per page -->
    <select class="zdk-select-rows" title="Rows">  
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="100">All</option>
    </select>
    <!-- Search form -->
    <div class="zdk-filter-rows">
        <input title="search criteria..." data-zdk-action="propuskctrl:suggestions">
        <button class="zdk-bt-clear" title="Reset the search field content..."></button>
        <button class="zdk-bt-search" title="Search the products that match the criteria..."
                data-zdk-novalue="Please, type in a criteria first."></button>
    </div>
</div>
<!-- Datatable -->
<div id="propusk_table" class="zdk-datatable zdk-synchronize" title="products" data-zdk-action="propuskctrl:data"
     data-zdk-paginator="10" data-zdk-columns='[
     {"field":"id", "headerText": "№", "sortable":true},
     {"field":"dtstamp", "headerText": "Дата", "sortable":true},
     {"field":"aproved", "headerText": "Статус", "sortable":true},
     {"field":"person1", "headerText": "Ответственный", "sortable":true},
     {"field":"person2", "headerText": "Сопровождающий", "sortable":true},
     {"field":"num", "headerText": "Номер машины", "sortable":true}]'
     >
</div>
<!-- Form dialog -->
<div id="propusk_dlg" class="zdk-modal" title="Product" data-zdk-width="340px" data-zdk-confirm="Do you want to cancel your changes?:Yes:No">
    <form class='zdk-form' data-zdk-action="propuskctrl:save" data-zdk-datatable="propusk_table">
        <!--        <label>id</label>
                <input name="id" maxlength="10" required>-->
        <input name="id" type="hidden">
        <label>Номер машины</label>
        <input name="num" maxlength="12" required>
        <label>Номер прицепа</label>
        <input name="num1" maxlength="12">
        <label>Водитель</label>
        <input  name="driver" maxlength="30">
        <label>Дата входа</label>
        <input type="date" name="date1" required
               data-zdkerrmsg-date="<?php echo LC_MSG_ERR_DATE_INVALID; ?>">  
        <label>Дата выхода</label>
        <input type="date" name="date2" required
               data-zdkerrmsg-date="<?php echo LC_MSG_ERR_DATE_INVALID; ?>"> 
        <label>Ответственный</label>
        <input name="person1" value="111">
        <label>Сопровождающий</label>
        <input name="person2" maxlength="30">

        <label>Коментарии</label>
        <textarea name="description" rows="3" maxlength="200"></textarea>

        <label>Компания</label>
        <input name="company" maxlength="30" value="333">







        <button class="zdk-bt-save zdk-close-dialog" type="submit">Save</button>
        <button class="zdk-bt-cancel zdk-close-dialog" type="button">Cancel</button>
    </form>
</div>
<!-- Styles for the Datatable's columns --> 
<style>
    #propusk-table tr > td:first-of-type, #propusk-table thead > th:first-of-type {
        width: 90px;
    }



    #propusk-table tr > td:last-of-type, #propusk-table thead > th:last-of-type {
        text-align:right;
        width:80px;
    }
</style>



<script>

    
    $(document).ready(function () {

        /********* When the form is reset **********/
        $('#propusk_actions').zdkactionbar({
            whenadd: function() {
                // Refresh profiles in the listbox
//                $('#znetdk_user_dialog .zdk-listbox').zdklistbox('refresh');
                // Default expiration date value
                $("#propusk_dlg form input[name=date1]").zdkinputdate('setW3CDate', '<?php echo \General::getCurrentW3CDate(); ?>');
                // Default user status is enabled (value = "1")
 //               $("#znetdk_user_dialog form input[name=user_enabled]").puiradiobutton('select', "1");
            },
            whenedit: function() {
                // Refresh profiles in the listbox keeping current selection
//                $('#znetdk_user_dialog .zdk-listbox').zdklistbox('refresh',true);
            }
        });

    });
</script>