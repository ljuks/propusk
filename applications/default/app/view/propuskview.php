<!-- ZnetDK, Starter Web Application for rapid & easy development
See official website http://www.znetdk.fr 
Copyright (C) 2015 Pascal MARTINEZ (contact@znetdk.fr)
--------------------------------------------------------------------
View - CRUD demonstration of ZnetDK (www.demo.znetdk.fr).
-->
<!-- Actions bar -->
<!-- this should go after your </body> -->



<script>
    znetdk.useScriptFile('jquery.datetimepicker.full.js');
    //  znetdk.useScriptFile('resources/jquery_ui_datepicker/i18n/ui.datepicker-ru.js');
    //  znetdk.useScriptFile('resources/jquery_ui_datepicker/timepicker_plug/timepicker.js');
    //  znetdk.useScriptFile('resources/jquery_ui_datepicker/jquery_ui_datepicker.js');
    //  znetdk.useScriptFile('jquery-1.9.1.js');

    znetdk.useStyleSheet('jquery.datetimepicker.css');
    //   znetdk.useStyleSheet('resources/jquery_ui_datepicker/smothness/jquery_ui_datepicker.css'); 
</script>

<div id='propusk_actions' class="zdk-action-bar" data-zdk-dialog="propusk_dlg" data-zdk-datatable="propusk_table">
    <!-- Action buttons -->
    <button id= 'a' class="zdk-bt-add">Добавить</button>
    <button id='b' class="zdk-bt-copy" data-zdk-noselection="Выберите строку для копирования!">Копировать</button>
    <button class="zdk-bt-edit" data-zdk-noselection="Выберите строку для редактирования!">Редактировать</button>
    <button class="zdk-bt-remove" data-zdk-noselection="Выберите строку для удаления!"
            data-zdk-confirm="Удалить запись?:Да:Нет"
            data-zdk-action="propuskctrl:remove">Удалить</button>
    <!-- Number of rows per page -->
    <select class="zdk-select-rows" title="Rows">  
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="100">All</option>
    </select>
    <!-- Search form -->
    <div id='filter' class="zdk-filter-rows">
        <input title="search criteria..." data-zdk-action="propuskctrl:suggestions">
                    <input type="date" name="expiration_date" required
                   data-zdkerrmsg-date="<?php echo LC_MSG_ERR_DATE_INVALID; ?>" data-zdk-action="propuskctrl:suggestions">
        <button class="zdk-bt-clear" title="Reset the search field content..."></button>
        <button class="zdk-bt-search" title="Search the products that match the criteria..."
                data-zdk-novalue="Please, type in a criteria first."></button>
        <button id= 'c' class="zdk-bt-custom clear">ttt</button>
    </div>
</div>
<!-- Datatable -->
<div id="propusk_table" class="zdk-datatable zdk-synchronize" title="Пропуски" data-zdk-action="propuskctrl:data"
     data-zdk-paginator="20" data-zdk-columns='[
     {"field":"id", "headerText": "№", "sortable":true},
     {"field":"dtstamp", "headerText": "Дата", "sortable":true},
     {"field":"aproved", "headerText": "Статус", "sortable":true},
     {"field":"person1", "headerText": "Ответственный", "sortable":true},
     {"field":"person2", "headerText": "Сопровождающий", "sortable":true},
     {"field":"mycompany", "headerText": "Организация", "sortable":true},
     {"field":"description", "headerText": "Комментарий", "sortable":false},
     {"field":"num", "headerText": "Номер машины", "sortable":true}]'
     >
</div>
<!-- Form dialog -->
<div id="propusk_dlg" class="zdk-modal" title="Пропуски" data-zdk-width="340px" data-zdk-confirm="Отменить изменения?:Да:Нет">
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
        <input type="text" id="datetimepicker1" name="date1" required />
        <label>Дата выхода</label>
        <input type="text" id="datetimepicker2" name="date2" required />

        <label>Ответственный</label>
        <input name="person1" value="111">
        <label>Сопровождающий</label>
        <input name="person2" maxlength="30">

        <label>Коментарии</label>
        <textarea name="description" rows="3" maxlength="200"></textarea>

        <label>Компания</label>


        <select class="zdk-dropdown" name="mycompany" 
                data-zdk-action="users:getcompanies"
                data-zdk-noselection="Выбрать из списка..."

                ></select>





        <button class="zdk-bt-save zdk-close-dialog" type="submit">Сохранить</button>
        <button class="zdk-bt-cancel zdk-close-dialog" type="button">Отменить</button>
    </form>
