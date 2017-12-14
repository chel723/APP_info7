<?php
$con=mysqli_connect('localhost','root','root');

if(!$con){
	echo 'Not connected to server';
}

if(!mysqli_select_db($con, 'ads')){
	echo 'database not selected';
}


$pmenu = $cmenu = null;
if (isset($_GET["pcat"]) && is_numeric($_GET["pcat"])) {
    $pmenu = $_GET["pcat"];
}
 

if (isset($_POST['submit'])) {
    if (isset($_POST['ccat'])) {
        $pmenu = $_POST['pcat'];
    }
    if (isset($_POST['ccat']) && is_numeric($_POST['ccat'])) {
        $cmenu = $_POST['ccat'];
    }
    if (isset($_POST['ccat']) && is_numeric($_POST['ccat'])) {
        echo 'Parent Cat Id: ' . $pmenu . ' -> ' . 'Subcategory Id: ' . $cmenu;
    } else if (isset($_POST['ccat'])) {
        echo 'Parent Cat Id: ' . $pmenu;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title>Dependent dropdown in PHP, MySQL</title>
        <script type="text/javascript">
            
            function autoSubmit()
            {
                with (window.document.form) {
                    
                    if (pcat.selectedIndex === 0) {
                        window.location.href = 'category.php';
                    } else {
                        window.location.href = 'category.php?pcat=' + pcat.options[pcat.selectedIndex].value;
                    }
                }
            }
        </script>
    </head>
    <body>
        
        <form class="form" id="form" name="form" method="post" >
            <fieldset>
                <p class="bg">
                    <label for="pcat">Select Parent Category</label> 
                    
                    <select id="pcat" name="pcat" onchange="autoSubmit();">
                        <option value="">-- Select Parent Category --</option>
                        <?php
                      
                        $sql = "select id, name from category";
                        $result = mysqli_query($con,$sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo ("<option value=\"{$row['id']}\" " . ($pmenu == $row['id'] ? " selected" : "") . ">{$row['name']}</option>");
                        }
                        ?>
                    </select>
                    
                </p>
                <?php
               
                if ($pmenu != '' && is_numeric($pmenu)) {
             
                    $sql = "SELECT ad.id, ad.text FROM ad JOIN category_ad ON category_ad.idAd=ad.id WHERE idCategory=" . $pmenu;
                    $result = mysqli_query($con,$sql);
                    if (mysqli_num_rows($result) > 0) {
                        ?>
                        
                        <p class="bg">
                            <label for="ccat">Select Sub-Category</label>
                            
                            <select id="ccat" name="ccat">
                            
                                <option value="">-- Select Sub-Category --</option>
                                
                                <?php
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo ("<option value=\"{$row['id']}\" " . ($cmenu == $row['id'] ? " selected" : "") . ">{$row['text']}</option>");
                                }
                                ?>
                            </select>
                        </p>
                        
                        <?php
                    }
                }
                ?>
                <p><input name="submit" value="Submit" type="submit" /></p>
            </fieldset>
        </form>
    </body>
</html>