<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Carta de aceptación - {{ $estudiante->Nombre }}</title>
    
</head>
<body>
    @if(isset($estudiante->proyectos->Proyecto))
    <a href="{{ url('/admin/cartaPDF/'.$estudiante->id) }} " class="btn btn-outline-dark" style="float:right">
        PDF 
    </a>
    @endif
    @if(!isset($estudiante->proyectos->Proyecto))
    <a href="{{ url('/admin/'.$estudiante->id.'/edit') }} " class="btn btn-outline-danger">
        ASIGNAR PROYECTO
    </a>
    @endif
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col col-10 "> 
                <div class="card">
                

                    <img src="{{ asset('/img/logo.png') }}" class="img-fluid" width="150px" style="margin:70px; margin-bottom:0; z-index:1" alt="">
                    
                    <div class="container" style="padding:100px; padding-top:0" >
                        <div class="card-body text-center">
                            <b>
                            <p class = "text-end" style="margin:0"> H. AYUNTAMIENTO DE AMOZOC, PUE. A <?php $timezone=date_default_timezone_set('America/Mexico_City');
                                                                                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
                                                                                    echo strtoupper( date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ) ; ?> </p>
                            <p class = "text-end"> ASUNTO: CARTA DE ACEPTACIÓN </p>
                            
                            <p class = "text-start" style="margin:0"> {{strtoupper( $estudiante->institucions->destinatario ) }} </p>
                            <p class = "text-start" style="margin:0"> {{strtoupper( $estudiante->institucions->cargo ) }}  </p>
                            <p class = "text-start"> P R E S E N T E </p></b>
                            <br> </br>
                            
                            
                            <p class = "text-justify"> La que suscribe prof. Myriam Aquino Mena regidora de Educación Pública y<br>               
                            Actividades Culturales, Deportivas y Sociales del H. Ayuntamiento municipal de Amozoc, Puebla.</p>               
                            <br> 
                            <p class = "text-justify" >Por medio de la presente Me permito informarle que C. <b>{{ucwords( $estudiante->Nombre )}} {{ucwords( $estudiante->ApellidoPaterno )}} {{ucwords( $estudiante->ApellidoMaterno )}},</br>
                            </b> de la <b>{{ ucwords( $estudiante->carreras->Carrera ) }}</b> de la <b>{{ ucwords( $estudiante->institucions->institucion )}}</b>, con
                            Matrícula <b>{{$estudiante->Matricula}},</b> fue aceptado para realizar su <b>{{ ucwords( $estudiante->servicios->Servicio ) }}</b> en: H. Ayuntamiento
                                    de Amozoc, Puebla, en el programa denominado; <b>" 
                                        @if(isset($estudiante->proyectos->Proyecto)) 
                                        {{ ucwords( $estudiante->proyectos->Proyecto ) }} 
                                        @endif 
                                        @if(!isset($estudiante->proyectos->Proyecto)) 
                                        <a href="{{ url('/admin/'.$estudiante->id.'/edit') }} " class="btn btn-outline-danger">
                                            ASIGNAR PROYECTO
                                        </a> 
                                        @endif "</b>, @if(isset($estudiante->proyectos->Proyecto)) con número de folio 
                                    <b>{{$estudiante->proyectos->Folio}}</b> donde cubrirá un total de {{$estudiante->proyectos->Duracion}} horas en el período {{$estudiante->proyectos->MesInicio}} - {{$estudiante->proyectos->MesFin}} del <?php echo date('Y')?> @endif</p> 
                            <br>
                        
                            <p class = "text-justify" >Agradezco su atención, y sin otro motivo, me despido de usted, reiterando mi compromiso al trabajo.</p>
                            <br><br><br>         

                            <p class = "text-justify"><b> ATENTAMENTE <br>
                            AMOZOC DE MOTA, PUEBLA, A <?php echo strtoupper( date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ) ; ?> <br> <i>“Cuna de Artesanos”</i> </b></p>
                            <br>
                            <center><hr width=400 ></center>
                            <p class = "text-center"><b> PROFA. MIRYAM AQUINO MENA </b></p>
                            <p class = "text-justify"> REGIDORA DE EDUCACION PÚBLICA <br>
                            Y ACTIVIDADES CULTURALES, DEPORTIVAS Y SOCIALES <br>
                            H. AYUNTAMIENTO DE AMOZOC 
                            @foreach($periodo as $anios)
                            {{ $anios->anioIni }} - {{ $anios->anioFin }}
                            @endforeach</p>

                        
                        </div>
                    </div>        
                </div>
            </div>
        </div>    
    </div>
</body>
</html>