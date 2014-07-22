/**
 * Created by nsilva on 13-05-14.
 */

$(document).ready(function(){

    initPlugins();

    initAjaxForm();

    initFormUsuario();

    initFormCompromisosHitos();

    initFormCompromisosActores();

    initFormCompromisosMediosDeVerificacion();

    initFiltrosBusqueda();

    modalEvents();

    initCharts();

    initMoment();


});

function modalEvents() {
    /* Vuelve el modal a su estado original cada vez que se cierra */
    $(document).on('hidden.bs.modal', '#modal-backend', function(e){
        var modal = $(this);
        modal.removeData('bs.modal');
        tinymce.remove('#modal-backend .tinymce');
    });
    $(document).on('shown.bs.modal', '#modal-backend', function(){
        initPlugins($('#modal-backend'));
    });
}

function initPlugins(c) {
    var container = c || $(document);

    container.find(".form-control-select2").each(function(i,el){
        $(el).select2();
    });

    container.find(".form-control-select2-tags").each(function(i,el){
        var tags=$(el).data("tags");
        $(el).select2({
            tags: tags
        });
    });



    var maskedInput = container.find('[data-mask]');
    if(maskedInput.length){
        maskedInput.each(function(i, e){
            var elem = $(this);
            elem.mask(elem.data('mask'));
        });
    }

    var tinymceSelector = (c ? c.selector + " " : "") + ".tinymce";
    if($(tinymceSelector).length){
    tinymce.init({
        selector: tinymceSelector,
        menubar:false,
        statusbar: false,
        plugins: [
            "link,image"
        ],
        toolbar: "undo redo | bold italic | link image | bullist numlist"
    });
    }
}

function initAjaxForm(){
    $(".ajaxForm :submit").attr("disabled",false);
    $(document).on("submit",".ajaxForm",function(){
        var form=this;
        if(!form.submitting){
            form.submitting=true;
            $(form).find(":submit").attr("disabled",true);
            //$(form).append("<div class='ajaxLoader'>Cargando</div>");
            //var ajaxLoader=$(form).find(".ajaxLoader");
            //$(ajaxLoader).css({
            //    left: ($(form).width()/2 - $(ajaxLoader).width()/2)+"px",
            //    top: ($(form).height()/2 - $(ajaxLoader).height()/2)+"px"
            //});
            $.ajax({
                url: form.action,
                data: $(form).serialize(),
                type: form.method,
                dataType: "json",
                success: function(response){
                    if(response.redirect){
                        window.location=response.redirect;
                    }else{
                        var f=window[$(form).data("onsuccess")];
                        $(form).data('response-data', response);
                        f(form);
                    }

                },
                error: function(response){
                    form.submitting=false;
                    //$(ajaxLoader).remove();
                    $(form).find(":submit").attr("disabled",false);

                    var html="";
                    for(var i in response.responseJSON.errors)
                        html+="<div class='alert alert-danger'>"+response.responseJSON.errors[i]+"</div>";

                    $(form).find(".validacion").html(html);
                    if(!$(form).parents('.modal').length){
                        $('html, body').animate({
                            scrollTop: $(".validacion").offset().top-10
                        });
                    }
                }
            });
        }
        return false;
    });
}

function initFormUsuario(){
    var formUsuario = $('.form-usuario');
    if(formUsuario.length){
        formUsuario.find('.btn-cambiar-password').on('click', function (e){
            var btn = $(this),
                disabled = btn.data('disabled'),
                contPassword = $('.cont-password'),
                contCambiarPassword = $('.cont-cambiar-password');

            disabled = !disabled;

            contCambiarPassword.css('display', disabled ? 'none' : 'block');
            contCambiarPassword.find('#password').attr('disabled', disabled);
            contCambiarPassword.find('#password_confirmation').attr('disabled', disabled);
            contPassword.css('display', disabled ? 'block' : 'none');
        });
    }
}

function initFormCompromisosHitos(){
    $('.form-hitos').each(function(i,el){
        $(el).find('.form-hitos-table tbody tr').length?$(el).find('.form-hitos-table').show():$(el).find('.form-hitos-table').hide();
        var maxid=$(el).find('.form-hitos-table tbody tr').length;
        $(el).find('.form-hitos-agregar').on('click',function(){
            var row='<tr>' +
                '<td><input class="form-control" type="text" name="hitos['+maxid+'][descripcion]" value="" placeholder="Descripción del hito"/></td>' +
                '<td><input class="form-control" type="number" min="0" max="100" name="hitos['+maxid+'][ponderador]" value="" placeholder="Ponderador del hito (Valor entre 0 y 100)"/></td>' +
                '<td><input class="form-control" type="number" min="0" max="100" name="hitos['+maxid+'][avance]" value="" placeholder="Porcentaje de avance del hito (Valor entre 0 y 100)"/></td>' +
                '<td><input data-provide="datepicker" data-date-format="dd-mm-yyyy" data-date-autoclose="true" class="form-control" type="text" name="hitos['+maxid+'][fecha_inicio]" value="" placeholder="Fecha de inicio del hito"/></td>' +
                '<td><input data-provide="datepicker" data-date-format="dd-mm-yyyy" data-date-autoclose="true" class="form-control" type="text" name="hitos['+maxid+'][fecha_termino]" value="" placeholder="Fecha de término del hito"/></td>' +
                '<td>' +
                '<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>' +
                '</td>' +
                '</tr>';
            $(el).find('.form-hitos-table').append(row);
            ++maxid;
            $(el).find('.form-hitos-table tbody tr').length?$(el).find('.form-hitos-table').show():$(el).find('.form-hitos-table').hide();
        });
        $(el).find('.form-hitos-table').on('click','button',function(){
            $(this).closest('tr').remove();
            $(el).find('.form-hitos-table tbody tr').length?$(el).find('.form-hitos-table').show():$(el).find('.form-hitos-table').hide();
        });
    });

}

