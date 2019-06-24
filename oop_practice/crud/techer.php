<?php
include "../hf/header.php";
?> 
<?php 
    spl_autoload_register(function($class_name){
        include $class_name.".php";
        
    });

?>  
   
    <section class="mainleft">
  <?php 
        $user = new Teacher();
        if(isset($_POST['create'])){
           
            $name       = $_POST['name'];
            $department = $_POST['department'];
            $age        = $_POST['age'];
           
          $user->setName($name);
          $user->setDep($department);
          $user->setAge($age);
        
          if($user->insert()){
              echo "<span class='insert'>Insert Succesfully</span>";
          }
            
        }
        
        if(isset($_POST['update'])){
           
            $id      = $_POST['id'];
            $name       = $_POST['name'];
            $department = $_POST['department'];
            $age        = $_POST['age'];
           
          $user->setName($name);
          $user->setDep($department);
          $user->setAge($age);
        
          if($user->update($id)){
              echo "<span class='insert'>Data Updated Succesfully</span>";
          }
            
        }
           
  ?> 
        <?php  
            if(isset($_GET['action']) && $_GET['action']=='delete'){ 
                $id = (int)$_GET['id']; 
                if($user->delete($id)){
                     echo "<span class='insert'>Data Deleted Succesfully</span>";
                }  
            }    
        ?>
        <?php  
            if(isset($_GET['action']) && $_GET['action']=='update'){ 
                $id = (int)$_GET['id']; 
                $result = $user->readById($id);
                 
        ?>
          
         <form action="" method="post">
                    <table>
                        <input type="hidden" name="id" value="<?php echo $result['id'];?>">
                        <tr>
                            <td>Name: </td>
                            <td><input type="text" name="name" value="<?php echo $result['name'];?>" required="1"></td>   
                        </tr>
                        <tr>
                            <td>Department: </td>
                            <td><input type="text" name="department" value="<?php echo $result['dep'];?>" required="1"></td>   
                        </tr>
                        <tr>
                            <td>Age: </td>
                            <td><input type="text" name="age" value="<?php echo $result['age'];?>" required="1"></td>   
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="update" value="Submit"></td>   
                        </tr> 
                    </table> 
            </form> 
        <?php  }else {?>
           <form action="" method="post">
                    <table>
                        
                        <tr>
                            <td>Name: </td>
                            <td><input type="text" name="name" placeholder="Your Name" required="1"></td>   
                        </tr>
                        <tr>
                            <td>Department: </td>
                            <td><input type="text" name="department" placeholder="Your Department" required="1"></td>   
                        </tr>
                        <tr>
                            <td>Age: </td>
                            <td><input type="text" name="age" placeholder="Your age" required="1"></td>   
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="create" value="Submit"></td>   
                        </tr> 
                    </table> 
            </form>  
        <?php }?>
            </section>
            <section class="mainright">
                
                <table class="tbl_one">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Age</th>
                        <th>Action</th>
                    </tr>
                   
                    <?php
                    $i = 0;
                    foreach($user->readAll() as $key=>$value){     
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['dep']; ?></td>
                        <td><?php echo $value['age']; ?></td>
                        <td>
                            <?php echo "<a href='techer.php?action=update&id=".$value['id']."'>Edit</a>";?> ||
                            <?php echo "<a href='techer.php?action=delete&id=".$value['id']."' onClick='return confirm(\"Are You Sure To Delete Data..\")'>Delete</a>";?>
                        </td>
                    </tr> 
                    <?php  } ?>
                    
                </table> 
            </section>
             
           
                  
        </div> 
<?php include "../hf/footer.php";  
 
 
