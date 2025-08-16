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
                        <input type="date" id="fecha" name="fecha" required>
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
                        <label for="solicitado_por">Solicitado por:</label>
                        <input type="text" id="solicitado_por" name="solicitado_por">
                    </div>
                     <div class="form-group">
                        <label for="proyecto">Proyecto:</label>
                        <input type="text" id="proyecto" name="proyecto">
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
                            <option value="unica">Única vez</option>
                            <option value="semanal">Semanal</option>
                            <option value="mensual">Mensual</option>
                            <option value="trimestral">Trimestral</option>
                            <option value="anual">Anual</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lote_compra">Por lote de compra:</label>
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
                        <label for="tipo_corrugado">Tipo de corrugado:</label>
                        <input type="text" id="tipo_corrugado" name="tipo_corrugado">
                    </div>
                    <div class="form-group">
                        <label for="bolsa_plastico">Bolsa de plástico:</label>
                        <select id="bolsa_plastico" name="bolsa_plastico">
                            <option value="no">No</option>
                            <option value="si">Sí</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="liner">Liner:</label>
                        <input type="text" id="liner" name="liner">
                    </div>
                    <div class="form-group">
                        <label for="esquineros">Esquineros:</label>
                        <select id="esquineros" name="esquineros">
                            <option value="no">No</option>
                            <option value="si">Sí</option>
                        </select>
                    </div>
                </div>
                <div class="form-group full-width">
                    <label for="otras_especificaciones_empaque">Otras especificaciones:</label>
                    <textarea id="otras_especificaciones_empaque" name="otras_especificaciones_empaque"></textarea>
                </div>
                <div class="form-group full-width">
                    <label for="datos_criticos">Datos críticos/especiales que el cliente solicite:</label>
                    <textarea id="datos_criticos" name="datos_criticos"></textarea>
                </div>
            </fieldset>

            <!-- Cotización Adicional e Información Adicional -->
            <fieldset>
                <legend>Información Adicional</legend>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="cotizacion_adicional">Cotización adicional:</label>
                        <textarea id="cotizacion_adicional" name="cotizacion_adicional"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="informacion_adicional">Información adicional:</label>
                        <textarea id="informacion_adicional" name="informacion_adicional"></textarea>
                    </div>
                </div>
            </fieldset>

            <!-- 4. Requisición de Cotización -->
            <fieldset>
                <legend>4. Requisición de Cotización</legend>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="cantidad_cotizar">Cantidad a cotizar:</label>
                        <input type="number" id="cantidad_cotizar" name="cantidad_cotizar" placeholder="0">
                    </div>
                    <div class="form-group">
                        <label for="unidad">Unidad:</label>
                        <input type="text" id="unidad" name="unidad" placeholder="Pz, Kg, etc.">
                    </div>
                </div>
                <div class="form-group full-width">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion"></textarea>
                </div>
                <div class="form-group full-width">
                    <label for="archivos">Cargar archivos locales (planos, especificaciones, etc.):</label>
                    <input type="file" id="archivos" name="archivos[]" multiple>
                </div>
            </fieldset>

            <div class="button-container">
                <button type="submit">Enviar Requisición</button>
            </div>
        </form>
    </div>
@endsection