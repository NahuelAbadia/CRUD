<?php include("db.php")?>

<?php include("includes/header.php")?>  <!--Conecto el "index.php" con el "header.php" -->

<div class="container p-4"> <!--Los contenedores de bootstrap permiten centrar el contenido. p-4 es un padding de 4-->
    <div class="row"> <!--Agrego una fila -->
        <div class="col-md-4">
        
            <?php if(isset($_SESSION['message'])){ ?> <!-- se comprueba de que existe el mensaje guardado dentro de la variable "message" en save_task.php-->
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?> <!-- se muestra por pantalla el mensaje guardado dentro de "message" -->
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
           
            <?php session_unset(); } ?> <!--se utiliza para liberar todas las variables de sesión registradas actualmente.-->

            <div class="card card-body"> <!--Esto es una tarjeta de una clase reservada de bootstrap. card y card.body son dos clases que uni. -->
                <form action="save_task.php" method="POST"> <!-- el metodo post hace que todo lo que en el form se mande a SAVE_TASK.PHP-->
                    <div class="form-group p-2">
                        <input type="text" name="title" placeholder="Title task" class="form-control"> <!--form-control es una clase de BS5-->
                    </div>
                    <div class="form-group p-2">
                        <textarea name="description" rows="2" class="form-control" id="cuadro" placeholder="Description task"></textarea> 
                    </div>
                    <div class="text-center p-2"> <!--uso la clase .text-centerde BS5 para centrar el boton-->
                        <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);
                    
                    while ($row = mysqli_fetch_array($result_tasks)){ ?>  <!-- mysqli_fetch_array($result_tasks) lo que hace es recorrer las tareas -->
                        <tr>
                            <td><?php echo $row['title'] ?></td>    <!-- columnas para que se muestren los datos ingresados y guardados en la bdd-->
                            <td><?php echo $row['description'] ?></td>   <!-- columnas para que se muestren los datos ingresados y guardados en la bdd-->
                            <td><?php echo $row['fecha'] ?></td>     <!-- columnas para que se muestren los datos ingresados y guardados en la bdd-->
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary"> <!--le paso como parametro el id (PK) donde se guarda todo. ANALIZAR LINEA DE CODIGO-->
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger"> <!--le paso como parametro el id (PK) donde se guarda todo. ANALIZAR LINEA DE CODIGO-->
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>  <!--Conecto el "index.php" con el "footer.php" -->


