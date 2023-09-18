
$(function () {
   $(document).on('click','.fc-day',function () {
       var date=$(this).attr('data-date');





       $.get('http://mantenimiento.seisa/index.php/ordenservicio/create',{'date':date},function(data) {
           $('#modal').modal('show')
               .find('#modalContent')
               .html(data);
       });



});

















$('#BtnModalId').click(function (e) {
    e.preventDefault();

        $('#your-modal').modal('show')
            .find('#modalContent').html("")

            .load($(this).attr('value'),function () {
                var thisModal=$('#your-modal');
                setTimeout(function () {
                    thisModal.modal('show');
                    $('#cargando').fadeOut("slow");
                });
            });
        $('#cargando').fadeIn("slow");
});

});
