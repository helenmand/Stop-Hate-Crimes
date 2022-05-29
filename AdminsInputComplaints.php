<?php
    session_start();
    include("AdminsConnection.php");

    if($_POST['complaint']!=null){
        $_SESSION['post']="complaint";

        if($_POST['submit']=="Add"){
            $_SESSION['action']="add";
            header("Location:./makeSubmission.php");
        }
        else{
            if($_POST['submit']=="Update"){
                $_SESSION['action']="Update";

                $sql="SELECT `ID` FROM `complaints` WHERE `ID`=".$_POST['complaint'].";";

                $results = mysqli_query($conn, $sql);
                $complaint = mysqli_fetch_array($results);

                if(isset($complaint)){
                    $sql="SELECT `ID`, `TITLE`, `CONTENT`, `REGION` FROM `complaints` WHERE `ID`=".$_POST['complaint'].";";

                    $results = mysqli_query($conn, $sql);
                    $complaintData = mysqli_fetch_array($results);

                    $_SESSION['data']=$complaintData;
                    header("Location:./makeSubmission.php");
                }
                else{
                    $error="2";
                    header("Location:./AdminPage.php?error=".$error);
                }
            }
            else{
                $sql="SELECT `ID` FROM `complaints` WHERE `ID`=".$_POST['complaint'].";";

                $results = mysqli_query($conn, $sql);
                $complaint = mysqli_fetch_array($results);

                if(isset($complaint)){
                    $sql="DELETE FROM `complaints` WHERE `ID`='".$complaint['ID']."';";

                    $conn->query($sql);

                    header("Location:./AdminPage.php");
                }
                else{
                    $error="2";
                    header("Location:./AdminPage.php?error=".$error);
                }
            }
        }
    }
    else{
        $error="3";
        header("Location:./AdminPage.php?error=".$error);
    }
?>
