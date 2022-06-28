<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light  ">
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#">CONTACTO</a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="#">TURNOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">INGRESAR</a>
          </li>
        </ul>
      </div>
    </nav>




    
        <div class="container d-flex justify-content-center mt-5 ">
          <a href="">  <img src="imagenes\bea8c8bfd99232680106da7d20a8731c.png" class="img-fluid" alt="Responsive image"> </a>
        </div>

        <div class="container-sm border border-secondary mt-5 rounded  " style="width: 1000px ; height: 600px;" >
          
          <div class="text-center   "> 
            <h1 class="mt-3">Turnos Disponibles</h1>
          </div>

        

<!-- Filtro turnos -->
       

            <div class="d-flex justify-content-center">
  
              <form action="filtrarTurno" method="POST">
  
                 
                  <input type="text" name="inputDia" placeholder="Dia" class="shadow p-1  mx-1 my-1 bg-white rounded">
                  <input type="text" name="inputHorario" placeholder="Hora" class="shadow p-1  mx-1 my-1 bg-white rounded">
                 
                
         <select name="inputMedico">

         {foreach from=$medico item=m}
          <option value="{$m->id_medico}">{$m->nombre_medico}</option>
         {/foreach}

        </select>
               
                  <button type="submit"> FILTRAR</button>
              </form>
  
           </div>
           
         
<!-- Filtro turnos -->
<div class=" d-flex justify-content-center">
            <table class="table text-center mt-5 " style="width: 700px;">
              <thead>

                <tr>
                  <th class="bg-success text-white" scope="col">DIA</th>
                  <th class="bg-success text-white" scope="col">HORA</th>
                  <th class="bg-success text-white" scope="col">MEDICO</th>
                  <th class="bg-success text-white" scope="col">ELEGIR</th>
                
               
                </tr>
              </thead>
              <tbody>

              {foreach from=$turnos item=turno}
                
                <tr>
 
                  <td>{$turno->dia}</td>      
                  <td>{$turno->hora}</td>           
                  <td> {$turno->nombre_medico}</td>
              

                  {if $turno->disponible == 1}

                    <td>
                    <button> <a href="{BASE_URL}elegirTurno/{$turno->id_turno}">Elegir</a> </button>
                    </td>
                  {/if}

                  


                  {if $turno->disponible == 0}
                    <td>
                    <button type="button" class="btn btn-warning"> <a href="">  No Disponible </a> </button>
                    </td>
                  {/if}




                  
                 </td>

                  
                </tr>
              {/foreach}
            
              </tbody>
            </table>
            </div>
          </div>
        
        </div>
    
     

        <footer class="bg-success text-center text-white position-absolute bottom-0" style="width:100%;">
          <P>ACA EL FOOTER CON LOS ICONOS DE SOCIALMEDIA</P>
        </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>