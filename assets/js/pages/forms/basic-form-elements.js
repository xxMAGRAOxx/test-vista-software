$(function () {
    //Textare auto growth
    autosize($('textarea.auto-growth'));

    //Datetimepicker plugin
    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm',
        clearButton: true,
        weekStart: 1
    });

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'DD / MM / YYYY',
        clearButton: false,
		lang : 'pt-br',
		setDate: moment(),
        weekStart: 1,
        nowText: 'Hoje',
        nowButton : true,
        cancelText : 'Cancelar',
        // maxDate : moment(),
        time: false
    });

    $('.timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    });
});