function initFormCompromisosActores(){
    $('.form-actores').each(function(i,el){
        $(el).find('.form-actores-table tbody tr').length?$(el).find('.form-actores-table').show():$(el).find('.form-actores-table').hide();
        var maxid=$(el).find('.form-actores-table tbody tr').length;
        $(el).find('.form-actores-agregar').on('click',function(){
            var row='<tr>' +
                '<td><input class="form-control" type="text" name="actores['+maxid+'][nombre]" value="" placeholder="Nombre del actor involucrado"/></td>' +
                '<td>' +
                '<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>' +
                '</td>' +
                '</tr>';
            $(el).find('.form-actores-table').append(row);
            ++maxid;
            $(el).find('.form-actores-table tbody tr').length?$(el).find('.form-actores-table').show():$(el).find('.form-actores-table').hide();
        });
        $(el).find('.form-actores-table').on('click','button',function(){
            $(this).closest('tr').remove();
            $(el).find('.form-actores-table tbody tr').length?$(el).find('.form-actores-table').show():$(el).find('.form-actores-table').hide();
        });
    });

}

function initFormCompromisosMediosDeVerificacion(){
    $('.form-medios').each(function(i,el){
        $(el).find('.form-medios-table tbody tr').length?$(el).find('.form-medios-table').show():$(el).find('.form-medios-table').hide();
        var maxid=$(el).find('.form-medios-table tbody tr').length;
        $(el).find('.form-medios-agregar').on('click',function(){

            var row='<tr>' +
                '<td><input class="form-control" type="text" name="medios-de-verificacion['+maxid+'][descripcion]" value="" placeholder="Descripción del medio de verificación" /></td>' +
                '<td><input class="form-control" type="text" name="medios-de-verificacion['+maxid+'][tipo]" value="" placeholder="pdf" /></td>' +
                '<td><input class="form-control" type="text" name="medios-de-verificacion['+maxid+'][url]" value="" placeholder="http://www.diariooficial.cl" /></td>' +
                '<td>' +
                '<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>' +
                '</td>' +
                '</tr>';
            $(el).find('.form-medios-table').append(row);
            ++maxid;
            $(el).find('.form-medios-table tbody tr').length?$(el).find('.form-medios-table').show():$(el).find('.form-medios-table').hide();
        });
        $(el).find('.form-medios-table').on('click','button',function(){
            $(this).closest('tr').remove();
            $(el).find('.form-medios-table tbody tr').length?$(el).find('.form-medios-table').show():$(el).find('.form-medios-table').hide();
        });
    });
    
}

function actualizaEntidades (form) {
    var $form = $(form),
        inputEntidades = $('#entidades_de_ley'),
        dataEntidad = $form.data('response-data').entidad,
        currentValues = inputEntidades.val() || [];

    if(dataEntidad.numero_boletin)
        dataEntidad.nombre += ' (N° Boletín: ' + dataEntidad.numero_boletin + ')';

    var optionHtml = '<option value="'+dataEntidad.id+'">'+dataEntidad.nombre+'</option>';

    var oldOption=inputEntidades.find("option[value="+dataEntidad.id+"]");
    if(oldOption.length)
        oldOption.replaceWith(optionHtml);
    else
        inputEntidades.append(optionHtml);

    currentValues.push(dataEntidad.id);
    inputEntidades.val(currentValues).trigger('change');

    $('#modal-backend').modal('hide');
}

function initFiltrosBusqueda(){
    var filtrosAnidados = $('.panel-filtro-anidado');
    filtrosAnidados.find('li.active').parents('li').addClass('active');

    filtrosAnidados.find(':checkbox').change(function(){
        if($(this).prop("checked"))
            $(this).parents('li').find(':checkbox').prop("checked",true);
    });
}

function initCharts(){
    $(".chart.pie").each(function(i,el){

        var data=$(el).data("data");

        var options= {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 3/4,
                        formatter: labelFormatter,
                        background: {
                            opacity: 0.5
                        }
                    }
                }
            },
            legend: {
                show: false
            }
        };

        $.plot($(el), data, options);
        window.onresize = function(event) {
            $.plot($(el), data, options);
        }
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (event) {
            $.plot($(el), data, options);
        })

    });

    function labelFormatter(label, series) {
        return "<div style='font-size:12px; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
    }

}

function initMoment(){
    moment.lang("es");
    $("time").each(function(i,el){
        var time=moment($(el).text());
        $(el).text(time.fromNow());
    });
}
