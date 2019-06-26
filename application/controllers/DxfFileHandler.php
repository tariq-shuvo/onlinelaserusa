<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DxfFileHandler extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function index()
    {
        $target_dir = "uploads/order/dxf/";
        $unique_file_name=uniqid().uniqid();
        $imageFileType = strtolower(pathinfo(basename($_FILES["file_field"]["name"]),PATHINFO_EXTENSION));
        $target_file = $target_dir . $unique_file_name.".".$imageFileType;
        $uploadOk = 1;

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "0";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file_field"]["tmp_name"], $target_file)) {
                echo $target_file;
            } else {
                echo "0";
            }
        }
    }

    public function saveSVG()
    {
        $target_dir = "uploads/order/svg/";
        $unique_file_name=uniqid().uniqid();
        $imageFileType = "svg";
        $target_file = $target_dir . $unique_file_name.".".$imageFileType;
        $uploadOk = 1;

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "0";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file_field"]["tmp_name"], $target_file)) {
                echo $target_file;
            } else {
                echo "0";
            }
        }
    }
}