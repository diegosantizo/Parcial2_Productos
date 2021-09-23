<?php
    if( !empty($_POST) ){

       $txt_id = utf8_decode($_POST["txt_id"]);
        $txt_producto = utf8_decode($_POST["txt_producto"]);
        $drop_marca = utf8_decode($_POST["drop_marcas"]);
        $txt_descripcion = utf8_decode($_POST["txt_descripcion"]);
        $txt_costo = utf8_decode($_POST["txt_costo"]);
        $txt_venta = utf8_decode($_POST["txt_venta"]);
        $txt_existencia = utf8_decode($_POST["txt_existencia"]);
        
        include("datos_conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        $sql ="";
        

        if(isset($_POST['btn_agregar'])){  
          $sql = "INSERT INTO InvProductos.Productos(producto,idMarca,Descripcion,precio_costo,precio_venta,existencia)  VALUES ('".$txt_producto."',".$drop_marca.",'".$txt_descripcion."','".$txt_costo."','".$txt_venta."','".$txt_existencia."');";
        }else if( isset($_POST['btn_modificar'])){
          $sql = "UPDATE InvProductos.Productos SET producto='".$txt_producto ."',idMarca=".$drop_marca .",Descripcion='".$txt_descripcion."',precio_costo='".$txt_costo."',precio_venta='".$txt_venta."',existencia='".$txt_existencia."' WHERE idProducto = ". $txt_id.";";
        }else if( isset($_POST['btn_eliminar'])){
          $sql = "DELETE FROM InvProductos.Productos  WHERE idProducto = ". $txt_id.";";
        }
        if ($db_conexion->query($sql)===true){
            $db_conexion->close();
            header('Location: /parcial2%202021/Parcial2_Productos/index.php');
        }else{
            $db_conexion->close();
        }
    }
?>

