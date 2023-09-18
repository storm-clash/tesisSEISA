$(function () {
    $(document).ready(function () {
        $("#select").on("reset", function () {

            alert('fdngfj');
        });
        $('#select').on('change', function () {
            var valor = document.getElementById('select');
            var selectValor = valor.options[valor.selectedIndex].text;

            if ((selectValor === 'Sistemas de Alarma Contra Intrusos') || (selectValor === 'Sistema Control de Acceso') || (selectValor === 'Circuito Cerrado de Televisión') || (selectValor === 'Sistema Automático de Detección de Incendios')) {

                $('#sistemaExtintores').hide();
                $('#sistemaRayo').hide();


                $('#sistemaTec').show();

            } else if (selectValor === 'Sistema de Protección Contra Rayos') {
                // alert('5');
                $('#sistemaTec').hide();
                $('#sistemaExtintores').hide();

                $('#sistemaRayo').show();

            } else if (selectValor === 'Sistema de Suministro de Agua Contra Incendio') {

                $('#sistemaTec').hide();
                $('#sistemaRayo').hide();

                $('#sistemaExtintores').show();
            }


        });
    });
});