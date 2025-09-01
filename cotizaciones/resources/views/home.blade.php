@extends('layouts.app')

@section('title', 'Requisición de Cotización')

@section('content')
    <div class="container mt-8">
        <h1 class="text-3xl font-bold mb-6 text-center text-slate-700">@yield('title')</h1>
        <form action="/submit-quote-request" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- 1. Datos Generales -->
            <fieldset>
                <legend>1. Datos Generales</legend>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" required value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label for="no_proyecto">No. Proyecto:</label>
                        <input type="text" id="no_proyecto" name="no_proyecto" required>
                    </div>
                    <div class="form-group">
                        <label for="cliente">Cliente:</label>
                        <input type="text" id="cliente" name="cliente" placeholder="Nombre del cliente">
                    </div>
                    <div class="form-group">
                        <label for="contacto">Contacto:</label>
                        <input type="text" id="contacto" name="contacto" placeholder="Persona de contacto">
                    </div>
                    <div class="form-group">
                        <label for="Puesto">Puesto:</label>
                        <input type="text" id="Puesto" name="Puesto" placeholder="Puesto del contacto">
                    </div>
                    <div class="form-group">
                        <label for="domicilio">Domicilio:</label>
                        <input type="text" id="domicilio" name="domicilio" placeholder="Domicilio del cliente">
                    </div>
                    <div class="form-group">
                        <label for="lugar_entrega">Lugar de entrega:</label>
                        <input type="text" id="lugar_entrega" name="lugar_entrega" placeholder="Lugar de entrega">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" placeholder="Teléfono de contacto">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electrónico:</label>
                        <input type="email" id="correo" name="correo" placeholder="Correo electrónico de contacto">
                    </div>  
                    <div class="form-group">
                        <label for="Nombre_del_proyecto">Nombre del proyecto:</label>
                        <input type="text" id="Nombre_del_proyecto" name="Nombre_del_proyecto" placeholder="Nombre del proyecto">
                    </div>
                    <div class="form-group">
                        <label for="tipo_de_empaque">Tipo de empaque:</label>
                        <select id="tipo_de_empaque" name="tipo_de_empaque">                         
                            <option default value="" disabled selected>Selecciona una opción</option>
                            <option value="cgarola">Charola</option>
                            <option value="blister">blister</option>
                            <option value="tapa">tapa</option>
                            <option value="otro">Otro</option>
                        </select>                                           
                    </div>
                </div>
            </fieldset>

            <!-- 2. Especificaciones del Proyecto -->
            <fieldset>
                <legend>2. Especificaciones del Proyecto</legend>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="frecuencia_compra">Frecuencia de compra:</label>
                        <select id="frecuencia_compra" name="frecuencia_compra">
                            <option default value="" disabled selected>Selecciona una opción</option>
                            <option value="unica">Única vez</option>
                            <option value="semanal">Semanal</option>
                            <option value="mensual">Mensual</option>
                            <option value="bimestral">Bimestral</option>
                            <option value="trimestral">Trimestral</option>
                            <option value="anual">Anual</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lote_compra">Cantidad por lote de compra:</label>
                        <input type="text" id="lote_compra" name="lote_compra">
                    </div>
                </div>

                <fieldset class="sub-fieldset">
                    <legend class="sub-legend">Dimensiones de la pieza</legend>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="largo">Largo (mm):</label>
                            <input type="number" id="largo" name="largo" step="0.01" placeholder="0.00">
                        </div>
                        <div class="form-group">
                            <label for="ancho">Ancho (mm):</label>
                            <input type="number" id="ancho" name="ancho" step="0.01" placeholder="0.00">
                        </div>
                        <div class="form-group">
                            <label for="alto">Alto (mm):</label>
                            <input type="number" id="alto" name="alto" step="0.01" placeholder="0.00">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="sub-fieldset">
                    <legend class="sub-legend">Especificaciones del material</legend>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="material">Material:</label>
                            <input type="text" id="material" name="material">
                        </div>
                        <div class="form-group">
                            <label for="calibre">Calibre:</label>
                            <input type="text" id="calibre" name="calibre">
                        </div>
                        <div class="form-group">
                            <label for="color">Color:</label>
                            <input type="text" id="color" name="color">
                        </div>
                        <div class="form-group">
                            <label for="franja_color_si">
                                <input type="checkbox" id="franja_color_si" name="franja_color_si" value="1" onchange="toggleInputDisplay('franja_color_si', 'franja_color_input()')">
                                ¿Franja de color?
                            </label>
                        </div>
                        <div class="form-group" id="franja_color_input" style="display:none;">
                            <label for="franja_color">Franja de color:</label>
                            <input type="text" id="franja_color" name="franja_color">
                        </div>
                    </div>
                </fieldset>
            </fieldset>

            <!-- 3. Especificaciones de Empaque -->
            <fieldset>
                <legend>3. Especificaciones de Empaque</legend>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="cajas_corrugado">
                                <input type="checkbox" id="cajas_corrugado" name="cajas_corrugado" value="1">
                                Cajas de corrugado
                            </label>
                            <label for="bolsa_plastico">
                                <input type="checkbox" id="bolsa_plastico" name="bolsa_plastico" value="1">
                                Bolsa de plástico
                            </label>
                            <label for="liner">
                                <input type="checkbox" id="liner" name="liner" value="1">
                                Liner
                            </label>
                            <label for="esquineros">
                                <input type="checkbox" id="esquineros" name="esquineros" value="1">
                                Esquineros
                            </label>
                        </div>
                        <div class="form-group ">
                            <label for="otras_especificaciones_empaque">Otras especificaciones:</label>
                            <textarea id="otras_especificaciones_empaque" name="otras_especificaciones_empaque"></textarea>
                        </div>
                        <div class="form-group ">
                            <label for="datos_criticos">Datos críticos/especiales que el cliente solicite:</label>
                            <textarea id="datos_criticos" name="datos_criticos"></textarea>
                        </div>
                    </div>
            </fieldset>

            <!-- Cotización Adicional e Información Adicional -->
            <fieldset>
                <legend>Cotización Adicional e Información Adicional</legend>
                <div class="form-grid">
                    <div class="agrupar-form">
                    <div class="form-group">
                        <legend id="cotizacion_adicional_legend">Cotización Adicional</legend>

                        <label>
                            <input type="checkbox" id="cotizacion_adicional_ppap" name="cotizacion_adicional_ppap" value="1">
                            PPAP
                        </label>

                        <label>
                            <input type="checkbox" id="cotizacion_adicional_corrida_piloto" name="cotizacion_adicional_corrida_piloto" value="1">
                            Corrida piloto
                        </label>

                        <label>
                            <input type="checkbox" id="cotizacion_adicional_herramentales" name="cotizacion_adicional_herramentales" value="1">
                            Herramentales
                        </label>

                        <label>
                            <input type="checkbox" id="cotizacion_adicional_almacenaje" name="cotizacion_adicional_almacenaje" value="1">
                            Almacenaje
                        </label>

                        <label for="prototipo">Prototipo: </label>
                        <select id="prototipo" name="prototipo">
                            <option default value="" disabled selected>Selecciona una opción</option>
                            <option value="1">1 cavidad</option>
                            <option value="2">2 cavidades</option>
                            <option value="completo">Completo</option>
                        </select>

                        <label for="pedimento_virtual">Pedimento Virtual: </label>
                        <select id="pedimento_virtual" name="pedimento_virtual">
                            <option default value="" disabled selected>Selecciona una opción</option>
                            <option value="herramental">Herramental</option>
                            <option value="piezas">Piezas</option>
                            <option value="ambas">Ambas</option>
                        </select>

                        <label for="cotizacion_adicional_otro1">Otro 1:</label>
                        <input type="text" id="cotizacion_adicional_otro1" name="cotizacion_adicional_otro1" placeholder="Otro 1">

                        <label for="cotizacion_adicional_otro2">Otro 2:</label>
                        <input type="text" id="cotizacion_adicional_otro2" name="cotizacion_adicional_otro2" placeholder="Otro 2">
                    </div>  
                    </div>
                    <div class="agrupar-form">
                    <div class="form-group">
                        <legend>Información Adicional</legend>

                        <label for="altura_maxima_estiba">Altura máxima de estiba:</label>
                        <input type="text" id="altura_maxima_estiba" name="altura_maxima_estiba" placeholder="Altura máxima de estiba">

                        <label for="peso_maximo_caja">Peso máximo por caja:</label>
                        <input type="text" id="peso_maximo_caja" name="peso_maximo_caja" placeholder="Peso máximo por caja">

                        <label for="peso_componente">Peso del componente:</label>
                        <input type="text" id="peso_componente" name="peso_componente" placeholder="Peso del componente">

                        <label for="componentes_por_charola">Componentes por charola:</label>
                        <input type="text" id="componentes_por_charola" name="componentes_por_charola" placeholder="Componentes por charola">
                        
                        <div class="form-group">
                            <label>
                                <input type="checkbox" id="mostrar_pestana" name="mostrar_pestana" value="1" onchange="toggleInputDisplay('mostrar_pestana', 'pestana_apartado')">
                                ¿Tiene pestaña?
                            </label>
                        </div>
                        <div class="form-group" id="pestana_apartado" style="display:none;">
                            <label for="pestana">Pestaña:</label>
                            <input type="text" id="pestana" name="pestana" placeholder="Pestaña">
                        </div>
                        <label for="informacion_adicional_otro">Otro:</label>
                        <input type="text" id="informacion_adicional_otro" name="informacion_adicional_otro" placeholder="Otro">
                    
                    </div>
                    </div>
                </div>
            </fieldset>
            
            <fieldset>
            <div class="form-grid">
            <div class="form-group">
            <label for="fecha_de_efectividad">Fecha de efectividad:</label>
            <input type="date" id="fecha_de_efectividad" name="fecha_de_efectividad" required value="{{ date('Y-m-d') }}"></label>
            </div>
            </div>
            </fieldset>

            <!-- 4. Requisición de Cotización -->
            <fieldset>
                <legend>4. Requisición de Cotización</legend>
                <div class="form-grid">
                    <div class="agrupar-form">
                    <div class="form-group">
                        <label for="mostrar_estiba"><input type="checkbox" id="mostrar_estiba" name="mostrar_estiba" value="1" onchange="toggleInputDisplay('mostrar_estiba', 'tipo_estiba_apartado')">
                        Tipo de estiba:</label>
                        <div class="form-group" id="tipo_estiba_apartado" style="display:none;">
                        <select id="tipo_estiba" name="tipo_estiba">
                            <option default value="" disabled selected>Selecciona una opción</option>
                            <option value="0">0°</option>
                            <option value="180">180°</option>
                        </select>
                        </div>

                        <label for="grabados"><input type="checkbox" id="grabados" name="grabados" value="1" onchange="toggleInputDisplay('grabados', 'grabados_apartado')">
                        Grabados:</label>
                        <div class="form-group" id="grabados_apartado" style="display:none;">
                        <select id="grabados" name="grabados">
                            <option default value="" disabled selected>Selecciona una opción</option>
                            <option value="numero_de_parte">Número de parte</option>
                            <option value="tipo_material">Tipo de material</option>
                            <option value="logo_cliente">Logo cliente</option>
                            <option value="logo_innovet">Logo Innovet</option>
                        </select>
                        </div>

                        <label for="requisicion_otro"><input type="checkbox" id="requisicion_otro" name="requisicion_otro" value="1" onchange="toggleInputDisplay('requisicion_otro', 'requisicion_otro_apartado')">
                        Otro:</label>
                        <div class="form-group" id="requisicion_otro_apartado" style="display:none;">
                        <input type="text" id="otros" name="otros" placeholder="Otros">
                        </div>

                        <label for="flujo_carga"><input type="checkbox" id="flujo_carga" name="flujo_carga" value="1" onchange="toggleInputDisplay('flujo_carga', 'flujo_carga_apartado')">
                        Flujo de carga:</label>
                        <div class="form-group" id="flujo_carga_apartado" style="display:none;">
                        <select name="flujo_carga" id="flujo_carga">
                            <option default value="" disabled selected>Selecciona una opción</option>
                            <option value="entre_componentes">Entre componentes</option>
                            <option value="sobre_charola">Sobre charola</option>
                        </select>
                        </div>
                        <label for="pared_checkbox">
                            <input type="checkbox" id="pared_checkbox" name="pared_checkbox" value="1" onchange="toggleInputDisplay('pared_checkbox', 'pared_apartado')">
                            Pared:
                        </label>
                        <div class="form-group" id="pared_apartado" style="display:none;">
                            <select name="pared" id="pared">
                                <option default value="" disabled selected>Selecciona una opción</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="sin_pared">Sin pared</option>
                            </select>
                        </div>

                        <label for="movimiento_checkbox">
                            <input type="checkbox" id="movimiento_checkbox" name="movimiento_checkbox" value="1" onchange="toggleInputDisplay('movimiento_checkbox', 'movimiento_apartado')">
                            Movimiento:
                        </label>
                        <div class="form-group" id="movimiento_apartado" style="display:none;">
                            <select name="movimiento" id="movimiento">
                                <option default value="" disabled selected>Selecciona una opción</option>
                                <option value="movimiento_limitado_vertical">Movimiento limitado vertical</option>
                                <option value="movimiento_limitado_horizontal">Movimiento limitado horizontal</option>
                                <option value="robotico">Robótico</option>
                            </select>
                        </div>

                        <label for="sujecion_checkbox">
                            <input type="checkbox" id="sujecion_checkbox" name="sujecion_checkbox" value="1" onchange="toggleInputDisplay('sujecion_checkbox', 'sujecion_apartado')">
                            Sujeción:
                        </label>
                        <div class="form-group" id="sujecion_apartado" style="display:none;">
                            <select name="sujecion" id="sujecion">
                                <option default value="" disabled selected>Selecciona una opción</option>
                                <option value="broche">Broche</option>
                                <option value="sin_broche">Sin Broche</option>
                                <option value="juego">Juego</option>  
                            </select>
                        </div>

                        <label for="temperaturas_expuestas_checkbox">
                            <input type="checkbox" id="temperaturas_expuestas_checkbox" name="temperaturas_expuestas_checkbox" value="1" onchange="toggleInputDisplay('temperaturas_expuestas_checkbox', 'temperaturas_expuestas_apartado')">
                            Temperaturas expuestas: (Grados celcius)
                        </label>
                        <div class="form-group" id="temperaturas_expuestas_apartado" style="display:none;">
                            <select name="temperaturas_expuestas" id="temperaturas_expuestas">
                                <option default value="" disabled selected>Selecciona una opción</option>
                                <option value="0-40">0° a 40°</option>
                                <option value="40-50">40° a 50°</option>
                                <option value=">50">mayores a 50°</option>
                                <option value="NC">NC</option>
                            </select>
                        </div>
                    
                        <label for="Proceso de inocuidad">
                        <input type="checkbox" id="Proceso_de_inocuidad" name="Proceso_de_inocuidad" value="1"> Proceso de inocuidad</label>

                        <legend> <input type="checkbox" id="termoformado" name="termoformado" value="1" onchange="toggleInputDisplay('termoformado', 'termoformado_apartado')"> Información de Termoformado</legend>
                        <div class="form-group" id="termoformado_apartado" style="display:none;">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="pieza_mejorar" name="pieza_mejorar" value="1">
                                        Pieza a mejorar
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="pieza_fisica_proteger" name="pieza_fisica_proteger" value="1">
                                        Pieza física a proteger
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="plano_pieza_termoformada" name="plano_pieza_termoformada" value="1">
                                        Plano pieza termoformada
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="igs_componente" name="igs_componente" value="1">
                                        IGS componente
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="igs_pieza_termoformada" name="igs_pieza_termoformada" value="1">
                                        IGS pieza termoformada
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="contenedor" name="contenedor" value="1">
                                        Contenedor
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="plano_pieza_pdf" name="plano_pieza_pdf" value="1">
                                        Plano de la Pieza PDF
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="nc" name="nc" value="1">
                                        NC
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="na" name="na" value="1">
                                        NA
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="termoformado_otro_info">Otro:</label>
                                    <input type="text" id="termoformado_otro_info" name="termoformado_otro_info" placeholder="Sugerencia u otro dato">
                                </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="agrupar-form">
                    <div class="form-group">
                        <legend> <input type="checkbox" id="uso_cliente" name="uso_cliente" value="1" onchange="toggleInputDisplay('uso_cliente', 'uso_cliente_apartado')"> Uso Cliente</legend>
                        <div class="form-group" id="uso_cliente_apartado" style="display:none;">
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" id="manipulacion_interna" name="manipulacion_interna" value="1" onchange="toggleInputDisplay('manipulacion_interna', 'manipulacion_interna_info')">
                                    Manipulación Interna
                                </label>
                                <input type="text" id="manipulacion_interna_info" name="manipulacion_interna_info" placeholder="Información adicional" style="display:none;">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" id="proceso_interno_manual" name="proceso_interno_manual" value="1" onchange="toggleInputDisplay('proceso_interno_manual', 'proceso_interno_manual_info')">
                                    Proceso Interno Manual
                                </label>
                                <input type="text" id="proceso_interno_manual_info" name="proceso_interno_manual_info" placeholder="Información adicional" style="display:none;">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" id="proceso_interno_robotizado" name="proceso_interno_robotizado" value="1" onchange="toggleInputDisplay('proceso_interno_robotizado', 'proceso_interno_robotizado_info')">
                                    Proceso Interno Robotizado
                                </label>
                                <input type="text" id="proceso_interno_robotizado_info" name="proceso_interno_robotizado_info" placeholder="Información adicional" style="display:none;">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" id="envio_unica_cliente" name="envio_unica_cliente" value="1" onchange="toggleInputDisplay('envio_unica_cliente', 'envio_unica_cliente_info')">
                                    Envío Única Cliente
                                </label>
                                <input type="text" id="envio_unica_cliente_info" name="envio_unica_cliente_info" placeholder="Información adicional" style="display:none;">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" id="envio_cliente_retornable" name="envio_cliente_retornable" value="1" onchange="toggleInputDisplay('envio_cliente_retornable', 'envio_cliente_retornable_info')">
                                    Envío Cliente Retornable
                                </label>
                                <input type="text" id="envio_cliente_retornable_info" name="envio_cliente_retornable_info" placeholder="Información adicional" style="display:none;">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" id="exhibicion" name="exhibicion" value="1" onchange="toggleInputDisplay('exhibicion', 'exhibicion_info')">
                                    Exhibición
                                </label>
                                <input type="text" id="exhibicion_info" name="exhibicion_info" placeholder="Información adicional" style="display:none;">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" id="exhibicion_sello" name="exhibicion_sello" value="1" onchange="toggleInputDisplay('exhibicion_sello', 'exhibicion_sello_info')">
                                    Exhibición Sello
                                </label>
                                <input type="text" id="exhibicion_sello_info" name="exhibicion_sello_info" placeholder="Información adicional" style="display:none;">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" id="componente_int_automotriz" name="componente_int_automotriz" value="1" onchange="toggleInputDisplay('componente_int_automotriz', 'componente_int_automotriz_info')">
                                    Componente INT Automotriz
                                </label>
                                <input type="text" id="componente_int_automotriz_info" name="componente_int_automotriz_info" placeholder="Información adicional" style="display:none;">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" id="componente_ext_automotriz" name="componente_ext_automotriz" value="1" onchange="toggleInputDisplay('componente_ext_automotriz', 'componente_ext_automotriz_info')">
                                    Componente EXT Automotriz
                                </label>
                                <input type="text" id="componente_ext_automotriz_info" name="componente_ext_automotriz_info" placeholder="Información adicional" style="display:none;">
                            </div>
                            <div class="form-group">
                                <label for="uso_cliente_otro">Otro:</label>
                                <input type="text" id="uso_cliente_otro" name="uso_cliente_otro" placeholder="Sugerencia u otro dato">
                            </div>   
                        </div>
                        </div>
                        <div class="agrupar-form">
                            <label for="caja_cliente"><input type="checkbox" id="caja_cliente" name="caja_cliente" value="1" onchange="toggleInputDisplay('caja_cliente', 'caja_cliente_apartado')">
                            Caja de cliente:</label>
                            <div class="form-group" id="caja_cliente_apartado" style="display:none;">
                                <fieldset class="sub-fieldset">
                                    <legend class="sub-legend">Dimensiones de la caja</legend>
                                    <div class="form-grid">
                                        <div class="form-group">
                                            <label for="largo">Largo (mm):</label>
                                            <input type="number" id="largo" name="largo" step="0.01" placeholder="0.00">
                                        </div>
                                        <div class="form-group">
                                            <label for="ancho">Ancho (mm):</label>
                                            <input type="number" id="ancho" name="ancho" step="0.01" placeholder="0.00">
                                        </div>
                                        <div class="form-group">
                                            <label for="alto">Alto (mm):</label>
                                            <input type="number" id="alto" name="alto" step="0.01" placeholder="0.00">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="agrupar-form">
                            <label for="dedales"><input type="checkbox" id="dedales" name="dedales" value="1" onchange="toggleInputDisplay('dedales', 'dedales_apartado')">
                            Dedales:</label>
                            <div class="form-group" id="dedales_apartado" style="display:none;">
                                <select name="dedales" id="dedales">   
                                    <option default value="" disabled selected>Selecciona una opción</option>
                                    <option value="90">90°</option>
                                    <option value="120">120°</option>
                                    <option value="180">180°</option>
                                </select>
                            </div>
                        </div>    
                    </div>
                </div>
            </form>
        </fieldset>
        
        <fieldset>
            <div class="form-grid">
            <div class="form-group">
            <label for="fecha_de_efectividad">Fecha de efectividad:</label>
            <input type="date" id="fecha_de_efectividad" name="fecha_de_efectividad" required value="{{ date('Y-m-d') }}"></label>
            </div>
            </div>
        </fieldset>

            <!-- 5. Carga de Archivos -->
        <fieldset>
                <legend>5. Carga de Archivos</legend>
                    <div class="form-group full-width">
                    <label for="archivos_preview">Vista previa de archivos seleccionados:</label>
                    <div id="archivos_preview"></div>
                </div>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const input = document.getElementById('archivos');
                    const preview = document.getElementById('archivos_preview');

                    input.addEventListener('change', function() {
                        preview.innerHTML = '';
                        Array.from(input.files).forEach(file => {
                            const fileDiv = document.createElement('div');
                            fileDiv.style.marginBottom = '10px';
                            fileDiv.textContent = file.name;

                            if (file.type.startsWith('image/')) {
                                const img = document.createElement('img');
                                img.style.maxWidth = '200px';
                                img.style.display = 'block';
                                img.style.marginTop = '5px';
                                img.src = URL.createObjectURL(file);
                                fileDiv.appendChild(img);
                            }
                            preview.appendChild(fileDiv);
                        });
                    });
                });
                </script>
                <div class="form-group full-width">
                    <label for="archivos">Cargar archivos locales (planos, especificaciones, etc.):</label>
                    <input type="file" id="archivos" name="archivos[]" multiple>
                </div>
            </fieldset>

            <div class="button-container">
                <button type="submit">Enviar Requisición</button>
            </div>
        
    </div>
@endsection