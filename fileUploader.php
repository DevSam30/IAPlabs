<?php

	class FileUploader{

		private static $target_directory="uploads/";
		private static $size_limit=50000;/*size in bytes*/
		private $file_original_name;
		private $file_type;
		private $file_size;
		private $final_file_name;

		public function setOriginalName($name){
			$this->file_original_name=$name;
		}
		public function getOriginalName(){
			return $this->file_original_name;
		}
		public function setFileType($type){
			$this->file_type=$type;
		}
		public function getFileType(){
			return $this->file_type;
		}
		public function setFileSize($size){
			$this->file_size=$size;
		}
		public function getFileSize(){
			return $this->file_size;
		}
		public function setFinalFileName($final_name){
			$this->final_file_name=$final_name;
		}
		public function getFinalFileName(){
			return $this->final_file_name;
		}

		/*logic methods*/
		public function uploadFile(){
			
			// $d=(document).ready(function(){
   //  		$e=('#btn_save').click(function(){
   //    		var image_name=$f=('#fileToUpload').val();
   //    		if(image_name==''){
   //      		alert("Please Select Image");
   //      		return false;
   //    	}
   //    		else{
   //      	//validate extension of selected file
   //      	var extension=$f=('#fileToUpload').val().split('.').pop().toLowerCase();
   //      	if (jQuery.inArray(extension,['gif','png','jpg','jpeg'])==-1) {

   //        		alert('Invalid Image File');
   //        		$f=('#fileToUpload').val();
   //        		return false;
   //      }

   //    }
   //  	});
  	// 	});
			
		}
		public function fileAlreadyExists(){}
		public function saveFilePathTo(){}
		public function moveFile(){}
		public function fileTypeIsCorrect(){}
		public function fileSizeIsCorrect(){}
		public function fileWasSelected(){}
	}