</div>
<!-- Styles for the Datatable's columns --> 
<style>
    #propusk-table tr > td:first-of-type, #propusk-table thead > th:first-of-type {
        width: 10px;
    }



    #propusk-table tr > td:last-of-type, #propusk-table thead > th:last-of-type {
        text-align:right;
        width:80px;
    }
</style>



<script>


    $(document).ready(function () {
        
         $("#filter button.clear").click(function() {
  
        });

        
        

        $('#datetimepicker1').datetimepicker({
            lang: 'ru'
        });
        


        $('#datetimepicker2').datetimepicker({
            lang: 'ru'
        });



        /********* When the form is reset **********/
        $('#propusk_actions').zdkactionbar({
            whenadd: function () {

                //   alert(window.event.target.id);           
                var selections = $('#propusk_table').zdkdatatable('getSelection');
                if (selections.length === 1 && selections[0]) {
//$.#datetimepicker.setLocale('ru');

                    // Refresh profiles in the listbox
                    //                $('#basic_example_1').datetimepicker();
//                $('#znetdk_user_dialog .zdk-listbox').zdklistbox('refresh');
                    // Default expiration date value

//                $("#propusk_dlg form input[name=mycompany").val('php echo \UserSession::getLoginName(); ?>');
//                  $("#propusk_dlg form input[name=mycompany").val($(this).text());//selections[0].num);              
//                $("#propusk_dlg form input[name=date1]").zdkinputdate('setW3CDate', '<?php echo \General::getCurrentW3CDate(); ?>');
//                $("#propusk_dlg form input[name=date2]").zdkinputdate('setW3CDate', '<?php echo \General::getCurrentW3CDate(); ?>');

                }
                // Default user status is enabled (value = "1")
                //               $("#znetdk_user_dialog form input[name=user_enabled]").puiradiobutton('select', "1");
            },
            whenedit: function () {

                // Refresh profiles in the listbox keeping current selection
//                $('#znetdk_user_dialog .zdk-listbox').zdklistbox('refresh',true);
            },
            whencopy: function () {




                var selections = $('#propusk_table').zdkdatatable('getSelection');
                if (selections.length === 1 && selections[0]) {
//$.#datetimepicker.setLocale('ru');

                    // Refresh profiles in the listbox
                    //                $('#basic_example_1').datetimepicker();
//                $('#znetdk_user_dialog .zdk-listbox').zdklistbox('refresh');
                    // Default expiration date value

//                $("#propusk_dlg form input[name=mycompany").val('php echo \UserSession::getLoginName(); ?>');
                    $("#propusk_dlg form input[name=person1]").val(selections[0].person1);
                    $("#propusk_dlg form input[name=person2]").val(selections[0].person2);
                    $("#propusk_dlg form textarea[name=description]").val(selections[0].description);
                    $("#propusk_dlg form input[name=num]").val(selections[0].num);
                    $("#mycompany").zdkdropdown('selectValue','Технолит');
                    $("#mycompany").zdkdropdown('refresh');
//                     $("#propusk_dlg form zdk-dropdown[name=mycompany]").zdkdropdown('defaultSelectedValue',"Технолит");
//                     $("#propusk_dlg form zdk-dropdown[name=mycompany]").zdkdropdown('refresh',true);
//                $("#propusk_dlg form input[name=date1]").zdkinputdate('setW3CDate', '<?php echo \General::getCurrentW3CDate(); ?>');
//                $("#propusk_dlg form input[name=date2]").zdkinputdate('setW3CDate', '<?php echo \General::getCurrentW3CDate(); ?>');

                }


                // Refresh profiles in the listbox keeping current selection
//                $('#znetdk_user_dialog .zdk-listbox').zdklistbox('refresh',true);
            }


        });

    });
</script>
