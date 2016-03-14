<?php

session_start();
include_once './config/dbc.php';
require_once './class/systemSetting.php';
$system = new setting();

// $$creating image directory$$ //
if (array_key_exists('make_dir', $_POST)) {
    $_SESSION['dirname'] = $_POST['mkdir'];
    if (!is_dir('js/fancybox/img/uploads/' . $_POST['mkdir'])) {
        $makedir = mkdir('js/fancybox/img/uploads/' . $_POST['mkdir']);

        if ($makedir) {
            echo '1';
        } else {
            echo '0';
//            session_destroy();
        }
    } else {
        echo '1';
    }
}
if (array_key_exists('make_dir_repair', $_POST)) {
    $_SESSION['dirname_repair'] = $_POST['mkdir'];
    if (!is_dir('uploads/Repairs/' . $_POST['mkdir'])) {
        $makedir = mkdir('uploads/Repairs/' . $_POST['mkdir']);
        if ($makedir) {
            echo '1';
        } else {
            echo '0';
//            session_destroy();
        }
    } else {
        echo '1';
    }
}
if (array_key_exists('make_slide', $_POST)) {
    $slide = $_POST['mkdir'];
    $root = $_SERVER['DOCUMENT_ROOT'] . '/VMS/js/fancybox/img/uploads/' . $slide;
    if (is_dir($root)) {
        $images = array_diff(scandir($root), array('..', '.'));
        echo json_encode($images);
    } else {
        echo json_encode(array(array("msg" => 1)));
    }
}
if (array_key_exists('check_directry', $_POST)) {
    $slide = $_POST['chk_dir'];
    $root = $_SERVER['DOCUMENT_ROOT'] . '/VMS/js/fancybox/img/uploads/' . $slide;
    if (!is_dir($root)) {
        echo '2';
    } else {
        $images = array_diff(scandir($root), array('..', '.'));
        $count = count($images);
        if (is_dir($root) && $count > 0) {
            echo '3';
        }
    }
}

if (array_key_exists('make_modal_slide_repair', $_POST)) {
    $slide = $_POST['mkdir'];
//    print_r($slide);
//    echo $slide;
    $root = $_SERVER['DOCUMENT_ROOT'] . '/VMS/uploads/Repairs/' . $slide;
    if (is_dir($root)) {
        $images = array_diff(scandir($root), array('..', '.'));
        echo json_encode($images);
    } else {
        echo json_encode(array(array("msg" => 1)));
    }
}

// $$delete image$$//
if (array_key_exists('delete_image_repair', $_POST)) {
    $imgid = $_POST['imgid'];
    $dir = $_POST['dir_id'];
    $root = $_SERVER['DOCUMENT_ROOT'] . '/VMS/uploads/Repairs/' . $dir;
print_r($root);
    $ret = array();
    $ret['err'] = 0;
    $ret['msg'] = '';
    if (is_dir($root)) {
        $path = $root . '/' . $imgid;
        $del = unlink($path);
        if (!$del) {
            $ret['err'] = 1;
            $ret['msg'] = "image delete failed";
        }

        $images = array_diff(scandir($root), array('..', '.'));
        $count = count($images);

        if ($count == 0) {
            $del_dir = rmdir($root);
            if (!$del_dir) {
                $ret['err'] = 1;
                $ret['msg'] = "folder delete failed";
            }
        }
    } else {
        $ret['err'] = 1;
        $ret['msg'] = "invalid dir path";
    }
    echo json_encode($ret);
}
// $$saving images to directory$$ //
if (isset($_FILES['images']) && !empty($_FILES['images'])) {
    foreach ($_FILES["images"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $name = $_FILES["images"]["name"][$key];
            $yo = move_uploaded_file($_FILES["images"]["tmp_name"][$key], 'uploads/Repairs/' . $_SESSION['dirname_repair'] . '/' . $_FILES["images"]["name"][$key]);
            if ($yo) {
//                echo '2';
//                unset($_SESSION['dirname']);
            } else {
                echo '3';
            }
        }
    }
    // unset($_SESSION['dirname']);
    echo json_encode($yo);
}



//echo "<h2>Successfully Uploaded Images</h2>";
//}
//function to get the extension of the file
//function getExt($name){
// $array = explode(".", $name);
// $ext = strtolower(end($array));
// return $ext;
//}
//
////create global array
//$allowed = array('gif', 'png', 'jpg');
//$success = array();
//$error = array();
//
//if(isset($_FILES['file']) && !empty($_FILES['file'])){
//  foreach ($_FILES['file']['name'] as $key => $name) {
//   $tmp = $_FILES['file']['tmp_name'][$key];
//   $ext = getExt($name);
//   $size = $_FILES['file']['size'][$key];
//
//   // check the extension is valid or not
//   if(in_array($ext, $allowed) == true){
//    $filename = md5($name) . time() .'.'.$ext;
//    //check the size of the file
//    if($size <= 2097152){
//     if(move_uploaded_file($tmp, 'uploads/'.$filename) === true){
//      $success[] = array('name' => $name, 'location' => 'uploads/'.$filename);
//     }else{
//      $error[] = array('name' => $name, 'msg' => 'File is not uploaded');
//     }
//    }else{
//     $error[] = array('name' => $name, 'msg' => 'File size more than 2MB');
//    }
//   }else{
//    $error[] = array('name' => $name, 'msg' => 'File Type not allowed');
//   }
//  }
//  
//  //encode the result in json format
//  $json = json_encode(array(
//   'success' => $success,
//   'error' => $error
//  ));
//
//  echo $json;
//  exit();
//}
?>