<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploadify extends CI_Controller {
   
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('myfun');
		$this->load->model('admin_model');
	
	}
	
	public function index()
	{

		$base64_string = $this->input->post('base64_string');

	    $savename = uniqid().'.jpeg';//localResizeIMG压缩后的图片都是jpeg格式

	    $savepath = 'upload/'.$savename; 

	    $image = $this->base64_to_img( $base64_string, $savepath );

	    if($image){
	        echo '{"status":1,"content":"上传成功","url":"'.$image.'"}';
	    }else{
	        echo '{"status":0,"content":"上传失败"}';
	    } 


	}

    public function base64_to_img( $base64_string, $output_file ) {
        $ifp = fopen( $output_file, "wb" ); 
        fwrite( $ifp, base64_decode( $base64_string) ); 
        fclose( $ifp ); 
        return( $output_file ); 
    }

    //uploadify上传图片
    public function index2()
	{
		$token=$this->input->post('token');
		$targetFolder = './upload/'; //上传文件路径
		$verifyToken = md5('YSH'.$this->input->post('timestamp'));
		if (!empty($_FILES) && $token == $verifyToken) {
			$tempFile = $_FILES['Filedata']['tmp_name'];			
			$fileAttr = pathinfo($_FILES['Filedata']['name']);
			$filesizes=$_FILES['Filedata']['size']/1024;
			$fileNames='19890525'.time().'.'.$fileAttr['extension'];
			$fileParts = rtrim($targetFolder,'/').'/'.$fileNames;
			move_uploaded_file($tempFile,$fileParts);
			echo $fileNames;
			//' | '.round($filesizes).'KB | '.$fileAttr['extension'].'文件'
		}
	}
	
	public function del_file2()
	{
		$targetFolder = './upload/'; //文件路径
		$upfilenames=$this->input->post('upfile');
		
		if(file_exists($targetFolder.$upfilenames)){
			@unlink($targetFolder.$upfilenames);
		}
	}
	

	
	
}



?>